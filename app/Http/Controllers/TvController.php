<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\LOG;

use Illuminate\Http\Request;
use App\Models\TvCategory;
use App\Models\TvChannel;
use App\Services\TvService;
use App\Models\bannerPlayer;
use App\Models\CategoriesList;
use App\Models\ChannelList;

class TvController extends Controller
{
    protected $tvService;
    public function __construct(Request $request, TvService $tvService ){
        $this->middleware('admin.permission')->only(['addCategory',
                                                    'removeCategory',
                                                    'addChannel',
                                                    'removeChannel']);
        $this->tvService = $tvService;
    }
    public function index(){
        $categories = CategoriesList::with('TvCategory')->get();
        $channels =TvChannel::with('tvCategory')->orderBy('channel_name', 'ASC')->get();
        $banner = bannerPlayer::first();

        return view('tv.tvChanel',[
            'categories' => $categories,
            'channels' => $channels,
            'banner' => $banner,
        ]);
    }

    public function tvManagerIndex(Request $request){
        $banner = bannerPlayer::first();
        $categories = CategoriesList::with('TvCategory')->get();
        // dd($categories);
        $channels =ChannelList::with('tvChannel')->get();
        return view('admin.tv.index',[
            'categories' => $categories,
            'channels' => $channels,
            'banner' => $banner,
        ]);
    }

    public function addCategory(Request $request){
        try{
            $category = $this->tvService->addTvCategory($request->categoryName);
            $response['name'] = $category->category_name;
            $response['id'] = $category->id;
            $categories = CategoriesList::with('TvCategory')->get();

            $response['categorySelection']='<select class="select-btn" id="tvChannelCategory" name="tvChannelCategory" style="width:auto;">';
            foreach($categories as $categorySelect){
                $response['categorySelection'] = $response['categorySelection'].'<option value="'.$categorySelect->TvCategory->id.'">'.$categorySelect->TvCategory->category_name.'</option>';
            }
            $response['categorySelection']=$response['categorySelection'].'</select>';

        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Thêm category thanh cong', 'data'=>$response]);
    }

    public function removeCategory(Request $request){
        try{
            $category = $this->tvService->removeTvCategory($request->categoryId);
            $categories = CategoriesList::with('TvCategory')->get();

            $response['categorySelection']='<select class="select-btn" id="tvChannelCategory" name="tvChannelCategory" style="width:auto;">';
            foreach($categories as $categorySelect){
                $response['categorySelection'] = $response['categorySelection'].'<option value="'.$categorySelect->TvCategory->id.'">'.$categorySelect->TvCategory->category_name.'</option>';
            }
            $response['categorySelection']=$response['categorySelection'].'</select>';
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'remove category thanh cong','data'=>$response]);
    }

    public function addChannel(Request $request){
        try{
            $channel = $this->tvService->addChannel($request);
            ChannelList::create([
                'channel_id' => $channel->id,
                'category_id' => $channel->category_id,
            ]);
            $response['id'] = $channel->id;
            // $response['name'] = $channel->channel_name;
            // $response['img'] = $channel->channel_img;
            // $response['url'] = $channel->channel_url;
            $response['categoryId'] = $channel->category_id;
            $onclick = "play('{$channel->channel_url}')";
            $onclickChangeChannel = "changeChannel(".$channel->id.",'{$channel->channel_name}', '{$channel->channel_img}','{$channel->channel_url}', '{$channel->tvCategory->id}')";

            $response['newChannel'] = '<div class="tv-channel-admin" id="channel-'.$channel->id.'">
                                            <img class="tv-channel-img" style="height:6vw !important;" src="'.$channel->channel_img.'" onclick="'.$onclick.'">
                                            <div class="tv-channel-name d-flex justify-content-between" style="color:black !important;">

                                                <span style="width:80%;">
                                                '.$channel->channel_name.'
                                                </span>
                                                <span style="width:20%;" class = "d-flex justify-content-center">
                                                    <div onclick="removeChannel('.$channel->id.')">
                                                        <i  style="margin:5px 5px 0px;" class=" d-flex justify-content-center fa-solid fa-trash"></i>
                                                    </div>

                                                    <div onclick="'.$onclickChangeChannel.'">
                                                        <i style="margin:5px 5px 0px;"  class=" d-flex justify-content-center fa-solid fa-pencil"></i>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>';
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'add channel thanh cong','data'=>$response]);
    }

    public function updateChannel(Request $request){
        try{
            $channel = $this->tvService->changeChannel($request);
            $response['id'] = $channel->id;
            // $response['name'] = $channel->channel_name;
            // $response['img'] = $channel->channel_img;
            // $response['url'] = $channel->channel_url;
            $response['categoryId'] = $channel->category_id;
            $onclick = "play('{$channel->channel_url}')";
            $onclickChangeChannel = "changeChannel(".$channel->id.",'{$channel->channel_name}', '{$channel->channel_img}','{$channel->channel_url}', '{$channel->tvCategory->id}')";

            $response['newChannel'] = '
                                            <img class="tv-channel-img" style="height:6vw !important;" src="'.$channel->channel_img.'" onclick="'.$onclick.'">
                                            <div class="tv-channel-name d-flex justify-content-between" style="color:black !important;">

                                                <span style="width:80%;">
                                                '.$channel->channel_name.'
                                                </span>
                                                <span style="width:20%;" class = "d-flex justify-content-center">
                                                    <div onclick="removeChannel('.$channel->id.')">
                                                        <i  style="margin:5px 5px 0px;" class=" d-flex justify-content-center fa-solid fa-trash"></i>
                                                    </div>

                                                    <div onclick="'.$onclickChangeChannel.'">
                                                        <i style="margin:5px 5px 0px;"  class=" d-flex justify-content-center fa-solid fa-pencil"></i>
                                                    </div>
                                                </span>
                                            </div>
                                       ';
        }catch(\Exception $e){
            LOG::debug('error in updateChannel : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'change channel thanh cong','data'=>$response]);
    }

    public function removeChannel(Request $request){
        try{
            $this->tvService->removeTvChannel($request->channelId);
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'remove channel thanh cong']);
    }

    public function chooseCategory(Request $request){
        try{
            $channels = $this->tvService->takeChannelDependOnCategory($request->categoryId);
            $response['channelListHtmlPc']='';
            $response['channelListHtmlMb']='';
            foreach($channels as $channel){
                $onclick = "openModal('{$channel->tvChannel->channel_url}')";

                $response['channelListHtmlPc'] = $response['channelListHtmlPc'].' <div class="tv-channel" onclick="'.$onclick.'">
                                                                                    <img class="tv-channel-img" src="'.$channel->tvChannel->channel_img.'">

                                                                                </div>';

                                                                                // <span class="tv-channel-name">
                                                                                //         '.$channel->tvChannel->channel_name.'
                                                                                //     </span>

                $response['channelListHtmlMb'] = $response['channelListHtmlMb'].' <div class="tv-channel-mb" onclick="'.$onclick.'">
                                                                                        <img class="tv-channel-img-mb" src="'.$channel->tvChannel->channel_img.'">
                                                                                        <div class="tv-channel-name-mb">
                                                                                            '.$channel->tvChannel->channel_name.'
                                                                                        </div>
                                                                                    </div>';
            }
        }catch(\Exception $e){
            LOG::debug('error in choose category : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'load channel theo category thanh cong', 'data'=>$response]);
    }

    public function searchChannel(Request $request){
        try{
            $channels = $this->tvService->searchChannel($request->searchText);
            $response['channelListHtmlPc']='';
            $response['channelListHtmlMb']='';
            foreach($channels as $channel){
                $onclick = "openModal('{$channel->channel_url}')";

                $response['channelListHtmlPc'] = $response['channelListHtmlPc'].' <div class="tv-channel" onclick="'.$onclick.'">
                                                                                    <img class="tv-channel-img" src="'.$channel->channel_img.'">
                                                                                    <div class="tv-channel-name">
                                                                                        '.$channel->channel_name.'
                                                                                    </div>
                                                                                </div>';


                $response['channelListHtmlMb'] = $response['channelListHtmlMb'].' <div class="tv-channel-mb" onclick="'.$onclick.'">
                                                                                        <img class="tv-channel-img-mb" src="'.$channel->channel_img.'">
                                                                                        <div class="tv-channel-name-mb">
                                                                                            '.$channel->channel_name.'
                                                                                        </div>
                                                                                    </div>';


            }
        }catch(\Exception $e){
            LOG::debug('error in choose category : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'load channel theo category thanh cong', 'data'=>$response]);
    }

    public function tvOld(Request $request){
        return view('tv.tvChanel_raw');
    }

    public function updateBanner(Request $request){
        bannerPlayer::truncate();
        bannerPlayer::create([
            'url' => $request->newBanner,
        ]);

        return redirect()->back();
    }

    public function updateCategory(Request $request){
        try{
            $category = $this->tvService->updateCategory($request->categoryId, $request->categoryName);
            $response['id']=$category->id;
            $response['name']=$category->category_name;
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'update category thanh cong', 'data'=> $response]);
    }

    public function updateCategoryList(Request $request){
        try{
            $response = $this->tvService->updateCategoryList($request->categoryList);
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'update category thanh cong', 'data'=> $response]);
    }

    public function loadCategoryList(){
        CategoriesList::truncate();
        $categories = TvCategory::get();
        foreach($categories as $category){
            CategoriesList::create([
                'category_id'=>$category->id,
            ]);
        }
    }

    public function loadChannelList(){
        ChannelList::truncate();
        $channels = TvChannel::get();
        // dd($channels);
        foreach($channels as $channel){
            ChannelList::create([
                'channel_id' => $channel->id,
                'category_id' => $channel->category_id,
            ]);
        }
    }

    public function takeChannelList(Request $request){
        try{
            $channels = ChannelList::where('category_id', $request->categoryId)->get();
            $tvCategory = TvCategory::find( $request->categoryId);
            $response['categoryName'] = $tvCategory->category_name;
            $response['categoryId'] = $tvCategory->id;

            $response['channelsList'] = '';
            // Log::debug('test : '. print_r($channels,true));
            foreach($channels as $channel){
                $response['channelsList'] = $response['channelsList']. '<div class="tv-channel-admin draggableChannel" id="channel-'.$channel->tvChannel->id.'" draggable="true">
                                            <img class="tv-channel-img" style="height:6vw !important;" src="'.$channel->tvChannel->channel_img.'" >
                                            <div class="tv-channel-name d-flex justify-content-between channelCell" style="color:black !important;" id="channelCell-'.$channel->tvChannel->id.'">

                                                <span style="width:80%;">
                                                '.$channel->tvChannel->channel_name.'
                                                </span>
                                            </div>
                                        </div>';
            }
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'lay channel thanh cong', 'data'=> $response]);
    }

    public function setChannelList(Request $request){
        try{
            $this->tvService->updateChannelList($request->categoryId, $request->channelList);
            $channels = ChannelList::where('category_id', $request->categoryId)->with('tvChannel')->get();
            $response['channels']='';
            $response['categoryId'] =  $request->categoryId;
            foreach($channels as $channel){
                $onclick = "play('{$channel->tvChannel->channel_url}')";
                $onclickChangeChannel = "changeChannel(".$channel->tvChannel->id.",'{$channel->tvChannel->channel_name}', '{$channel->tvChannel->channel_img}','{$channel->tvChannel->channel_url}', '{$channel->tvChannel->tvCategory->id}')";

                $response['channels'] = $response['channels'].' <div class="tv-channel" id="channel-'.$channel->tvChannel->id.'">
                                            <img class="tv-channel-img" style="height:6vw !important;" src="'.$channel->tvChannel->channel_img.'" onclick="'.$onclick.'">
                                            <div class="tv-channel-name d-flex justify-content-between" style="color:black !important;">

                                                <span style="width:80%;">
                                                '.$channel->tvChannel->channel_name.'
                                                </span>
                                                <span style="width:20%;" class = "d-flex justify-content-center">
                                                    <div onclick="removeChannel('.$channel->tvChannel->id.')">
                                                        <i  style="margin:5px 5px 0px;" class=" d-flex justify-content-center fa-solid fa-trash"></i>
                                                    </div>

                                                    <div onclick="'.$onclickChangeChannel.'">
                                                        <i style="margin:5px 5px 0px;"  class=" d-flex justify-content-center fa-solid fa-pencil"></i>
                                                    </div>
                                                </span>
                                            </div>
                                       </div>';
            }
        }catch(\Exception $e){
            LOG::debug('error in addCategory : ' . $e );
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'set channel list thanh cong', 'data'=>$response]);
    }
}

