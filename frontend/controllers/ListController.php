<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\GxGameList;

class ListController extends BaseController
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    public function actionGetlist() {
        if (!Yii::$app->request->isAjax) {
            return $this->_error('401');
        } else {
            $model = new GxGameList();
            $data = $model->getlist();
            return $this->_success($data);
        }
    }
}