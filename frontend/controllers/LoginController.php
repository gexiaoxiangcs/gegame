<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class LoginController extends AuthController
{
    public function init() {
        $this->auth();
    }
//    public function actionNewLogin() {
//        return $this->renderUrl();
//    }
//wechat服务器配置url验证
    public function actionVerify() {
        $this->verify();
    }

    public function actionAuth() {
        return $this->auth();
    }

    public function actionIndex() {
        var_dump($this->openid);
    }
}