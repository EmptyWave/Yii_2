<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\tables\Users;
?>

<a href="<?=Url::to(['task/view', 'id' => $model->id])?>"
   class="task_view__link <?= $link?'':'disabled' ?>">
  <div class="task_view <?=$link?'task_view__hover':''?>">
    <div class="task_view__row">
      <h4><?= $model->name?></h4>
      <p><?= 'Status: '.$model->status->title?></p>
    </div>
    <div class="task_view__row">
      <div class="task_view__party">
        <p><?= 'Creator: '.$model->creator->username?></p>
        <p><?= 'Responsible: '.$model->responsible->username?></p>
      </div>
      <p><?= 'Deadline: '.$model->deadline?></p>
    </div>
    <p><?= 'Description: '.$model->description?></p>
  </div>
</a>