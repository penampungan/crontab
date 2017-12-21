<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\payment\models\StorePakage */

$this->title = 'Create Store Pakage';
$this->params['breadcrumbs'][] = ['label' => 'Store Pakages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-pakage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
