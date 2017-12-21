<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanClosingBukti */

$this->title = 'Create Penjualan Closing Bukti';
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Closing Buktis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-closing-bukti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
