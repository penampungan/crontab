<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\backend\transaksi\models\PenjualanDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penjualan Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penjualan Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CREATE_BY',
            'CREATE_AT',
            'UPDATE_BY',
            'UPDATE_AT',
            // 'STATUS',
            // 'TRANS_ID',
            // 'ACCESS_UNIX',
            // 'TRANS_DATE',
            // 'OUTLET_ID',
            // 'OUTLET_NM',
            // 'ITEM_ID',
            // 'ITEM_NM',
            // 'ITEM_QTY',
            // 'SATUAN',
            // 'HARGA',
            // 'DISCOUNT',
            // 'DISCOUNT_STT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
