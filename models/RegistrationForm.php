<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 21.04.2019
 * Time: 2:07
 */

namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
  public $username;
  public $password;
  public $email;
  public $phone;

  public function rules()
  {
    return [
      [['username', 'password', 'email', 'phone'], 'required'],
      ['password', 'validatePassword'],
      ['email', 'validateEmail'],
      ['phone', 'validatePhone'],
    ];
  }

  public function validatePassword($attribute, $params)
  {

  }
  public function validateEmail($attribute, $params)
  {

  }
  public function validatePhone($attribute, $params)
  {

  }

}