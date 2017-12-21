<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePayment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'ACCESS_UNIX')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'OUTLET_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OUTLET_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STORE_STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FAKTURE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FAKTURE_DATE')->textInput() ?>

    <?= $form->field($model, 'FAKTURE_TEMPO')->textInput() ?>

    <?= $form->field($model, 'PAY_PAKAGE')->textInput() ?>

    <?= $form->field($model, 'PAY_DATE')->textInput() ?>

    <?= $form->field($model, 'PAY_DURATION_ACTIVE')->textInput() ?>

    <?= $form->field($model, 'PAY_DURATION_BONUS')->textInput() ?>

    <?= $form->field($model, 'PAY_TOTAL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
