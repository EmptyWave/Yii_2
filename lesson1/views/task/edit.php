<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs']['homeLink'] = ['label' => 'Tasks', 'url' => '?r=task%2Findex'];
$this->params['breadcrumbs'][] = $this->title;

?>
<h3>А тут редактор тасков</h3>