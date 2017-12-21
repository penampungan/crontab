<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\backend\transaksi\models\PenjualanClosingBuktiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penjualan Closing Buktis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-closing-bukti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penjualan Closing Bukti', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'CLOSING_ID',
            // 'ACCESS_UNIX',
            // 'STORAN_DATE',
            // 'OUTLET_ID',
            // 'TTL_STORAN',
            // 'IMG:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
