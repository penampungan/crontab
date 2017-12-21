<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeData */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Employe Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-data-view">

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
            'ACCESS_UNIX',
            'OUTLET_CODE',
            'EMP_ID',
            'EMP_NM_DPN',
            'EMP_NM_TGH',
            'EMP_NM_BLK',
            'EMP_KTP',
            'EMP_ALAMAT:ntext',
            'EMP_GENDER',
            'EMP_STS_NIKAH',
            'EMP_TLP',
            'EMP_HP',
            'EMP_EMAIL:email',
        ],
    ]) ?>

</div>
