<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Task Manager+';
?>

<h3>Тут могли быть ваши таски (ну т.е. все таски, мб даже история)</h3>
<h5>homeURL - <?=Yii::$app->homeUrl?></h5>
<h5>admin_hash - <?=Yii::$app->getSecurity()->generatePasswordHash('admin')?></h5>
<!--<h5>admin_verify - <?/*=Yii::$app->getSecurity()->validatePassword('admin', '$2y$13$E5u6.FFZ2XmGhk1GpyarIe.5bzavRH18mASAtGWdZ/rewriqYmtlK')*/?></h5>
<h5>demo_hash - <?/*=Yii::$app->getSecurity()->generatePasswordHash('demo')*/?></h5>
<h5>demo_verify - <?/*=Yii::$app->getSecurity()->validatePassword('demo', '$2y$13$teOAILNJrfroJ9zqNKBiKOyVGiY7IH4TyGH5FTktOvKHu/1ZpyRPu')*/?></h5>
-->