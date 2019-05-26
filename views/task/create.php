<?php

use yii\helpers\Html;

$this->title = Yii::t('app','title_create_task');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

  <?= Yii::$app->user->isGuest ?
  \app\widgets\IdentityAlert::widget([])
    :
   $this->render('forms\_form', [
    'model' => $model,
    'usersList' => $usersList,
    'statusList' => $statusList,
  ]) ?>

</div>
