<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.05.2019
 * Time: 21:58
 */

namespace app\widgets;


use \app\models\tables\Task;
use app\models\tables\TaskComments;
use \yii\base\Widget;

class CommentView extends Widget
{
  public $taskComment;

  public function run(){
    if (isset($this->taskComment)){
      return $this->render('commentView', [
        'taskComment' => $this->taskComment,
      ]);
    }
    throw new \Exception('Wrong object');
  }
}