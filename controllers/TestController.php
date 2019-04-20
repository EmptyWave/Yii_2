<?php

namespace app\controllers;

use app\models\Task;
use yii\web\Controller;

class TestController extends Controller
{
  public function actionIndex(){
    $model = new Task();

    $model->setAttributes([
      'title' => 'HelloWorld',
      'description' => 'Lesson Yii 1',
      'author' => 'Admin',
      'responsible' => 200,
      'status' => 'В работе',
    ],false);

    /*$model->load(
      [
      'task'=>[
        'title' => 'Hello, world!',
        'description' => 'Lesson Yii 1',
        'author' => 'Lesson Yii 1',
        'responsible' => 'Lesson Yii 1',
        'status' => 'Lesson Yii 1',
        ],
      ]
    );*/

    var_dump($model->validate());
    var_dump($model->getErrors());
    var_dump($model);

  }

  public function actionHello(){
    return $this->render('hello',[
      'title' => 'Hello, world!',
      'content' => 'Lesson Yii 1',
    ]);
  }
}