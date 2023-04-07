<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TvChannel;
use App\Models\CategoriesList;
use App\Models\ChannelList;

class TvCategory extends Model
{
    protected $table="tv_categories";
    protected $fillable=[
        'category_name'
    ];

    public function tvChannel(){
        return $this->hasMany(TvChannel::class, 'category_id', 'id');
    }

    public function categoryList(){
        return $this->hasOne(CategoriesList::class, 'category_id', 'id');
    }

    public function channelList(){
        return $this->hasMany(ChannelsList::class, 'category_id', 'id');
    }
}
