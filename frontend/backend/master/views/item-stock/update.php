<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemStock */

$this->title = 'Update Item Stock: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Item Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
