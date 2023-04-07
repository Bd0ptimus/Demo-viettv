<x-mail::message>
# Xác nhận quên mật khẩu

Xin chào {{$name}}.

Bạn vừa xác nhận quên mật khẩu cho tài khoản {{$username}}.

Bấm vào nút xác nhận dưới đây để đặt lại mật khẩu.

<x-mail::button :url="$link">
Xác nhận đặt lại mật khẩu
</x-mail::button>

Cảm ơn,<br>
{{ config('app.name') }}
</x-mail::message>
