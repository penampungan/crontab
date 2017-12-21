<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePayment */

$this->title = 'Create Store Payment';
$this->params['breadcrumbs'][] = ['label' => 'Store Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-payment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
