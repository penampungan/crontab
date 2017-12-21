<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\transaksi\models\PenjualanDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'TRANS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACCESS_UNIX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TRANS_DATE')->textInput() ?>

    <?= $form->field($model, 'OUTLET_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OUTLET_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ITEM_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ITEM_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ITEM_QTY')->textInput() ?>

    <?= $form->field($model, 'SATUAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISCOUNT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISCOUNT_STT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
