<x-mail::message>
# Thông báo về người đăng ký mới



Thông tin người đăng ký mới :

Tên : {{$name}}

Quốc gia : {{$country}}

Địa chỉ : {{$address}}

Email : {{$email}}

Số điện thoại : {{$phone}}



Những dịch vụ đăng ký :

Truyền hình : {{$tv}}

Netflix : {{$netflix}}

Youtube Premium : {{$ytpremium}}

VPN : {{$vpn}}



<x-mail::button :url="$link">
Đến trang quản lý người dùng
</x-mail::button>

Từ,<br>
{{ config('app.name') }}
</x-mail::message>
