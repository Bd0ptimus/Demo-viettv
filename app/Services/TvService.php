<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Str;
use Carbon\Carbon;
use  App\Http\Controllers\Util;

//model
use App\Models\TvCategory;
use App\Models\TvChannel;
use App\Models\CategoriesList;
use App\Models\ChannelList;


//repo

use Exception;
class TvService
{
    public function addTvCategory($categoryName){
        return TvCategory::create([
            'category_name'=>$categoryName,
        ]);
    }

    public function removeTvCategory($categoryId){
        Log::debug('tv category: '. $categoryId);
        TvCategory::find($categoryId)->delete();
        CategoriesList::where('category_id', $categoryId)->delete();
    }

    public function addChannel($request){
        return TvChannel::create([
            'channel_name' => $request->channelName,
            'channel_img' => $request->channelImg,
            'channel_url' => $request->channelUrl,
            'category_id' => $request->categoryId,
        ]);
    }

    public function changeChannel($request){
        // Log::debug('channel id : ',$request->channelId );
        TvChannel::find($request->channelId)->update([
            'channel_name'=>$request->channelName,
            'channel_img'=>$request->channelImg,
            'channel_url'=>$request->channelUrl,
        ]);
        return TvChannel::where('id',$request->channelId)->first();
    }

    public function removeTvChannel($channelId){
        TvChannel::find($channelId)->delete();
        ChannelList::where('channel_id', $channelId)->delete();
    }

    public function takeChannelDependOnCategory($categoryId){
        if($categoryId==0){
            $response = [];
            $categories = TvCategory::get();
            foreach($categories as $category){
                $channels = ChannelList::where('category_id', $category->id)->with('tvChannel')->get();
                foreach($channels as $channel){
                    array_push($response,$channel);
                }
            }
            return $response;
        }
        // return TvChannel::where('category_id', $categoryId)->orderBy('channel_name', 'ASC')->get();
        return ChannelList::where('category_id', $categoryId)->with('tvChannel')->get();
    }

    public function searchChannel($searchText){
        if($searchText==''){
            return TvChannel::orderBy('channel_name', 'ASC')->get();
        }

        return TvChannel::where('channel_name','LIKE', '%'.$searchText.'%')->orderBy('channel_name', 'ASC')->get();

    }

    public function updateCategory($categoryId, $categoryName){
        TvCategory::find($categoryId)->update([
            'category_name'=>$categoryName,
        ]);

        return  TvCategory::where('id',$categoryId)->first();
    }

    public function updateCategoryList($categoryList){
        CategoriesList::truncate();
        foreach ($categoryList as $category){
            CategoriesList::create([
                'category_id' => $category,
            ]);
        }

        return CategoriesList::with('TvCategory')->get();
    }

    public function updateChannelList($categoryId, $channelList){
        ChannelList::where('category_id', $categoryId)->delete();
        foreach($channelList as $channel){
            ChannelList::create([
                'channel_id'=>$channel,
                'category_id' => $categoryId,
            ]);
        }
    }

}
