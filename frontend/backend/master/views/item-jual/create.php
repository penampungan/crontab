<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemJual */

$this->title = 'Create Item Jual';
$this->params['breadcrumbs'][] = ['label' => 'Item Juals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-jual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
