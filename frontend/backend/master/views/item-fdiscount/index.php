<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\backend\master\models\ItemFdiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Fdiscounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-fdiscount-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item Fdiscount', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'ITEM_ID',
            // 'OUTLET_CODE',
            // 'HARI',
            // 'PERIODE_TGL1',
            // 'PERIODE_TGL2',
            // 'PERIODE_TIME1',
            // 'PERIODE_TIME2',
            // 'DISCOUNT_PERCENT',
            // 'DCRIPT:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
