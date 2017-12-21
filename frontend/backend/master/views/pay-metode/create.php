<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\master\models\PayMetode */

$this->title = 'Create Pay Metode';
$this->params['breadcrumbs'][] = ['label' => 'Pay Metodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-metode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
