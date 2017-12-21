<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanClosingBukti */

$this->title = 'Update Penjualan Closing Bukti: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Closing Buktis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-closing-bukti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
