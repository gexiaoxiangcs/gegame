<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class LoginController extends AuthController
{
    public function actionNewLogin() {
        return $this->renderUrl();
    }

    public function actionVerify() {
        header('Location:www.baidu.com');
    }
}