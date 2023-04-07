<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Background;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\LOG;

use App\Services\AttachmentService;
class DisplayController extends Controller
{
    protected $attachmentService;
    public function __construct( AttachmentService $attachmentService )
    {
        $this->attachmentService = $attachmentService;
        $this->middleware('admin.permission')->except(['takeBackground']);

    }

    public function index()
    {
        $background = Background::get()->first();
        return view('admin.display.index', [
            'backgroundUrl' => $background->url??'',
        ]);
    }


    private function backgroundValidate($request)
    {
        $messages = [
            'imgPicker.mimes' => 'file tải lên phải là file png, jpg, jpeg',
            'imgPicker.max' => 'file tải lên chỉ có tối đa 10Mb',
        ];

        $validator = Validator::make($request, [
            // 'url'    => 'required',
            'imgPicker' => 'mimes:png,jpg,jpeg|max:10000'
        ], $messages);

        return $validator;
    }


    public function changeBackground(Request $request)
    {
        // $validator = $this->backgroundValidate($request->all());
        // if ($validator->fails()) {
        //     // dd($validator);
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // } else {
        //     Background::truncate();
        //     Background::create([
        //         'url' => $request->url,
        //     ]);
        //     return redirect()->back();
        // }

        // dd($request->imgPicker);
        $validator = $this->backgroundValidate($request->all());
        if(!isset($request->imgPicker) && !isset($request->url)){
            return redirect()->back()->withErrors($validator->errors()->add('url', 'Phải nhập một URL hoặc chọn một ảnh'))->withInput($request->all());
        }else{
            if(isset($request->url)){
                $url = $request->url;
            }

            if(isset($request->imgPicker)){
                $path = $this->attachmentService->saveNewBackground($request);
                $url = asset($path);
            }
            Background::truncate();
            Background::create([
                'url' => $url,
            ]);
            return redirect()->back();
        }
    }

    public function takeBackground(){
        try{
            $background = Background::get()->first();
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'remove category thanh cong','backgroundUrl'=>$background->url]);
    }
}
