<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemFdiscount */

$this->title = 'Create Item Fdiscount';
$this->params['breadcrumbs'][] = ['label' => 'Item Fdiscounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-fdiscount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
