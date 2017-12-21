<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeAbsen */

$this->title = 'Create Employe Absen';
$this->params['breadcrumbs'][] = ['label' => 'Employe Absens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-absen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
