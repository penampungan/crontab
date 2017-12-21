<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\backend\afiliasi\models\AfiliasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="afiliasi-search">

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

    <?php // echo $form->field($model, 'AFILIASI_KODE') ?>

    <?php // echo $form->field($model, 'AFILIASI_URL') ?>

    <?php // echo $form->field($model, 'PAKAGE') ?>

    <?php // echo $form->field($model, 'PAKAGE_NM') ?>

    <?php // echo $form->field($model, 'PAKAGE_DURATION') ?>

    <?php // echo $form->field($model, 'PAKAGE_PRICE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
