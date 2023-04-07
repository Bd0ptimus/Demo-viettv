<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table="background_screen";
    protected $fillable = [
        'url',
    ];
}
