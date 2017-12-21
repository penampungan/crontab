<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePayment */

$this->title = 'Update Store Payment: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Store Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
