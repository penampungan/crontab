<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemStock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'ITEM_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OUTLET_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STOCK')->textInput() ?>

    <?= $form->field($model, 'TGL_BELI')->textInput() ?>

    <?= $form->field($model, 'HARGA_BELI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MARGIN_KEUNTUNGAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MAX_DISCOUNT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DCRIPT')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
