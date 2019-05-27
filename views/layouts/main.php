<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\TaskAsset;

AppAsset::register($this);
TaskAsset::register($this);

$TaskCreate = Yii::$app->user->can('TaskCreate');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <?php
  NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
      'class' => 'navbar-inverse navbar-fixed-top',
    ],
  ]);
  echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
      ['label' => Yii::t('app','home'), 'url' => ['/site/index']],
      Yii::$app->user->can('TaskCreate')?['label' => Yii::t('app','create_task'), 'url' => ['/task/create']]:'',
      ['label' => Yii::t('app','active'), 'url' => ['/task/active']],
      ['label' => Yii::t('app','about'), 'url' => ['/site/about']],
      Yii::$app->user->isGuest ? (
      ['label' => Yii::t('app','login'), 'url' => ['/site/login']]
      ) : (
        '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
          Yii::t('app','logout').' (' . Yii::$app->user->identity->username . ')',
          ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>'
      ),
      ['label' => Yii::t('app','language'), 'items' => [
          ['label' => 'Русский', 'url' => ['site/lang', 'lang' => 'ru']],
          ['label' => 'English', 'url' => ['site/lang', 'lang' => 'en']],
      ]]
    ],
  ]);
  NavBar::end();
  ?>

  <div class="container">
    <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

    <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
