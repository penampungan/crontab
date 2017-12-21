<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CREATE_BY') ?>

    <?= $form->field($model, 'CREATE_AT') ?>

    <?= $form->field($model, 'UPDATE_BY') ?>

    <?= $form->field($model, 'UPDATE_AT') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'TRANS_ID') ?>

    <?php // echo $form->field($model, 'ACCESS_UNIX') ?>

    <?php // echo $form->field($model, 'TRANS_DATE') ?>

    <?php // echo $form->field($model, 'OUTLET_ID') ?>

    <?php // echo $form->field($model, 'OUTLET_NM') ?>

    <?php // echo $form->field($model, 'ITEM_ID') ?>

    <?php // echo $form->field($model, 'ITEM_NM') ?>

    <?php // echo $form->field($model, 'ITEM_QTY') ?>

    <?php // echo $form->field($model, 'SATUAN') ?>

    <?php // echo $form->field($model, 'HARGA') ?>

    <?php // echo $form->field($model, 'DISCOUNT') ?>

    <?php // echo $form->field($model, 'DISCOUNT_STT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
