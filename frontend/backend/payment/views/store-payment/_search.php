<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-payment-search">

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

    <?php // echo $form->field($model, 'OUTLET_NM') ?>

    <?php // echo $form->field($model, 'STORE_STATUS') ?>

    <?php // echo $form->field($model, 'FAKTURE') ?>

    <?php // echo $form->field($model, 'FAKTURE_DATE') ?>

    <?php // echo $form->field($model, 'FAKTURE_TEMPO') ?>

    <?php // echo $form->field($model, 'PAY_PAKAGE') ?>

    <?php // echo $form->field($model, 'PAY_DATE') ?>

    <?php // echo $form->field($model, 'PAY_DURATION_ACTIVE') ?>

    <?php // echo $form->field($model, 'PAY_DURATION_BONUS') ?>

    <?php // echo $form->field($model, 'PAY_TOTAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
