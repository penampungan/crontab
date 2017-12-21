<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanHeader */

$this->title = 'Create Penjualan Header';
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
