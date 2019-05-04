<!--<div class="task_view__row">
  <h3><?/*= $taskData['name'] */?></h3>
  <p><?/*= $taskData['status_id']*/?></p>
</div>
<div class="task_view__row">
  <div class="task_view__party">
    <p><?/*= 'Creator:'.$taskData['creatorName']*/?></p>
    <p><?/*= 'Responsible:'.$taskData['responsibleName']*/?></p>
  </div>
  <p><?/*= 'Deadline:'.$taskData['deadline']*/?></p>
</div>
<p><?/*= 'Description:'.$taskData['description']*/?></p>
-->

<?= \app\widgets\TaskView::widget([
  'model' => $model,
  'link' => false,
]); ?>