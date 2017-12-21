<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePayment */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Store Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'CREATE_BY',
            'CREATE_AT',
            'UPDATE_BY',
            'UPDATE_AT',
            'STATUS',
            'ACCESS_UNIX:ntext',
            'OUTLET_CODE',
            'OUTLET_NM',
            'STORE_STATUS',
            'FAKTURE',
            'FAKTURE_DATE',
            'FAKTURE_TEMPO',
            'PAY_PAKAGE',
            'PAY_DATE',
            'PAY_DURATION_ACTIVE',
            'PAY_DURATION_BONUS',
            'PAY_TOTAL',
        ],
    ]) ?>

</div>
