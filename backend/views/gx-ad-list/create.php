<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GxAdList */

$this->title = 'Create Gx Ad List';
$this->params['breadcrumbs'][] = ['label' => 'Gx Ad Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gx-ad-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
