<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Task */

$this->title = 'Edit Task: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="task-update">

  <?= $this->render('forms\_form', [
    'model' => $model,
    'usersList' => $usersList,
    'statusList' => $statusList,
  ]) ?>

</div>
