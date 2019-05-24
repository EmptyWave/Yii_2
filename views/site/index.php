<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Task+';
?>

<?= $this->render('forms\_search',[
    'model' => $searchModel,
    'monthList' => $monthList,
])?>

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


