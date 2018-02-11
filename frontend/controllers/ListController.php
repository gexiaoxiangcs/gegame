<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\GxGameList;
use backend\models\GxAdList;

class ListController extends BaseController
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    public function actionGetList() {
        if (!Yii::$app->request->isAjax) {
            return $this->_error('401');
        } else {
            $model = new GxGameList();
            $page = Yii::$app->request->get('page');
            $pageSize = Yii::$app->request->get('pageSize');
            $data = $model->getlist($page,$pageSize);
            return $this->_success($data);
        }
    }

    public function actionGetListNew() {
        if (!Yii::$app->request->isAjax) {
            return $this->_error('401');
        } else {
            $model = new GxGameList();
            $page = Yii::$app->request->get('page');
            $pageSize = Yii::$app->request->get('pageSize');
            $data = $model->getlistnew($page,$pageSize);
            return $this->_success($data);
        }
    }

    public function actionGetListStart() {
        if (!Yii::$app->request->isAjax) {
            return $this->_error('401');
        } else {
            $model = new GxGameList();
            $page = Yii::$app->request->get('page');
            $pageSize = Yii::$app->request->get('pageSize');
            $data = $model->getliststart($page,$pageSize);
            return $this->_success($data);
        }
    }

    public function actionGetPageBase() {
        if (!Yii::$app->request->isAjax) {
            return $this->_error('401');
        } else {
            $model = new GxAdList();
            $data = $model->getlist();
            $data = array(
                'ad' => $data,
                'recent_play' => array(),
                'userinfo' => array(
                    'uid' => 0,
                    'nickname' => '',
                    'headimg' => '',
                    'lv' => 0,
                ),
            );
            return $this->_success($data);
        }
    }
}