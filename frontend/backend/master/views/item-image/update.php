<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemImage */

$this->title = 'Update Item Image: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Item Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
