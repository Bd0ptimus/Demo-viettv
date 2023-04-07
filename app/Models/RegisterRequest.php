<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterRequest extends Model
{
    protected $table="register_request";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'country',
        'tv',
        'netflix',
        'youtube_premium',
        'vpn',
    ];
}
