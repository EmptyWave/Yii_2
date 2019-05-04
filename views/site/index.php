<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Task Manager+';
?>
<div class="container">
<?= yii\widgets\ListView::widget([
  'dataProvider' => $dataProvider,
  'options' => [
    'tag' => 'div',
    'class' => 'task-container',
    'id' => 'task-list',
  ],
  'summary' => "",
  'itemView' => function($model){
    return \app\widgets\TaskView::widget(['model' => $model]);
  },
  'itemOptions' => [
    'tag' => false,
  ],
  'viewParams' => [
      'hide' => true
  ]
]);
?>
</div>

