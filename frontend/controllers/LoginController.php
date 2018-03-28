<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class LoginController extends AuthController
{
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

    public function actionGo() {
        $code = Yii::$app->request->get('code');
    }

    public function actionIndex() {
        
    }
}