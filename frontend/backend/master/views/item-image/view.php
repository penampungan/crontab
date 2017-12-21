<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemImage */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Item Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-image-view">

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
            'IMG64:ntext',
            'IMGNM:ntext',
        ],
    ]) ?>

</div>
