<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemJualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-jual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CREATE_BY') ?>

    <?= $form->field($model, 'CREATE_AT') ?>

    <?= $form->field($model, 'UPDATE_BY') ?>

    <?= $form->field($model, 'UPDATE_AT') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'ITEM_ID') ?>

    <?php // echo $form->field($model, 'OUTLET_CODE') ?>

    <?php // echo $form->field($model, 'PERIODE_TGL1') ?>

    <?php // echo $form->field($model, 'PERIODE_TGL2') ?>

    <?php // echo $form->field($model, 'START_TIME') ?>

    <?php // echo $form->field($model, 'HARGA_JUAL') ?>

    <?php // echo $form->field($model, 'DCRIPT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
