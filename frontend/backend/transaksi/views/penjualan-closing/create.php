<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanClosing */

$this->title = 'Create Penjualan Closing';
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Closings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-closing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
