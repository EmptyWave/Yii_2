<?php
use yii\helpers\Html;
?>

<div class="guest-box">
  <p class="task-form__header">Вы не авторизованы, пожалуста зайдите под своей учетной записью или зарегистрируйтесь.</p>
  <div>

    <?= Html::a('Login',
      ['/site/login'],
      ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    <?= Html::a('Registration',
      ['/site/registration'],
      ['class' => 'btn btn-default', 'name' => 'registration-button']) ?>
  </div>
</div>