<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\_registrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','title_registration');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('forms\_registrationForm', [
  'model' => $model,
])?>
