<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeAbsenImage */

$this->title = 'Create Employe Absen Image';
$this->params['breadcrumbs'][] = ['label' => 'Employe Absen Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-absen-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
