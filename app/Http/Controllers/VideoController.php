<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function check(){
        $url = 'https://mytv.com.vn/truyen-hinh/210?type=1';

        // Get the content of the webpage
        $html = file_get_contents($url);
        dd($html);
    }
    public function takem3u8(){

        $url = "https://s2129134.cdn.mytvnet.vn/v5live.m3u8?c=vstv261&q=hd&deviceType=127&userId=31249428&deviceId=&type=tv&p=0&zn=netott&rkey=31249428l6byaPbe&ctl=9.41&hc=ctl13&sl=6&drmsrv=ctl13.mytvnet.vn&naddr=113.171.129.134&pkg=pkg32.hni&profiles=hd,sd,high&&bhd=6000000&bsd=3000000&bhi=1500000&location=FPT&rbk=17216240187&pnode=172.16.237.68&isp=all";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = [];
        $headers[] = 'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36';
        $headers[] = 'Content-Type:application/vnd.apple.mpegurl';
        $headers[] = 'Authority:s2129133.cdn.mytvnet.vn';
        $headers[] = 'Path:/v5live.m3u8?c=vstv451&q=hd&deviceType=127&userId=31249428&deviceId=&type=tv&p=0&zn=netott&rkey=31249428wQ5bFk2y&ctl=9.40&hc=ctl12&sl=2&drmsrv=ctl12.mytvnet.vn&naddr=113.171.129.133&pkg=pkg12.hni&profiles=hd,sd,high,medium&&bhd=6000000&bsd=3000000&bhi=1500000&bme=1000000&location=HNI&rbk=17216240186&pnode=172.16.237.68&isp=all';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if(curl_errno($ch)){
            dd( curl_error($ch));
        }
        dd($result);

        curl_close($ch);
        preg_match('/"url":"(.*?)"/', $result, $link);
        $output= $link[1];

        $links = str_replace('q=auto', 'q=hd', $output);

        dd($links);


    }

    public function curl($url) {
        $ch = @curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $head[] = "Connection: keep-alive";
        $head[] = "Keep-Alive: 300";
        $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $head[] = "Accept-Language: en-us,en;q=0.5";
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $page = curl_exec($ch);
        curl_close($ch);
        return $page;
    }
    public function getIdYoutube($link){
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $id);
        if(!empty($id)) {
            return $id = $id[0];
        }
        return $link;
    }
    public function getVideoYoutube($link) {
        $id = $this->getIdYoutube($link);
        $getlink = "https://www.youtube.com/watch?v=".$id;
        if ($get = $this->curl($getlink )) {
            $return = array();
            if (preg_match('/;ytplayer\.config\s*=\s*({.*?});/', $get, $data)) {
                $jsonData  = json_decode($data[1], true);
                $streamMap = $jsonData['args']['url_encoded_fmt_stream_map'];
                foreach (explode(',', $streamMap) as $url)
                {
                    $url = str_replace('\u0026', '&', $url);
                    $url = urldecode($url);
                    parse_str($url, $data);
                    $dataURL = $data['url'];
                    unset($data['url']);
                    $return[$data['quality']."-".$data['itag']] = $dataURL.'&'.urldecode(http_build_query($data));
                }
            }
            return $return;
        }else{
            return 0;
        }
    }

    public function takem3u81(Request $request){
        // echo '<pre>';
        // print_r($this->getVideoYoutube('https://www.youtube.com/watch?v=KjuGYC88CA8'));
        // echo '</pre>';
        dd($this->getVideoYoutube('https://www.youtube.com/watch?v=KjuGYC88CA8'));
    }

}
