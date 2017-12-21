<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemFdiscount */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Item Fdiscounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-fdiscount-view">

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
            'ITEM_ID',
            'OUTLET_CODE',
            'HARI',
            'PERIODE_TGL1',
            'PERIODE_TGL2',
            'PERIODE_TIME1',
            'PERIODE_TIME2',
            'DISCOUNT_PERCENT',
            'DCRIPT:ntext',
        ],
    ]) ?>

</div>
