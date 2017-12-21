<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employe-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'ACCESS_UNIX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OUTLET_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_NM_DPN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_NM_TGH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_NM_BLK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_KTP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_ALAMAT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'EMP_GENDER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_STS_NIKAH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_TLP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_HP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMP_EMAIL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
