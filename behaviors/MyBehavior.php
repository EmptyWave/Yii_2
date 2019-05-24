<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 05.05.2019
 * Time: 0:35
 */

namespace app\behavior;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
  public function display(){
    echo 'hello world!';
  }
}