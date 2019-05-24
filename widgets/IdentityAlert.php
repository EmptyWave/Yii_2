<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 05.05.2019
 * Time: 16:39
 */

namespace app\widgets;


use yii\base\Widget;

class IdentityAlert extends Widget
{
  public function run(){
      return $this->render('guestView', []);
    }
}