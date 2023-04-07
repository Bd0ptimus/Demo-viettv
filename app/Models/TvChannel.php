<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TvCategory;
use App\Models\ChannelList;
class TvChannel extends Model
{
    protected $table="tv_channels";
    protected $fillable=[
        'channel_name',
        'channel_img',
        'category_id',
        'channel_url',
    ];

    public function tvCategory(){
        return $this->belongsTo(TvCategory::class, 'category_id', 'id');
    }

    public function channelList(){
        return $this->hasOne(ChannelList::class, 'channel_id', 'id');
    }
}
