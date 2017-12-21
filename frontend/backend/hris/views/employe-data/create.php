<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\backend\hris\models\EmployeData */

$this->title = 'Create Employe Data';
$this->params['breadcrumbs'][] = ['label' => 'Employe Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
