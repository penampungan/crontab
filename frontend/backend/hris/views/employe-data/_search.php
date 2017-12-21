<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employe-data-search">

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

    <?php // echo $form->field($model, 'ACCESS_UNIX') ?>

    <?php // echo $form->field($model, 'OUTLET_CODE') ?>

    <?php // echo $form->field($model, 'EMP_ID') ?>

    <?php // echo $form->field($model, 'EMP_NM_DPN') ?>

    <?php // echo $form->field($model, 'EMP_NM_TGH') ?>

    <?php // echo $form->field($model, 'EMP_NM_BLK') ?>

    <?php // echo $form->field($model, 'EMP_KTP') ?>

    <?php // echo $form->field($model, 'EMP_ALAMAT') ?>

    <?php // echo $form->field($model, 'EMP_GENDER') ?>

    <?php // echo $form->field($model, 'EMP_STS_NIKAH') ?>

    <?php // echo $form->field($model, 'EMP_TLP') ?>

    <?php // echo $form->field($model, 'EMP_HP') ?>

    <?php // echo $form->field($model, 'EMP_EMAIL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
