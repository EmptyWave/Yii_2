<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
  'id' => 'basic-console',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'controllerNamespace' => 'app\commands',
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm' => '@vendor/npm-asset',
    '@tests' => '@app/tests',
  ],
  'components' => [
    'authManager' => [
      'class' => \yii\rbac\DbManager::class,
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      // send all mails to a file by default. You have to set
      // 'useFileTransport' to false and configure a transport
      // for the mailer to send real emails.
      'useFileTransport' => true,
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'log' => [
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'db' => $db,
    'urlManager' => [
      'baseURL' => 'http://yii.local/',
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'enableStrictParsing' => true,
      'rules' => [
        'tasks' => 'site/index',
        'task/<id>' => 'task/view',
        'task/edit/<id>' => 'task/edit',
      ],
    ],
  ],
  'params' => $params,
  /*
  'controllerMap' => [
      'fixture' => [ // Fixture generation command line.
          'class' => 'yii\faker\FixtureController',
      ],
  ],
  */
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment
  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
  ];
}

return $config;
