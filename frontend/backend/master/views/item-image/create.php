<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\backend\master\models\ItemImage */

$this->title = 'Create Item Image';
$this->params['breadcrumbs'][] = ['label' => 'Item Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
