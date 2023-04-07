<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TvCategory;
use App\Models\TvChannel;
class ChannelList extends Model
{
    protected $table="channel_list";
    protected $fillable=[
        'category_id',
        'channel_id',
    ];

    public function tvChannel(){
        return $this->belongsTo(TvChannel::class, 'channel_id', 'id');
    }

    public function tvCategory(){
        return $this->belongsTo(TvCategory::class, 'category_id', 'id');
    }
}
