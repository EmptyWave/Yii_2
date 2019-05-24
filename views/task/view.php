<?php
use yii\helpers\Html;
?>

<div class="task-container">

<?= \app\widgets\TaskView::widget([
  'model' => $model,
  'link' => false,
]); ?>

  <div class="task-btn-box">
    <?= Yii::$app->user->isGuest ? '' : Html::a('Update', ['edit', 'id' => $model->id], [
        'class' => 'btn btn-primary task-btn'
    ]) ?>
    <?= Yii::$app->user->isGuest ? '' : Html::a('Delete', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger task-btn',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </div>
</div>
