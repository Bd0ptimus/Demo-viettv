<x-mail::message>
# Cảm ơn đã sử dụng dịch vụ của Viet-tv.vn

Xin chào {{$name}}

Thông tin tài khoản của bạn là :

Tên người dùng : {{$name}}

Tên đăng nhập : {{$username}}

Mật khẩu : {{$passwordRaw}}

<x-mail::button :url="'https://viet-tv.vn'">
Truy cập website của chúng tôi
</x-mail::button>

Cảm ơn,<br>
{{ config('app.name') }}
</x-mail::message>
