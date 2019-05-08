<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\tables\Users;
?>

<a href="<?=Url::to(['task/view', 'id' => $model->id])?>"
   class="task-view__link <?= $link?'':'disabled w60' ?>">
  <div class="task-view <?=$link?'task-view__hover':''?>">
    <div class="task-view__row">
      <h4><?= $model->name?></h4>
      <p><?= 'Status: '.$model->status->title?></p>
    </div>
    <div class="task-view__row">
      <div class="task-view__party">
        <p><?= 'Creator: '.$model->creator->username?></p>
        <p><?= 'Responsible: '.$model->responsible->username?></p>
      </div>
      <p><?= 'Deadline: '.$model->deadline?></p>
    </div>
    <p class="<?= $link?'task-view__description__cut':'' ?>"><?= 'Description: '.$model->description?></p>
      <div class="task-view__row">
          <p><?= 'Created: '.$model->createdDate?></p>
          <p><?= 'Modified: '.$model->modified?></p>
      </div>
  </div>
</a>