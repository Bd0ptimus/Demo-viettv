<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bannerPlayer extends Model
{
    protected $table= "banner_player";

    protected $fillable=[
        'url'
    ];
}
