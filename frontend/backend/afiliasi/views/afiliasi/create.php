<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\afiliasi\models\Afiliasi */

$this->title = 'Create Afiliasi';
$this->params['breadcrumbs'][] = ['label' => 'Afiliasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
