<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    private $_appid = 'wx7a81e0c6136aa970';
    private $_appsecret = '696d4430efc43a1e18a4fb3c952df366';
    private $redirect_uri = 'http://pzlps.cn/gegame/frontend/web/index.php?r=login/go';
    public $openid = '';
    const QRCODE_TYPE_TEMP = 1;
    const QRCODE_TYPE_LIMIT = 2;
    const QRCODE_TYPE_LIMIT_STR = 3;
    const TOKEN = 'gexiaoxiangcs';
//    private function _request($method='get',$url,$data=array(),$ssl=true){
//        //curl完成，先开启curl模块
//        //初始化一个curl资源
//        $curl = curl_init();
//        //设置curl选项
//        curl_setopt($curl,CURLOPT_URL,$url);//url
//        //请求的代理信息
//        $user_agent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
//        curl_setopt($curl,CURLOPT_USERAGENT,$user_agent);
//        //referer头，请求来源
//        curl_setopt($curl,CURLOPT_AUTOREFERER,true);
//        curl_setopt($curl, CURLOPT_TIMEOUT, 30);//设置超时时间
//        //SSL相关
//        if($ssl){
//            //禁用后，curl将终止从服务端进行验证;
//            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
//            //检查服务器SSL证书是否存在一个公用名
//            curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,2);
//        }
//        //判断请求方式post还是get
//        if(strtolower($method)=='post') {
//            /**************处理post相关选项******************/
//            //是否为post请求 ,处理请求数据
//            curl_setopt($curl,CURLOPT_POST,true);
//            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
//        }
//        //是否处理响应头
//        curl_setopt($curl,CURLOPT_HEADER,false);
//        //是否返回响应结果
//        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//
//        //发出请求
//        $response = curl_exec($curl);
//        if (false === $response) {
//            echo '<br>', curl_error($curl), '<br>';
//            return false;
//        }
//        //关闭curl
//        curl_close($curl);
//        return $response;
//    }

private function _request($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
}

    public function actionGo() {
        $code = Yii::$app->request->get('code');
        $this->getUserinfo($code);
    }

    public function getAccessToken($token_file = '../runtime/access_token'){
        //考虑这个access_token是否过期
        $life_time = 7200;
        //文件存在，并且左后修改时间与当前时间的差小于access_token的有效期，则有效
        if(file_exists($token_file) && time()-filemtime($token_file)<$life_time){
            //得到内容
            return file_get_contents($token_file);
        }

        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->_appid}&secret={$this->_appsecret}";
        //向该地址发送get请求
//        $result = $this->_request('get',$url);
        $result = $this->_request($url);
        //处理响应结果
        if(!$result){
            return false;
        }
        //存在返回响应结果,返回对象
        $result_obj = json_decode($result);
        //写入文件
        file_put_contents($token_file, $result_obj->access_token);
        return $result_obj->access_token;
    }

    public function getUserinfo($code){
        //考虑这个access_token是否过期
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->_appid}&secret={$this->_appsecret}&code={$code}&grant_type=authorization_code";
//        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->_appid}&secret={$this->_appsecret}";
        //向该地址发送get请求
        $result = $this->_request($url);
        //处理响应结果
        if(!$result){
            return false;
        }

        //存在返回响应结果,返回对象
        $result_obj = json_decode($result);
        $this->openid = $result_obj->openid;
        return;
//        $url_userinfo = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
//        $result = $this->_request($url_userinfo);
//        var_dump($result);exit;
    }

//    public function getQRCodeTicket($content,$type=2,$expire=604800){
//        $access_token = $this->getAccessToken();
//        $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token;
//        $type_list = array(
//            self::QRCODE_TYPE_TEMP => 'QR_SCENE',
//            self::QRCODE_TYPE_LIMIT=>'QR_LIMIT_SCENE',
//            self::QRCODE_TYPE_LIMIT_STR=>'QR_LIMIT_STR_SCENE'
//        );
//        $action_name = $type_list[$type];
//        //post发送的数据
//        switch ($type){
//            case self::QRCODE_TYPE_TEMP:
//                $data_arr['expire_seconds']=$expire;
//                $data_arr['action_name'] = $action_name;
//                $data_arr['action_info']['scene']['scene_id']=$content;
//                break;
//            case self::QRCODE_TYPE_LIMIT:
//                $data_arr['action_name'] = $action_name;
//                $data_arr['action_info']['scene']['scene_id'] = $content;
//                break;
//            case self::QRCODE_TYPE_LIMIT_STR:
//                $data_arr['action_name'] = $action_name;
//                $data_arr['action_info']['scene']['scene_str'] = $content;
//                break;
//        }
//        $data = json_encode($data_arr);
//        $result = $this->_request('post',$url,$data);
//        if(!$result){
//            return false;
//        }
//        $result_obj = json_decode($result);
//        return $result_obj->ticket;
//    }

//    public function getQRCode($content='',$file=NULL,$type=2,$expire=604800){
//        //获取ticket
//        $ticket = $this->getQRCodeTicket($content,$type=2,$expire=604800);
//        $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=$ticket";
//        //发送，取得图片数据
//        $result = $this->_request('get',$url);
//        if($file){
//            file_put_contents($file,$result);
//        }else{
//            header('Content-Type:image/jpeg');
//            echo $result;
//        }
//    }

//    public function renderUrl() {
//       $redirect_uri = urlEncode($this->redirect_uri);
//       $url =  'https://open.weixin.qq.com/connect/qrconnect?appid='. $this->_appid .'&redirect_uri='. $redirect_uri . '&response_type=code&scope=snsapi_login&state=dasdasdasda#wechat_redirect';
//        return $this->_request('get',$url);
//    }

    public function verify() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $echoStr = $_GET["echostr"];

        $tmpArr = array(self::TOKEN,$timestamp,$nonce);
        sort($tmpArr,SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );


        if( $signature == $tmpStr )
        {
            echo $echoStr;
        }
        else
            echo "Error";
        exit;
    }

    public function auth() {
        $redirect_uri = urlEncode($this->redirect_uri);
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->_appid . '&redirect_uri=' . $redirect_uri  . '&response_type=code&scope=snsapi_base&state=1#wechat_redirect';
//        return $this->_request('get',$url);
        header('location:'.$url);
    }
}