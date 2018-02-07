<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public $enableCsrfValidation=false;
    public function _success($data='',$msg='')
    {
        $arr = array(
            'status' => 200,
            'data' => $data,
            'msg' => $msg
        );
        return json_encode($arr);
    }

    public function _error($status,$data='',$msg='')
    {
        $arr = array(
            'status' => $status,
            'data' => $data,
            'msg' => $msg
        );
        return json_encode($arr);
    }

}