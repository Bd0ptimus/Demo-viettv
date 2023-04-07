<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
    use App\Models\User;
    $user_suspended = USER_SUSPENDED;
    $user_actived = USER_ACTIVATED;

    $role_admin = ROLE_ADMIN;
    $role_user = ROLE_USER;

    $paid_not_confirm_const = PAID_NOT_CONFIRM;
    $paid_confirm_const = PAID_CONFIRM;
@endphp

<style>
    .invoiceImg {
        height: 150px;
        width: auto;
        cursor: pointer;
    }

    .userTables{
        width:100% !important;
    }

    .testClick {
        padding: 20px;
    }
</style>

<body>

    <div class="row d-flex justify-content-center" style=" width:auto; margin:auto; padding:auto; z-index:0;">
        <div class="row d-block justify-content-center" style="width:auto; margin:auto; padding:auto;">
            <div class="row d-flex justify-content-center" style="margin : 30px auto; padding:0px;">
                <h3 class="d-flex justify-content-center" style="padding:0px;">
                    Quản lý tài khoản
                </h3>

            </div>
            <div class="row d-flex justify-content-center" style="margin : 30px auto ;padding:0px;">
                <nav>
                    <div class="nav nav-tabs d-flex justify-content-start" role="tablist">
                        <button class="nav-link @if ($tabChoice == ADMIN_USER) active @endif accountTabs"
                            id="nav-admin-tab" data-bs-toggle="tab" type="button" role="tab"
                            aria-controls="nav-admin" aria-selected="true">Tài khoản Admin</button>
                        <button class="nav-link @if ($tabChoice == VIETTV_USER) active @endif accountTabs"
                            id="nav-viettv-tab" data-bs-toggle="tab" type="button" role="tab"
                            aria-controls="nav-viettv" aria-selected="false">Người dùng Viet-tv</button>
                        <button class="nav-link @if ($tabChoice == VNOO_USER) active @endif accountTabs"
                            id="nav-vnoo-tab" data-bs-toggle="tab" type="button" role="tab"
                            aria-controls="nav-vnoo" aria-selected="false">Người dùng Vnoo</button>
                        <button class="nav-link @if ($tabChoice == GOVIET_USER) active @endif accountTabs"
                            id="nav-goviet-tab" data-bs-toggle="tab" type="button" role="tab"
                            aria-controls="nav-goviet" aria-selected="false">Người dùng Goviet</button>
                        <button class="nav-link @if ($tabChoice == M3U_USER) active @endif accountTabs"
                            id="nav-m3u-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="nav-m3u"
                            aria-selected="false">Người dùng M3U</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent" style="position: relative;">
                    <div class="tab-pane fade @if ($tabChoice == ADMIN_USER) show active @endif " id="nav-admin"
                        role="tabpanel" aria-labelledby="nav-admin-tab" tabindex="0">
                        <div class="row d-flex justify-content-center" style="width:100%; margin: 30px auto;">
                            <h4 style="text-align:center; font-weight:700;">Tài khoản Admin</h4>
                            @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                <div class="row" style="width : 200px;">
                                    <a class="normal-button redirect-btn"
                                        href="{{ route('admin.createAccount', ['accountType' => $role_admin]) }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_admin])}}" --}}
                                        <i class="fa-solid fa-user-plus"></i><span> Thêm tài khoản admin</span>
                                    </a>
                                </div>
                            @endif
                            <div style="margin-top:20px;">
                                <table class="userTables" id="adminTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Thời gian đăng ký</th>
                                            <th scope="col">Ngày hết hạn</th>
                                            <th scope="col">Trạng thái</th>
                                            @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                <th scope="col">Mật khẩu</th>
                                                <th scope="col">Thao tác</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $admin)
                                            <tr>
                                                <th scope="col">{{ $key + 1 }}</th>
                                                <th scope="col">{{ $admin->name }}</th>
                                                <th scope="col">{{ $admin->id }}</th>
                                                <th scope="col">{{ $admin->username }}</th>
                                                <th scope="col">{{ $admin->email }}</th>
                                                <th scope="col">
                                                    {{ date('d-m-Y H:m:s', strtotime($admin->created_at)) }}</th>
                                                <th scope="col">
                                                    {{ isset($admin->expired_date) ? date('d-m-Y', strtotime($admin->expired_date)) : '' }}
                                                </th>

                                                @if ($admin->active == USER_ACTIVATED)
                                                    <th scope="col" style="color:green;">Đã kích hoạt </th>
                                                @elseif($admin->active == USER_SUSPENDED)
                                                    <th scope="col" style="color:red;">Đã đình chỉ</th>
                                                @elseif($admin->active == PAYED)
                                                    <th scope="col" style="color:blue;">Đã TT </th>
                                                @elseif($admin->active == WAITING_PAY)
                                                    <th scope="col" style="color:orange;">Đợi TT </th>
                                                @elseif($admin->active == CANCELED)
                                                    <th scope="col" style="color:red;">Hủy </th>
                                                @elseif($admin->active == TRIAL)
                                                    <th scope="col" style="color:#1d8daf;">Dùng thử </th>
                                                @elseif($admin->active == GIFTED)
                                                    <th scope="col" style="color:#840123;">Tặng</th>
                                                @endif

                                                @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                    <th scope="col">{{ $admin->password_raw }}</th>
                                                    <td>
                                                        <select id="admin-action-{{ $admin->id }}"
                                                            name="userAction" class="userAction"
                                                            >
                                                            <option label="Thay đổi trạng thái..." selected="selected"
                                                                disabled hidden>Thay đổi trạng
                                                                thái...</option>

                                                            @foreach (STATUSs as $status)
                                                                @if ($admin->active != USER_ACTIVATED && $status == USER_ACTIVATED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => USER_ACTIVATED, 'userId' => $admin->id]) }}"
                                                                        style="color:white; background-color:green;">
                                                                        Kích hoạt
                                                                    </option>
                                                                @elseif($admin->active != USER_SUSPENDED && $status == USER_SUSPENDED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => USER_SUSPENDED, 'userId' => $admin->id]) }}"
                                                                        style="color:white; background-color:red;">
                                                                        Đình chỉ
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <a class=" btn action-account-btn interact-btn"
                                                            style="background-color:blue;"
                                                            onclick="changePassword('{{ $admin->id }}', '{{ $admin->name }}','{{ $admin->email }}','{{ $admin->password_raw }}')">Đổi
                                                            mật khẩu</a>
                                                        @if ($admin->email != '')
                                                            <a class=" btn action-account-btn interact-btn"
                                                                style="background-color:#1d8daf;"
                                                                href="{{ route('admin.sendAccountDetail', ['userId' => $admin->id, 'pageId' => ADMIN_PAGE]) }}">Gửi
                                                                thông tin tài khoản</a>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade @if ($tabChoice == VIETTV_USER) show active @endif" id="nav-viettv"
                        role="tabpanel" aria-labelledby="nav-viettv-tab" tabindex="0">
                        <div class="row d-flex justify-content-center" style="width:100%; margin: 30px auto;">
                            <h4 style="text-align:center; font-weight:700;">Tài khoản người dùng Viet-tv</h4>
                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                <div class="row" style="width : 200px;">
                                    <a class="normal-button redirect-btn"
                                        href="{{ route('admin.createAccount', ['accountType' => $role_user]) }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_user])}}" --}}
                                        <i class="fa-solid fa-user-plus"></i><span> Thêm tài khoản
                                            người dùng Viet-tv</span>
                                    </a>
                                </div>
                            @endif

                            <div style=" margin:20px 0px;">
                                <table class="userTables" id="viettvTable">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" scope="col">STT</th>
                                            <th data-sortable="true" scope="col">Tên</th>
                                            <th data-sortable="true" scope="col">Số điện thoại</th>
                                            <th data-sortable="true" scope="col">Email</th>
                                            <th data-sortable="true" scope="col">Quốc gia</th>

                                            <th data-sortable="true" scope="col">ID</th>
                                            <th data-sortable="true" scope="col">Username</th>
                                            <th data-sortable="true" scope="col">Mật khẩu</th>
                                            <th data-sortable="true" scope="col">Số lượng thiết bị</th>

                                            <th data-sortable="true" scope="col">Thời gian đăng ký</th>
                                            <th data-sortable="true" scope="col">Ngày hết hạn</th>

                                            <th data-sortable="true" scope="col">Trạng thái</th>
                                            <th data-sortable="true" scope="col">Đã TT</th>
                                            <th data-sortable="true" scope="col">Người quản lý</th>

                                            <th data-sortable="true" scope="col">Xác nhận TT</th>
                                            <th data-sortable="true" scope="col">Đăng ký box</th>
                                            <th data-sortable="true" scope="col">Thông tin về box</th>
                                            <th data-sortable="true" scope="col">Ảnh hóa đơn</th>

                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <th scope="col">Thao tác</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr
                                                @if ($user->active == USER_EXPIRED) style="background-color:rgba(255, 117, 117, 0.5);" @endif>
                                                <th scope="col">{{ $key + 1 }}</th>
                                                <th scope="col">{{ $user->name }}</th>
                                                <th scope="col">{{ $user->phone }}</th>
                                                <th scope="col">{{ $user->email }}</th>
                                                <th scope="col">{{ $user->country }}</th>

                                                <th scope="col">{{ $user->id }}</th>
                                                <th scope="col">{{ $user->username }}</th>
                                                <th scope="col">{{ $user->password_raw }}</th>
                                                <th scope="col">{{ $user->number_devices }}</th>

                                                <th scope="col">
                                                    {{ date('d-m-Y H:m:s', strtotime($user->created_at)) }}
                                                </th>
                                                <th scope="col">
                                                    {{ isset($user->expired_date) ? date('d-m-Y', strtotime($user->expired_date)) : '' }}
                                                </th>


                                                @if ($user->active == USER_ACTIVATED)
                                                    <th scope="col" style="color:green;">Đã kích hoạt </th>
                                                @elseif($user->active == USER_SUSPENDED)
                                                    <th scope="col" style="color:red;">Đã đình chỉ</th>
                                                @elseif($user->active == PAYED)
                                                    <th scope="col" style="color:blue;">Đã TT </th>
                                                @elseif($user->active == WAITING_PAY)
                                                    <th scope="col" style="color:orange;">Đợi TT </th>
                                                @elseif($user->active == CANCELED)
                                                    <th scope="col" style="color:red;">Hủy </th>
                                                @elseif($user->active == TRIAL)
                                                    <th scope="col" style="color:#1d8daf;">Dùng thử </th>
                                                @elseif($user->active == GIFTED)
                                                    <th scope="col" style="color:#840123;">Tặng</th>
                                                @elseif($user->active == USER_EXPIRED)
                                                    <th scope="col" style="color:gray;">Đã hết hạn</th>
                                                @endif

                                                <th scope="col">
                                                    @if (isset($user->paid_amount) && $user->paid_amount != '')
                                                        {{ $user->paid_amount }}
                                                        @if ($user->currency == USD)
                                                            USD
                                                        @elseif($user->currency == VND)
                                                            k VND
                                                        @elseif($user->currency == EURO)
                                                            EURO
                                                        @endif
                                                    @endif
                                                </th>
                                                <th scope="col">
                                                    {{ $user->managerInfo ? $user->managerInfo->name : '' }}
                                                </th>

                                                {{-- <th scope="col">{{ User::find($user->manager)->name ?? '' }}</th> --}}
                                                <th scope="col">
                                                    @if ($user->paid_confirm == PAID_CONFIRM)
                                                        <p style="color:green;">Đã xác nhận</p>
                                                    @else
                                                        <p style="color:red;">Chưa xác nhận</p>
                                                    @endif
                                                </th>
                                                <th scope="col">
                                                    @if ($user->box_assign == BOX_ASSIGNED)
                                                        Có
                                                    @else
                                                        Không
                                                    @endif

                                                </th>

                                                <th scope="col">{{ $user->box_info }}</th>
                                                <th scope="col">
                                                    @foreach ($user->invoiceAttachments as $invoiceAttachment)
                                                        <img src="{{ $invoiceAttachment->url }}" class="invoiceImg"
                                                            onclick="showFullImage('{{ $invoiceAttachment->url }}')" />
                                                    @endforeach
                                                </th>
                                                @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                    <td scope="col">
                                                        <select id="user-action-{{ $user->id }}"
                                                            name="userAction" class="userAction"
                                                            >
                                                            <option label="Thay đổi trạng thái..." selected="selected"
                                                                disabled hidden>Thay đổi trạng
                                                                thái...</option>

                                                            @foreach (STATUSs as $status)
                                                                @if ($user->active != PAYED && $status == PAYED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => PAYED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:blue;">
                                                                        Chuyển
                                                                        sang
                                                                        đã TT</option>
                                                                @elseif($user->active != WAITING_PAY && $status == WAITING_PAY)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => WAITING_PAY, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:orange;">
                                                                        Chuyển
                                                                        sang đợi TT</option>
                                                                @elseif($user->active != CANCELED && $status == CANCELED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => CANCELED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:red;">
                                                                        Chuyển
                                                                        sang
                                                                        hủy</option>
                                                                @elseif($user->active != TRIAL && $status == TRIAL)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => TRIAL, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#1d8daf;">
                                                                        Chuyển
                                                                        sang dùng thử</option>
                                                                @elseif($user->active != GIFTED && $status == GIFTED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => GIFTED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#840123;">
                                                                        Chuyển
                                                                        sang tặng</option>
                                                                @elseif($user->active != USER_EXPIRED && $status == USER_EXPIRED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => USER_EXPIRED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:gray;">
                                                                        Chuyển
                                                                        sang hết hạn</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        {{-- <a class="action-account-btn interact-btn"
                                                                style="background-color:green;"href="{{ route('admin.activeAccount', ['userId' => $user->id]) }}">Kích
                                                                hoạt tài
                                                                khoản</a> --}}
                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:orange;"
                                                            href="{{ route('admin.changeInfoAccount', ['userId' => $user->id]) }}">Thay
                                                            đổi thông tin</a>

                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:blue;"
                                                            onclick="changePassword('{{ $user->id }}', '{{ $user->name }}','{{ $user->email }}','{{ $user->password_raw }}')">Đổi
                                                            mật khẩu</a>
                                                        @if (Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                            @if ($user->paid_confirm == PAID_CONFIRM)
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:red;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_not_confirm_const]) }}">Bỏ
                                                                    xác nhận thanh toán</a>
                                                            @else
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:green;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_confirm_const]) }}">Xác
                                                                    nhận thanh toán</a>
                                                            @endif
                                                        @endif
                                                        @if ($user->email != '')
                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:#1d8daf;"
                                                                href="{{ route('admin.sendAccountDetail', ['userId' => $user->id, 'pageId' => ADMIN_PAGE]) }}">Gửi
                                                                thông tin tài khoản</a>
                                                        @endif
                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:red;"
                                                            onclick="deleteUser({{ $user->id }},'{{ $user->name }}', '{{ $user->username }}')">Xóa
                                                            tài khoản</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade @if ($tabChoice == VNOO_USER) show active @endif" id="nav-vnoo"
                        role="tabpanel" aria-labelledby="nav-vnoo-tab" tabindex="0">
                        <div class="row d-flex justify-content-center" style="width:100%; margin: 30px auto;">
                            <h4 style="text-align:center; font-weight:700;">Tài khoản người dùng Vnoo</h4>
                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                <div class="row" style="width : 200px;">
                                    <a class="normal-button redirect-btn"
                                        href="{{ route('admin.thirdParty.createAccount') }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_user])}}" --}}
                                        <i class="fa-solid fa-user-plus"></i><span> Thêm tài khoản
                                            người dùng của các dịch vụ khác</span>
                                    </a>
                                </div>
                            @endif

                            <div style="margin:20px 0px;">
                                <table class="userTables" id="vnooTable">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" scope="col">STT</th>
                                            <th data-sortable="true" scope="col">Tên</th>
                                            <th data-sortable="true" scope="col">Số điện thoại</th>
                                            <th data-sortable="true" scope="col">Email</th>
                                            <th data-sortable="true" scope="col">Quốc gia</th>

                                            <th data-sortable="true" scope="col">ID</th>
                                            <th data-sortable="true" scope="col">Username</th>
                                            <th data-sortable="true" scope="col">Mật khẩu</th>
                                            <th data-sortable="true" scope="col">Link quốc tế</th>
                                            <th data-sortable="true" scope="col">Tk Tivimate/OTT</th>

                                            <th data-sortable="true" scope="col">Số lượng thiết bị</th>

                                            <th data-sortable="true" scope="col">Thời gian đăng ký</th>
                                            <th data-sortable="true" scope="col">Ngày hết hạn</th>
                                            <th data-sortable="true" scope="col">Ghi chú</th>

                                            <th data-sortable="true" scope="col">Trạng thái</th>
                                            <th data-sortable="true" scope="col">Đã TT</th>
                                            <th data-sortable="true" scope="col">Người quản lý</th>

                                            <th data-sortable="true" scope="col">Xác nhận TT</th>
                                            <th data-sortable="true" scope="col">Đăng ký box</th>
                                            <th data-sortable="true" scope="col">Thông tin về box</th>
                                            <th data-sortable="true" scope="col">Ảnh hóa đơn</th>


                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <th scope="col">Thao tác</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr
                                                @if ($user->active == USER_EXPIRED) style="background-color:rgba(255, 117, 117, 0.5);" @endif>
                                                    <td scope="col">{{ $key + 1 }}</td>
                                                    <td scope="col">{{ $user->name }}</td>
                                                    <td scope="col">{{ $user->phone }}</td>
                                                    <td scope="col">{{ $user->email }}</td>
                                                    <td scope="col">{{ $user->country }}</td>

                                                    <td scope="col">{{ $user->id }}</td>
                                                    <td scope="col">{{ $user->username }}</td>
                                                    <td scope="col">{{ $user->password_raw }}</td>
                                                    <td scope="col">{{ $user->international_link }}</td>
                                                    <td scope="col">{{ $user->tivimate_acc }}</td>

                                                    <td scope="col">{{ $user->number_devices }}</td>

                                                    <td scope="col">
                                                        {{ date('d-m-Y', strtotime($user->created_at)) }}
                                                    </td>
                                                    <td scope="col">
                                                        {{ isset($user->expired_date) ? date('d-m-Y', strtotime($user->expired_date)) : '' }}
                                                    </td>

                                                    <td scope="col">{{ $user->note }}</td>

                                                    @if ($user->active == USER_ACTIVATED)
                                                        <td scope="col" style="color:green;">Đã kích hoạt </td>
                                                    @elseif($user->active == USER_SUSPENDED)
                                                        <td scope="col" style="color:red;">Đã đình chỉ</td>
                                                    @elseif($user->active == PAYED)
                                                        <td scope="col" style="color:blue;">Đã TT </td>
                                                    @elseif($user->active == WAITING_PAY)
                                                        <td scope="col" style="color:orange;">Đợi TT </td>
                                                    @elseif($user->active == CANCELED)
                                                        <td scope="col" style="color:red;">Hủy </td>
                                                    @elseif($user->active == TRIAL)
                                                        <td scope="col" style="color:#1d8daf;">Dùng thử </td>
                                                    @elseif($user->active == GIFTED)
                                                        <td scope="col" style="color:#840123;">Tặng</td>
                                                    @elseif($user->active == USER_EXPIRED)
                                                        <td scope="col" style="color:gray;">Đã hết hạn</td>
                                                    @endif

                                                    <td scope="col">
                                                        @if (isset($user->paid_amount) && $user->paid_amount != '')
                                                            {{ $user->paid_amount }}
                                                            @if ($user->currency == USD)
                                                                USD
                                                            @elseif($user->currency == VND)
                                                                k VND
                                                            @elseif($user->currency == EURO)
                                                                EURO
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td scope="col">
                                                        {{ $user->managerInfo ? $user->managerInfo->name : '' }}
                                                    </td>
                                                    <td scope="col">
                                                        @if ($user->paid_confirm == PAID_CONFIRM)
                                                            <p style="color:green;">Đã xác nhận</p>
                                                        @else
                                                            <p style="color:red;">Chưa xác nhận</p>
                                                        @endif
                                                    </td>
                                                    <td scope="col">
                                                        @if ($user->box_assign == BOX_ASSIGNED)
                                                            Có
                                                        @else
                                                            Không
                                                        @endif

                                                    </td>

                                                    <td scope="col">{{ $user->box_info }}</td>
                                                    <td scope="col">
                                                        @foreach ($user->invoiceAttachments as $invoiceAttachment)
                                                            <img src="{{ $invoiceAttachment->url }}"
                                                                class="invoiceImg"
                                                                onclick="showFullImage('{{ $invoiceAttachment->url }}')" />
                                                        @endforeach
                                                    </td>


                                                    @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                        <td>
                                                            <select id="user-action-{{ $user->id }}"
                                                                name="userAction" class="userAction"
                                                                >
                                                                <option label="Thay đổi trạng thái..."
                                                                    selected="selected" disabled hidden>Thay đổi trạng
                                                                    thái...</option>

                                                                @foreach (STATUSs as $status)
                                                                    @if ($user->active != PAYED && $status == PAYED)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => PAYED, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:blue;">
                                                                            Chuyển
                                                                            sang
                                                                            đã TT</option>
                                                                    @elseif($user->active != WAITING_PAY && $status == WAITING_PAY)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => WAITING_PAY, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:orange;">
                                                                            Chuyển
                                                                            sang đợi TT</option>
                                                                    @elseif($user->active != CANCELED && $status == CANCELED)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => CANCELED, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:red;">
                                                                            Chuyển
                                                                            sang
                                                                            hủy</option>
                                                                    @elseif($user->active != TRIAL && $status == TRIAL)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => TRIAL, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:#1d8daf;">
                                                                            Chuyển
                                                                            sang dùng thử</option>
                                                                    @elseif($user->active != GIFTED && $status == GIFTED)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => GIFTED, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:#840123;">
                                                                            Chuyển
                                                                            sang tặng</option>
                                                                    @elseif($user->active != USER_EXPIRED && $status == USER_EXPIRED)
                                                                        <option
                                                                            value="{{ route('admin.changeStatus', ['type' => USER_EXPIRED, 'userId' => $user->id]) }}"
                                                                            style="color:white; background-color:gray;">
                                                                            Chuyển
                                                                            sang hết hạn</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>

                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:orange;"
                                                                href="{{ route('admin.thirdParty.changeAccountThirdParty', ['userId' => $user->id]) }}">Thay
                                                                đổi thông tin</a>

                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:blue;"
                                                                onclick="changePassword('{{ $user->id }}', '{{ $user->name }}','{{ $user->email }}','{{ $user->password_raw }}')">Đổi
                                                                mật khẩu</a>

                                                            @if (Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                                @if ($user->paid_confirm == PAID_CONFIRM)
                                                                    <a class="btn action-account-btn interact-btn"
                                                                        style="background-color:red;"
                                                                        href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_not_confirm_const]) }}">Bỏ
                                                                        xác nhận thanh toán</a>
                                                                @else
                                                                    <a class="btn action-account-btn interact-btn"
                                                                        style="background-color:green;"
                                                                        href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_confirm_const]) }}">Xác
                                                                        nhận thanh toán</a>
                                                                @endif
                                                            @endif


                                                            @if ($user->email != '')
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:#1d8daf;"
                                                                    href="{{ route('admin.sendAccountDetail', ['userId' => $user->id, 'pageId' => ADMIN_PAGE]) }}">Gửi
                                                                    thông tin tài khoản</a>
                                                            @endif

                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:red;"
                                                                onclick="deleteUser({{ $user->id }},'{{ $user->name }}', '{{ $user->username }}')">Xóa
                                                                tài khoản</a>
                                                        </td>
                                                    @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade @if ($tabChoice == GOVIET_USER) show active @endif" id="nav-goviet"
                        role="tabpanel" aria-labelledby="nav-goviet-tab" tabindex="0">
                        <div class="row d-flex justify-content-center" style="width:100%; margin: 30px auto;">
                            <h4 style="text-align:center; font-weight:700;">Tài khoản người dùng Go Viet</h4>
                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                <div class="row" style="width : 200px;">
                                    <a class="normal-button redirect-btn"
                                        href="{{ route('admin.thirdParty.createAccount') }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_user])}}" --}}
                                        <i class="fa-solid fa-user-plus"></i><span> Thêm tài khoản
                                            người dùng của các dịch vụ khác</span>
                                    </a>
                                </div>
                            @endif

                            <div style="margin:20px 0px;">
                                <table class="userTables" id="govietTable" >
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" scope="col">STT</th>
                                            <th data-sortable="true" scope="col">Tên</th>
                                            <th data-sortable="true" scope="col">Số điện thoại</th>
                                            <th data-sortable="true" scope="col">Email</th>
                                            <th data-sortable="true" scope="col">Quốc gia</th>

                                            <th data-sortable="true" scope="col">ID</th>
                                            <th data-sortable="true" scope="col">Username</th>
                                            <th data-sortable="true" scope="col">Mật khẩu</th>
                                            <th data-sortable="true" scope="col">Link quốc tế</th>
                                            <th data-sortable="true" scope="col">Tk Tivimate/OTT</th>

                                            <th data-sortable="true" scope="col">Số lượng thiết bị</th>

                                            <th data-sortable="true" scope="col">Thời gian đăng ký</th>
                                            <th data-sortable="true" scope="col">Ngày hết hạn</th>
                                            <th data-sortable="true" scope="col">Ghi chú</th>

                                            <th data-sortable="true" scope="col">Trạng thái</th>
                                            <th data-sortable="true" scope="col">Đã TT</th>
                                            <th data-sortable="true" scope="col">Người quản lý</th>

                                            <th data-sortable="true" scope="col">Xác nhận TT</th>
                                            <th data-sortable="true" scope="col">Đăng ký box</th>
                                            <th data-sortable="true" scope="col">Thông tin về box</th>
                                            <th data-sortable="true" scope="col">Ảnh hóa đơn</th>


                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <th scope="col">Thao tác</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr
                                                @if ($user->active == USER_EXPIRED) style="background-color:rgba(255, 117, 117, 0.5);" @endif>
                                                <th scope="col">{{ $key + 1 }}</th>
                                                <th scope="col">{{ $user->name }}</th>
                                                <th scope="col">{{ $user->phone }}</th>
                                                <th scope="col">{{ $user->email }}</th>
                                                <th scope="col">{{ $user->country }}</th>

                                                <th scope="col">{{ $user->id }}</th>
                                                <th scope="col">{{ $user->username }}</th>
                                                <th scope="col">{{ $user->password_raw }}</th>
                                                <th scope="col">{{ $user->international_link }}</th>
                                                <th scope="col">{{ $user->tivimate_acc }}</th>

                                                <th scope="col">{{ $user->number_devices }}</th>

                                                <th scope="col">
                                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                                </th>
                                                <th scope="col">
                                                    {{ isset($user->expired_date) ? date('d-m-Y', strtotime($user->expired_date)) : '' }}
                                                </th>

                                                <th scope="col">{{ $user->note }}</th>

                                                @if ($user->active == USER_ACTIVATED)
                                                    <th scope="col" style="color:green;">Đã kích hoạt </th>
                                                @elseif($user->active == USER_SUSPENDED)
                                                    <th scope="col" style="color:red;">Đã đình chỉ</th>
                                                @elseif($user->active == PAYED)
                                                    <th scope="col" style="color:blue;">Đã TT </th>
                                                @elseif($user->active == WAITING_PAY)
                                                    <th scope="col" style="color:orange;">Đợi TT </th>
                                                @elseif($user->active == CANCELED)
                                                    <th scope="col" style="color:red;">Hủy </th>
                                                @elseif($user->active == TRIAL)
                                                    <th scope="col" style="color:#1d8daf;">Dùng thử </th>
                                                @elseif($user->active == GIFTED)
                                                    <th scope="col" style="color:#840123;">Tặng</th>
                                                @elseif($user->active == USER_EXPIRED)
                                                    <th scope="col" style="color:gray;">Đã hết hạn</th>
                                                @endif

                                                <th scope="col">
                                                    @if (isset($user->paid_amount) && $user->paid_amount != '')
                                                        {{ $user->paid_amount }}
                                                        @if ($user->currency == USD)
                                                            USD
                                                        @elseif($user->currency == VND)
                                                            k VND
                                                        @elseif($user->currency == EURO)
                                                            EURO
                                                        @endif
                                                    @endif
                                                </th>

                                                <th scope="col">
                                                    {{ $user->managerInfo ? $user->managerInfo->name : '' }}</th>
                                                <th scope="col">
                                                    @if ($user->paid_confirm == PAID_CONFIRM)
                                                        <p style="color:green;">Đã xác nhận</p>
                                                    @else
                                                        <p style="color:red;">Chưa xác nhận</p>
                                                    @endif
                                                </th>
                                                <th scope="col">
                                                    @if ($user->box_assign == BOX_ASSIGNED)
                                                        Có
                                                    @else
                                                        Không
                                                    @endif

                                                </th>

                                                <th scope="col">{{ $user->box_info }}</th>
                                                <th scope="col">
                                                    @foreach ($user->invoiceAttachments as $invoiceAttachment)
                                                        <img src="{{ $invoiceAttachment->url }}" class="invoiceImg"
                                                            onclick="showFullImage('{{ $invoiceAttachment->url }}')" />
                                                    @endforeach
                                                </th>

                                                @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                    <td>
                                                        <select id="user-action-{{ $user->id }}"
                                                            name="userAction" class="userAction"
                                                            >
                                                            <option label="Thay đổi trạng thái..." selected="selected"
                                                                disabled hidden>Thay đổi trạng
                                                                thái...</option>

                                                            @foreach (STATUSs as $status)
                                                                @if ($user->active != PAYED && $status == PAYED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => PAYED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:blue;">
                                                                        Chuyển
                                                                        sang
                                                                        đã TT</option>
                                                                @elseif($user->active != WAITING_PAY && $status == WAITING_PAY)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => WAITING_PAY, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:orange;">
                                                                        Chuyển
                                                                        sang đợi TT</option>
                                                                @elseif($user->active != CANCELED && $status == CANCELED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => CANCELED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:red;">
                                                                        Chuyển
                                                                        sang
                                                                        hủy</option>
                                                                @elseif($user->active != TRIAL && $status == TRIAL)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => TRIAL, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#1d8daf;">
                                                                        Chuyển
                                                                        sang dùng thử</option>
                                                                @elseif($user->active != GIFTED && $status == GIFTED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => GIFTED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#840123;">
                                                                        Chuyển
                                                                        sang tặng</option>
                                                                @elseif($user->active != USER_EXPIRED && $status == USER_EXPIRED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => USER_EXPIRED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:gray;">
                                                                        Chuyển
                                                                        sang hết hạn</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        {{-- <a class="action-account-btn interact-btn"
                                                        style="background-color:green;"href="{{ route('admin.activeAccount', ['userId' => $user->id]) }}">Kích
                                                        hoạt tài
                                                        khoản</a> --}}
                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:orange;"
                                                            href="{{ route('admin.thirdParty.changeAccountThirdParty', ['userId' => $user->id]) }}">Thay
                                                            đổi thông tin</a>

                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:blue;"
                                                            onclick="changePassword('{{ $user->id }}', '{{ $user->name }}','{{ $user->email }}','{{ $user->password_raw }}')">Đổi
                                                            mật khẩu</a>

                                                        @if (Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                            @if ($user->paid_confirm == PAID_CONFIRM)
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:red;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_not_confirm_const]) }}">Bỏ
                                                                    xác nhận thanh toán</a>
                                                            @else
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:green;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_confirm_const]) }}">Xác
                                                                    nhận thanh toán</a>
                                                            @endif
                                                        @endif


                                                        @if ($user->email != '')
                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:#1d8daf;"
                                                                href="{{ route('admin.sendAccountDetail', ['userId' => $user->id, 'pageId' => ADMIN_PAGE]) }}">Gửi
                                                                thông tin tài khoản</a>
                                                        @endif

                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:red;"
                                                            onclick="deleteUser({{ $user->id }},'{{ $user->name }}', '{{ $user->username }}')">Xóa
                                                            tài khoản</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade @if ($tabChoice == M3U_USER) show active @endif" id="nav-m3u"
                        role="tabpanel" aria-labelledby="nav-m3u-tab" tabindex="0">
                        <div class="row d-flex justify-content-center" style="width:100%; margin: 30px auto;">
                            <h4 style="text-align:center; font-weight:700;">Tài khoản người dùng M3U</h4>
                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                <div class="row" style="width : 200px;">
                                    <a class="normal-button redirect-btn"
                                        href="{{ route('admin.thirdParty.createAccount') }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_user])}}" --}}
                                        <i class="fa-solid fa-user-plus"></i><span> Thêm tài khoản
                                            người dùng của các dịch vụ khác</span>
                                    </a>
                                </div>
                            @endif

                            <div style=" margin:20px 0px;">
                                <table class="userTables" id="m3uTable">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" scope="col">STT</th>

                                            <th data-sortable="true" scope="col">Tên</th>
                                            <th data-sortable="true" scope="col">Số điện thoại</th>
                                            <th data-sortable="true" scope="col">Email</th>
                                            <th data-sortable="true" scope="col">Quốc gia</th>

                                            <th data-sortable="true" scope="col">ID</th>
                                            <th data-sortable="true" scope="col">Username</th>
                                            <th data-sortable="true" scope="col">Mật khẩu</th>
                                            <th data-sortable="true" scope="col">Link quốc tế</th>
                                            <th data-sortable="true" scope="col">Tk Tivimate/OTT</th>

                                            <th data-sortable="true" scope="col">Số lượng thiết bị</th>

                                            <th data-sortable="true" scope="col">Thời gian đăng ký</th>
                                            <th data-sortable="true" scope="col">Ngày hết hạn</th>
                                            <th data-sortable="true" scope="col">Ghi chú</th>

                                            <th data-sortable="true" scope="col">Trạng thái</th>
                                            <th data-sortable="true" scope="col">Đã TT</th>
                                            <th data-sortable="true" scope="col">Người quản lý</th>

                                            <th data-sortable="true" scope="col">Xác nhận TT</th>
                                            <th data-sortable="true" scope="col">Đăng ký box</th>
                                            <th data-sortable="true" scope="col">Thông tin về box</th>
                                            <th data-sortable="true" scope="col">Ảnh hóa đơn</th>
                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <th scope="col">Thao tác</th>
                                            @endif



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr
                                                @if ($user->active == USER_EXPIRED) style="background-color:rgba(255, 117, 117, 0.5);" @endif>
                                                <th scope="col">{{ $key + 1 }}</th>

                                                <th scope="col">{{ $user->name }}</th>
                                                <th scope="col">{{ $user->phone }}</th>
                                                <th scope="col">{{ $user->email }}</th>
                                                <th scope="col">{{ $user->country }}</th>

                                                <th scope="col">{{ $user->id }}</th>
                                                <th scope="col">{{ $user->username }}</th>
                                                <th scope="col">{{ $user->password_raw }}</th>
                                                <th scope="col">{{ $user->international_link }}</th>
                                                <th scope="col">{{ $user->tivimate_acc }}</th>

                                                <th scope="col">{{ $user->number_devices }}</th>

                                                <th scope="col">
                                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                                </th>
                                                <th scope="col">
                                                    {{ isset($user->expired_date) ? date('d-m-Y', strtotime($user->expired_date)) : '' }}
                                                </th>

                                                <th scope="col">{{ $user->note }}</th>

                                                @if ($user->active == USER_ACTIVATED)
                                                    <th scope="col" style="color:green;">Đã kích hoạt </th>
                                                @elseif($user->active == USER_SUSPENDED)
                                                    <th scope="col" style="color:red;">Đã đình chỉ</th>
                                                @elseif($user->active == PAYED)
                                                    <th scope="col" style="color:blue;">Đã TT </th>
                                                @elseif($user->active == WAITING_PAY)
                                                    <th scope="col" style="color:orange;">Đợi TT </th>
                                                @elseif($user->active == CANCELED)
                                                    <th scope="col" style="color:red;">Hủy </th>
                                                @elseif($user->active == TRIAL)
                                                    <th scope="col" style="color:#1d8daf;">Dùng thử </th>
                                                @elseif($user->active == GIFTED)
                                                    <th scope="col" style="color:#840123;">Tặng</th>
                                                @elseif($user->active == USER_EXPIRED)
                                                    <th scope="col" style="color:gray;">Đã hết hạn</th>
                                                @endif

                                                <th scope="col">
                                                    @if (isset($user->paid_amount) && $user->paid_amount != '')
                                                        {{ $user->paid_amount }}
                                                        @if ($user->currency == USD)
                                                            USD
                                                        @elseif($user->currency == VND)
                                                            k VND
                                                        @elseif($user->currency == EURO)
                                                            EURO
                                                        @endif
                                                    @endif
                                                </th>
                                                <th scope="col">
                                                    {{ $user->managerInfo ? $user->managerInfo->name : '' }}</th>

                                                {{-- <th scope="col">{{ User::find($user->manager)->name ?? '' }}</th> --}}
                                                <th scope="col">
                                                    @if ($user->paid_confirm == PAID_CONFIRM)
                                                        <p style="color:green;">Đã xác nhận</p>
                                                    @else
                                                        <p style="color:red;">Chưa xác nhận</p>
                                                    @endif
                                                </th>
                                                <th scope="col">
                                                    @if ($user->box_assign == BOX_ASSIGNED)
                                                        Có
                                                    @else
                                                        Không
                                                    @endif

                                                </th>

                                                <th scope="col">{{ $user->box_info }}</th>
                                                <th scope="col">
                                                    @foreach ($user->invoiceAttachments as $invoiceAttachment)
                                                        <img src="{{ $invoiceAttachment->url }}" class="invoiceImg"
                                                            onclick="showFullImage('{{ $invoiceAttachment->url }}')" />
                                                    @endforeach
                                                </th>

                                                @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                    <td>
                                                        <select id="user-action-{{ $user->id }}"
                                                            name="userAction" class="userAction">
                                                            <option label="Thay đổi trạng thái..." selected="selected"
                                                                disabled hidden>Thay đổi trạng
                                                                thái...</option>

                                                            @foreach (STATUSs as $status)
                                                                @if ($user->active != PAYED && $status == PAYED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => PAYED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:blue;">
                                                                        Chuyển
                                                                        sang
                                                                        đã TT</option>
                                                                @elseif($user->active != WAITING_PAY && $status == WAITING_PAY)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => WAITING_PAY, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:orange;">
                                                                        Chuyển
                                                                        sang đợi TT</option>
                                                                @elseif($user->active != CANCELED && $status == CANCELED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => CANCELED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:red;">
                                                                        Chuyển
                                                                        sang
                                                                        hủy</option>
                                                                @elseif($user->active != TRIAL && $status == TRIAL)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => TRIAL, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#1d8daf;">
                                                                        Chuyển
                                                                        sang dùng thử</option>
                                                                @elseif($user->active != GIFTED && $status == GIFTED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => GIFTED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:#840123;">
                                                                        Chuyển
                                                                        sang tặng</option>
                                                                @elseif($user->active != USER_EXPIRED && $status == USER_EXPIRED)
                                                                    <option
                                                                        value="{{ route('admin.changeStatus', ['type' => USER_EXPIRED, 'userId' => $user->id]) }}"
                                                                        style="color:white; background-color:gray;">
                                                                        Chuyển
                                                                        sang hết hạn</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        {{-- <a class="action-account-btn interact-btn"
                                                        style="background-color:green;"href="{{ route('admin.activeAccount', ['userId' => $user->id]) }}">Kích
                                                        hoạt tài
                                                        khoản</a> --}}
                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:orange;"
                                                            href="{{ route('admin.thirdParty.changeAccountThirdParty', ['userId' => $user->id]) }}">Thay
                                                            đổi thông tin</a>

                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:blue;"
                                                            onclick="changePassword('{{ $user->id }}', '{{ $user->name }}','{{ $user->email }}','{{ $user->password_raw }}')">Đổi
                                                            mật khẩu</a>

                                                        @if (Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                            @if ($user->paid_confirm == PAID_CONFIRM)
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:red;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_not_confirm_const]) }}">Bỏ
                                                                    xác nhận thanh toán</a>
                                                            @else
                                                                <a class="btn action-account-btn interact-btn"
                                                                    style="background-color:green;"
                                                                    href="{{ route('admin.paidConfirm', ['userId' => $user->id, 'confirmStatus' => $paid_confirm_const]) }}">Xác
                                                                    nhận thanh toán</a>
                                                            @endif
                                                        @endif


                                                        @if ($user->email != '')
                                                            <a class="btn action-account-btn interact-btn"
                                                                style="background-color:#1d8daf;"
                                                                href="{{ route('admin.sendAccountDetail', ['userId' => $user->id, 'pageId' => ADMIN_PAGE]) }}">Gửi
                                                                thông tin tài khoản</a>
                                                        @endif

                                                        <a class="btn action-account-btn interact-btn"
                                                            style="background-color:red;"
                                                            onclick="deleteUser({{ $user->id }},'{{ $user->name }}', '{{ $user->username }}')">Xóa
                                                            tài khoản</a>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>

    </div>
    @include('layouts.changePasswordAdmin')
    @include('layouts.toast')
    @include('layouts.showFullImage')


</body>
<link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">
<link href="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/page-jump-to/bootstrap-table-page-jump-to.min.css"
    rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/rowreorder/1.3.2/css/rowReorder.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css" rel="stylesheet">


<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/multiple-sort/bootstrap-table-multiple-sort.js">
</script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/page-jump-to/bootstrap-table-page-jump-to.min.js">
</script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.2/js/dataTables.rowReorder.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">

    // const selectList = document.querySelectorAll('userAction');
    // selectList.forEach(function(select){
    //     select.addEventListener('change', function (){
    //         const selectedOption = this.options[this.selectedIndex];
    //         console.log('log : ', selectedOption.value);
    //     })
    // })
    $(document).ready(function() {
        // $('#adminTable').DataTable();
        // $('#userTable').DataTable();
        let tableId = '';
        if ('{{ $tabChoice }}' == '{{ ADMIN_USER }}') {
            tableId='adminTable';
        }else if('{{ $tabChoice }}' == '{{ VIETTV_USER }}'){
            tableId='viettvTable';

        }else if('{{ $tabChoice }}' == '{{ VNOO_USER }}'){
            tableId='vnooTable';

        }else if('{{ $tabChoice }}' == '{{ GOVIET_USER }}'){
            tableId='govietTable';

        }else if('{{ $tabChoice }}' == '{{ M3U_USER }}'){
            tableId='m3uTable';

        }

        $('#imgBackground').remove();

        let productTable = $(`#${tableId}`).DataTable({
            rowReorder: {
                selector: 'td:nth-child(3)'
            },
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.3/i18n/vi.json',
            },
            responsive: true
        });

        $('.userTables').on('change','.userAction', function (){
            const selectedOption = this.options[this.selectedIndex];
            // console.log('log : ', selectedOption.value);
            window.location.href = selectedOption.value;

        });

        // let tabIndex = getCookie('tab');

        // console.log('tab cookie : ', tabIndex);
        // if (tabIndex == `{{ ADMIN_TAB }}`) {
        //     resetTab();
        //     $('#nav-admin-tab').addClass('active');
        //     $('#nav-admin').addClass('active');
        //     $('#nav-admin').addClass('show');

        // } else if (tabIndex == `{{ VIETTV_TAB }}`) {
        //     resetTab();
        //     $('#nav-viettv-tab').addClass('active');
        //     $('#nav-viettv').addClass('active');
        //     $('#nav-viettv').addClass('show');
        // } else if (tabIndex == `{{ VNOO_TAB }}`) {
        //     resetTab();
        //     $('#nav-vnoo-tab').addClass('active');
        //     $('#nav-vnoo').addClass('active');
        //     $('#nav-vnoo').addClass('show');
        // } else if (tabIndex == `{{ GOVIET_TAB }}`) {
        //     resetTab();
        //     $('#nav-goviet-tab').addClass('active');
        //     $('#nav-goviet').addClass('active');
        //     $('#nav-goviet').addClass('show');
        // } else if (tabIndex == `{{ M3U_TAB }}`) {
        //     resetTab();
        //     $('#nav-m3u-tab').addClass('active');
        //     $('#nav-m3u').addClass('active');
        //     $('#nav-m3u').addClass('show');
        // }

        // function resetTab() {
        //     $('.accountTabs').removeClass('active');
        //     $('.tab-pane').removeClass('active');
        //     $('.tab-pane').removeClass('show');

        // }

        function updateParameter(urlCurrent, key, value) {
            let url = new URL(urlCurrent);
            let search_params = url.searchParams;

            // new value of "key" is set to "value"
            search_params.set(key, value);
            // search_params.set('page', 1);

            // change the search property of the main url
            url.search = search_params.toString();

            return url.toString();
        }


        $('#nav-admin-tab').on('click', function() {
            startLoading();
            console.log('tab changed');
            // setCookie('tab', `{{ ADMIN_TAB }}`, 30);
            // window.location.reload();
            window.location.href = updateParameter(window.location.href, 'tab',
            '{{ ADMIN_USER }}');
        });

        $('#nav-viettv-tab').on('click', function() {
            startLoading();

            console.log('tab changed');
            // setCookie('tab', `{{ VIETTV_TAB }}`, 30);
            // window.location.reload();
            window.location.href = updateParameter(window.location.href, 'tab',
            '{{ VIETTV_USER }}');

        });

        $('#nav-vnoo-tab').on('click', function() {
            startLoading();

            console.log('tab changed');
            // setCookie('tab', `{{ VNOO_TAB }}`, 30);
            // window.location.reload();
            window.location.href = updateParameter(window.location.href, 'tab',
            '{{ VNOO_USER }}');

        });

        $('#nav-goviet-tab').on('click', function() {
            startLoading();

            console.log('tab changed');
            // setCookie('tab', `{{ GOVIET_TAB }}`, 30);
            // window.location.reload();
            window.location.href = updateParameter(window.location.href, 'tab',
            '{{ GOVIET_USER }}');

        });

        $('#nav-m3u-tab').on('click', function() {
            startLoading();

            console.log('tab changed');
            setCookie('tab', `{{ M3U_TAB }}`, 30);
            // window.location.reload();
            window.location.href = updateParameter(window.location.href, 'tab',
            '{{ M3U_USER }}');

        });

        // $('.userAction').on('change', function(event) {
        //     console.log('change : ', event.target.value);
        //     window.location.href = event.target.value;

        // });


        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        // $('.userTables').bootstrapTable({
        //     showMultiSort: true,
        //     formatMultipleSort: function() {
        //         return 'Sắp xếp';
        //     },
        //     formatCancel: () => {
        //         return 'Hủy';
        //     },
        //     formatColumn: () => {
        //         return 'Cột';
        //     },
        //     formatDeleteLevel: () => {
        //         return 'Xóa cấp sắp xếp';
        //     },
        //     formatOrder: () => {
        //         return 'Sắp xếp theo';
        //     },
        //     formatSort: () => {
        //         return 'Sắp xếp';
        //     },
        //     formatSortBy: () => {
        //         return 'Sắp xếp theo';
        //     },
        //     formatSortOrders: () => {
        //         return {
        //             asc: "Tăng dần",
        //             desc: 'Giảm dần',
        //         };
        //     },
        //     formatThenBy: () => {
        //         return 'Tiếp theo';
        //     },
        //     showJumpTo: false,

        // })

        var sendChangePasswordComplete = "{{ $sendChangePasswordComplete ?? -1 }}";
        console.log('check toast : ', sendChangePasswordComplete);
        if (sendChangePasswordComplete != '-1') {
            if (sendChangePasswordComplete == "0") {
                $('#toast-fail-text').text('Đổi mật khẩu không thành công, vui lòng thử lại');
                $('#notification-fail').toast('show');
            } else if (sendChangePasswordComplete == "1") {
                $('#toast-success-text').text('Đổi mật khẩu thành công!');
                $('#notification-success').toast('show');
            }
        }

        var sendMailComplete = "{{ $sendMailComplete ?? -1 }}";
        console.log('check toast : ', sendMailComplete);
        if (sendMailComplete != '-1') {
            if (sendMailComplete == "0") {
                $('#toast-fail-text').text('Gửi email không thành công, vui lòng thử lại');
                $('#notification-fail').toast('show');
            } else if (sendMailComplete == "1") {
                $('#toast-success-text').text('Gửi email thành công!');
                $('#notification-success').toast('show');
            }
        }

        // $('#user-action').on('change', function(){
        //     console.log('test choosing : ', $('#user-action').val());
        //     var type = $('#user-action').val().split('-')[0];
        //     var userId = $('#user-action').val().split('-')[1];

        // });

        $('.statusSelection').on('click', function(e) {
            console.log('check : ', e.data('href'));
        });
    });

    function deleteUser(userId, name, username) {
        if (confirm(`Bạn có muốn xóa tài khoản của "${name}" với username "${username}"!`)) {
            console.log('You pressed OK!');
            window.location.href = `{{ route('admin.deleteUser', '') }}` + "/" + userId;

        } else {
            console.log('You pressed Cancel!');
        }
    }

    // function userAction(userId) {
    //     console.log('userId : ', userId);
    //     console.log('url : ', $(`#user-action-${userId}`).find(":selected").val());
    //     // window.location.href = $(`#user-action-${userId}`).val();
    // }

    function adminAction(userId) {
        window.location.href = $(`#admin-action-${userId}`).val();
    }

    function changePassword(userId, name, email, passRaw) {
        $('#adminChangePassModal-name').text(name);
        $('#adminChangePassModal-email').text(email);
        $('#adminChangePassModal-pass').text(passRaw);
        $('#adminChangePassModal-userId').val(userId);
        $('#adminChangePassModal').modal('show');
    }
</script>

</html>
