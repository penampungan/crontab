<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePakage */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Store Pakages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-pakage-view">

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
            'PAKAGE',
            'PAKAGE_PARENT',
            'PAKAGE_NM',
            'PAKAGE_DURATION',
            'PAKAGE_BONUS',
            'AFILIASI_KODE',
            'AFILIASI_BONUS',
            'PAKAGE_PRICE',
        ],
    ]) ?>

</div>
