<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\backend\afiliasi\models\AfiliasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Afiliasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Afiliasi', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'AFILIASI_KODE',
            // 'AFILIASI_URL:ntext',
            // 'PAKAGE',
            // 'PAKAGE_NM',
            // 'PAKAGE_DURATION',
            // 'PAKAGE_PRICE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
