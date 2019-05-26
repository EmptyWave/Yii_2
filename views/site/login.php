<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','title_login');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('forms\_loginForm', [
  'model' => $model,
])?>