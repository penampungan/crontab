<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanDetail */

$this->title = 'Create Penjualan Detail';
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
