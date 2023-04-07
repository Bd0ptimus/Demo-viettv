<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


use App\Services\UserService;
use App\Services\AccountService;
use App\Services\AttachmentService;

use App\Mail\AccountDetailSend;

use App\Models\User;

class AdminController extends Controller
{
    protected $userService;
    protected $accountService;
    protected $attachmentService;
    public function __construct(UserService $userService, AccountService $accountService, AttachmentService $attachmentService)
    {
        $this->middleware('admin.permission');
        $this->middleware('superadmin.permission')->only(['paid_confirm']);

        $this->userService = $userService;
        $this->accountService = $accountService;
        $this->attachmentService = $attachmentService;
    }
    public function index(Request $request)
    {
        $userType = $request->all()['tab'] ?? ADMIN_USER;
        $users = $this->userService->takeAllUserForAccountManager($userType);
        // dd($users);
        return view('admin.accountManager.index', [
            'users' => $users['users'],
            'tabChoice' => $userType,
        ]);
    }

    private function registerValidate($request)
    {
        $messages = [
            'name.required' => 'Tên bắt buộc phải được nhập.',
            'expiredDate.required' => 'Ngày hết hạn bắt buộc phải được nhập.',
            'name.max' => 'Tên chỉ có tối đa 255 ký tự.',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
            'after' => 'Ngày hết hạn phải sau ngày hôm nay',
            // 'numDevices.numeric' => 'Số lượng thiết bị phải là số',
            // 'numDevices.min' => 'Số lượng thiết bị tối thiểu là 1',
            // 'numDevices.max' => 'Số lượng thiết bị tối đa là 99',
            // 'numDevices.required' => 'Số lượng thiết bị phải được nhập',

        ];

        $validator = Validator::make($request, [
            'name'    => 'required|max:255',
            'email'    => 'sometimes|nullable|email|max:255',
            'expiredDate' => 'required|after:yesterday',
            // 'numDevices' => 'required|numeric|min:1|max:99',
        ], $messages);

        return $validator;
    }

    public function createAccount(Request $request, $accountType)
    {
        if ($request->isMethod('POST')) {
            $validator = $this->registerValidate($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                if ($request->country == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('country', 'Phải chọn quốc gia'))->withInput($request->all());
                }
                // if(!str_contains($request->phoneNumber, '+')){
                //     // dd('abc');
                //     return redirect()->back()->withErrors($validator->errors()->add('phone', 'Định dạng số điện thoại không đúng'))->withInput($request->all());
                // }
                if ($request->manager == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('manager', 'Phải chọn người quản lý'))->withInput($request->all());
                }
                DB::beginTransaction();
                try {
                    $newAccount = $this->accountService->createAccount($request, $accountType);
                    if ($accountType != ROLE_ADMIN && $accountType != ROLE_SUPER_ADMIN) {
                        $this->attachmentService->addNewInvoiceAttachment($newAccount->id, $request);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    Log::debug('error in add product : ' . $e);
                    DB::rollBack();
                }
                return view('layouts.accountCreateConfirm', [
                    'newUser' => $newAccount,
                    'accountType' => $accountType,
                ]);
            }
        }
        return view('auth.register', [
            'accountType' => $accountType,
        ]);
    }

    public function sendAccountDetailToUser(Request $request, $userId, $pageId)
    {

        try {
            $user = User::find($userId);
            Mail::to($user->email)->send(new AccountDetailSend($user->email, $user->name, $user->username, $user->password_raw));
            if ($pageId == CREATE_ACC_CONFIRMATION_PAGE) {
                return view('layouts.accountCreateConfirm', [
                    'newUser' => $user,
                    'accountType' => $user->role_user,
                    'sendMailComplete' => 1,
                ]);
            } elseif ($pageId == ADMIN_PAGE) {
                $users = $this->userService->takeAllUserForAccountManager();
                return view('admin.accountManager.index', [
                    'admins' => $users['admins'],
                    'users' => $users['users'],
                    'sendMailComplete' => 1,
                ]);
            }
        } catch (\Exception $e) {
            if ($pageId == CREATE_ACC_CONFIRMATION_PAGE) {
                return view('layouts.accountCreateConfirm', [
                    'newUser' => $user,
                    'accountType' => $user->role_user,
                    'sendMailComplete' => 0,
                ]);
            } elseif ($pageId == ADMIN_PAGE) {
                $users = $this->userService->takeAllUserForAccountManager();
                return view('admin.accountManager.index', [
                    'admins' => $users['admins'],
                    'users' => $users['users'],
                    'sendMailComplete' => 0,
                ]);
            }
        }
    }

    public function suspendAccount(Request $request, $userId)
    {
        User::find($userId)->update([
            'active' => USER_SUSPENDED,
        ]);
        return redirect()->back();
    }

    public function activeAccount(Request $request, $userId)
    {
        User::find($userId)->update([
            'active' => USER_ACTIVATED,
        ]);
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        User::find($request->userId)->update([
            'password' => Hash::make($request->password),
            'password_raw' => $request->password,
        ]);
        $users = $this->userService->takeAllUserForAccountManager();
        return view('admin.accountManager.index', [
            'admins' => $users['admins'],
            'users' => $users['users'],
            'sendChangePasswordComplete' => 1,

        ]);
    }

    public function paidConfirm(Request $request, $userId, $confirmStatus)
    {
        User::find($userId)->update([
            'paid_confirm' =>  $confirmStatus,
        ]);
        return redirect()->route('admin.accountManager');
    }

    public function deleteUser(Request $request, $userId)
    {
        User::find($userId)->delete();
        return redirect()->route('admin.accountManager');
    }

    private function changeInfoValidate($request)
    {
        $messages = [
            'expiredDate.required' => 'Tên bắt buộc phải được nhập.',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
            'after' => 'Ngày hết hạn phải sau ngày hôm nay',
            'numDevices.numeric' => 'Số lượng thiết bị phải là số',
            'numDevices.min' => 'Số lượng thiết bị tối thiểu là 1',
            'numDevices.max' => 'Số lượng thiết bị tối đa là 99',
            'numDevices.required' => 'Số lượng thiết bị phải được nhập',
            'username.required' => 'Tên đăng nhập phải được nhập',
            'username.min' => 'Tên đăng nhập phải có ít nhất 10 ký tự',
            'username.max' => 'Tên đăng nhập chỉ có tối đa 255 ký tự',
        ];

        $validator = Validator::make($request, [
            'email'    => 'sometimes|nullable|email|max:255',
            'expiredDate' => 'required|after:yesterday',
            'numDevices' => 'required|numeric|min:1|max:99',
            'username' => 'required|min:10|max:255',

        ], $messages);

        return $validator;
    }

    public function changeInfoAccount(Request $request, $userId)
    {
        if ($request->isMethod('POST')) {
            $validator = $this->changeInfoValidate($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $user = User::where('username', '=', $request->username)->first();
                if (isset($user)) {
                    if ($user->id != $userId) {
                        return redirect()->back()->withErrors($validator->errors()->add('username', 'Tên đăng nhập đã tồn tại, hãy chọn tên đăng nhập khác'))->withInput($request->all());
                    }
                }
                if ($request->country == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('country', 'Phải chọn quốc gia'))->withInput($request->all());
                }
                DB::beginTransaction();
                try {
                    $account = $this->accountService->updateAccount($request, $userId);
                    $this->attachmentService->addNewInvoiceAttachment($account->id, $request);

                    DB::commit();
                } catch (\Exception $e) {
                    Log::debug('error in add product : ' . $e);
                    DB::rollBack();
                }


                return redirect()->route('admin.accountManager');
            }
        }
        return view('admin.accountManager.changeInfoAccount', [
            'user' => User::find($userId),
        ]);
    }

    public function changeStatus(Request $request, $type, $userId)
    {
        // dd('in change status');
        User::find($userId)->update([
            'active' => $type,
        ]);
        return redirect()->back();
    }

    public function formatThirdPartyUser(Request $request)
    {
        $users = User::query()->update([
            'third_party_user' => VIETTV_USER,
        ]);
    }


    private function createAccountThirdPartyValidate($request)
    {
        $messages = [
            'name.required' => 'Tên bắt buộc phải được nhập.',
            'expiredDate.required' => 'Ngày hết hạn bắt buộc phải được nhập.',
            'createdDate.required' => 'Ngày đăng ký bắt buộc phải được nhập.',
            'name.max' => 'Tên chỉ có tối đa 255 ký tự.',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
            'after' => 'Ngày hết hạn phải sau ngày hôm nay',
            'numDevices.numeric' => 'Số lượng thiết bị phải là số',
            'numDevices.min' => 'Số lượng thiết bị tối thiểu là 1',
            'numDevices.max' => 'Số lượng thiết bị tối đa là 99',
            'numDevices.required' => 'Số lượng thiết bị phải được nhập',
            'username.required' => 'Username bắt buộc phải được nhập',
            'password.required' => 'Mật khẩu bắt buộc phải được nhập',
        ];

        $validator = Validator::make($request, [
            'name'    => 'required|max:255',
            'email'    => 'sometimes|nullable|email|max:255',
            'username' => 'required',
            'password' => 'required',
            'expiredDate' => 'required|after:yesterday',
            'numDevices' => 'required|numeric|min:1|max:99',
            'createdDate' => 'required',
        ], $messages);

        return $validator;
    }
    public function createAccountThirdParty(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = $this->createAccountThirdPartyValidate($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $user = User::where('third_party_user', '=', $request->userType)->where('username', '=', $request->username)->first();
                if (isset($user)) {
                    return redirect()->back()->withErrors($validator->errors()->add('username', 'Tài khoản ' . USERTYPE_DEFINED[$request->userType] . ' đã tồn tại'))->withInput($request->all());
                }
                if ($request->userType == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('userType', 'Phải chọn loại tài khoản'))->withInput($request->all());
                }
                if ($request->country == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('country', 'Phải chọn quốc gia'))->withInput($request->all());
                }

                if ($request->active == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('active', 'Phải chọn trạng thái'))->withInput($request->all());
                }

                if ($request->manager == 0) {
                    return redirect()->back()->withErrors($validator->errors()->add('manager', 'Phải chọn người quản lý'))->withInput($request->all());
                }

                DB::beginTransaction();
                try {
                    $newAccount = $this->accountService->createThirdPartyAccount($request);
                    $this->attachmentService->addNewInvoiceAttachment($newAccount->id, $request);

                    DB::commit();
                } catch (\Exception $e) {
                    Log::debug('error in add product : ' . $e);
                    DB::rollBack();
                }

                return redirect()->route('admin.accountManager');
            }
        }

        return view('admin.accountManager.createThirdPartyAccount');
    }

    private function updateAccountThirdPartyValidate($request)
    {
        $messages = [
            'name.required' => 'Tên bắt buộc phải được nhập.',
            'expiredDate.required' => 'Ngày hết hạn bắt buộc phải được nhập.',
            // 'createdDate.required' => 'Ngày đăng ký bắt buộc phải được nhập.',
            'name.max' => 'Tên chỉ có tối đa 255 ký tự.',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
            'after' => 'Ngày hết hạn phải sau ngày hôm nay',
            'numDevices.numeric' => 'Số lượng thiết bị phải là số',
            'numDevices.min' => 'Số lượng thiết bị tối thiểu là 1',
            'numDevices.max' => 'Số lượng thiết bị tối đa là 99',
            'numDevices.required' => 'Số lượng thiết bị phải được nhập',
            'password.required' => 'Mật khẩu bắt buộc phải được nhập',
        ];

        $validator = Validator::make($request, [
            'name'    => 'required|max:255',
            'email'    => 'sometimes|nullable|email|max:255',
            'password' => 'required',
            'expiredDate' => 'required|after:yesterday',
            'numDevices' => 'required|numeric|min:1|max:99',
            // 'createdDate'=>'required',
        ], $messages);

        return $validator;
    }

    public function changeAccountThirdParty(Request $request, $userId)
    {
        if ($request->isMethod('POST')) {
            $validator = $this->updateAccountThirdPartyValidate($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                DB::beginTransaction();
                try {
                    $account = $this->accountService->updateThirdPartyAccount($request, $userId);
                    $this->attachmentService->addNewInvoiceAttachment($account->id, $request);

                    DB::commit();
                } catch (\Exception $e) {
                    Log::debug('error in add product : ' . $e);
                    DB::rollBack();
                }


                return redirect()->route('admin.accountManager');
            }
        }

        $user = User::find($userId);


        return view('admin.accountManager.changeThirdPartyAccount', [
            'user' => $user,
        ]);
    }
}
