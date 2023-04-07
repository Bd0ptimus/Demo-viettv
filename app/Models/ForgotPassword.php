<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class ForgotPassword extends Model
{
    protected $table = 'forgot_password';
    protected $fillable=[
        'user_id',
        'token',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

}
