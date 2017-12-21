<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeAbsenImage */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Employe Absen Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-absen-image-view">

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
            'EMP_ID',
            'TGL',
            'IMG_MASUK:ntext',
            'IMG_KELUAR:ntext',
        ],
    ]) ?>

</div>
