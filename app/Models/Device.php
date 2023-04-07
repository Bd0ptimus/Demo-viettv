<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Device extends Model
{
    protected $table="devices_connected";
    protected $fillable = [
        'user_id',
        'ip_device',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
