<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 26.05.2019
 * Time: 19:37
 */

namespace app\commands;


use app\models\tables\Task;
use app\models\tables\Users;
use yii\console\Controller;
use yii\helpers\Url;

class TaskController extends Controller
{
  /**
   * Test console func
   */
  public function actionTest(){
    $tasks = Task::getTaskDeadline24();
    var_dump($tasks);
  }

  public function actionTaskDeadline(){
    $tasks = Task::getTaskDeadline24();
    if (isset($tasks)){
      foreach ($tasks as $task){
        $user = $task->responsible;

        $body = "Истекает срок выполнения задачи - ($task->name).
        Ссылка на задачу - " . Url::toRoute(['task/view', 'id' => $task->id], true);

        echo "Истекает срок выполнения задачи - ($task->name), ".Url::toRoute(['task/view', 'id' => $task->id], true)."\r\n";

        \Yii::$app->mailer->compose()
          ->setTo($user->email)
          ->setFrom('admin@gmail.com')
          ->setSubject("Истекает срок выполнения задачи - " . $task->name)
          ->setTextBody($body)
          ->send();

      }
    }
  }

}