<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GxGameList */

$this->title = 'Create Gx Game List';
$this->params['breadcrumbs'][] = ['label' => 'Gx Game Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gx-game-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
