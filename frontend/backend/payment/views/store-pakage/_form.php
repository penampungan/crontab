<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePakage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-pakage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'PAKAGE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAKAGE_PARENT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAKAGE_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAKAGE_DURATION')->textInput() ?>

    <?= $form->field($model, 'PAKAGE_BONUS')->textInput() ?>

    <?= $form->field($model, 'AFILIASI_KODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AFILIASI_BONUS')->textInput() ?>

    <?= $form->field($model, 'PAKAGE_PRICE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
