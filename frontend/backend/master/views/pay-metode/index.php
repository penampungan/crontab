<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\backend\master\models\PayMetodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pay Metodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-metode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pay Metode', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'ACCESS_UNIX',
            // 'OUTLET_CODE',
            // 'TYPE_PAY',
            // 'BANK_NM',
            // 'DCRIPT:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
