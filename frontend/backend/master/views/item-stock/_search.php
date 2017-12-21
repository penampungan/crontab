<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemStockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-stock-search">

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

    <?php // echo $form->field($model, 'STOCK') ?>

    <?php // echo $form->field($model, 'TGL_BELI') ?>

    <?php // echo $form->field($model, 'HARGA_BELI') ?>

    <?php // echo $form->field($model, 'MARGIN_KEUNTUNGAN') ?>

    <?php // echo $form->field($model, 'MAX_DISCOUNT') ?>

    <?php // echo $form->field($model, 'DCRIPT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
