<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\backend\payment\models\StorePakageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Store Pakages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-pakage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Store Pakage', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'PAKAGE',
            // 'PAKAGE_PARENT',
            // 'PAKAGE_NM',
            // 'PAKAGE_DURATION',
            // 'PAKAGE_BONUS',
            // 'AFILIASI_KODE',
            // 'AFILIASI_BONUS',
            // 'PAKAGE_PRICE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
