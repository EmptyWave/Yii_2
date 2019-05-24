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
use app\models\tables\users;

class RegistrationForm extends Model
{
  public $username;
  public $password;
  public $email;
  public $phone;

    private $_user = false;

  public function rules()
  {
    return [
      [['username', 'password', 'email', 'phone'], 'required'],
      ['username', 'validateUserName'],
      ['password', 'string','min' => 8],
      ['email', 'email'],
      ['phone', 'number','min' => 11],
    ];
  }

    public function validateUserName($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user) {
                $this->addError($attribute, 'This username already exists');
            }
        }
    }

  public function validatePhone($attribute, $params)
  {

  }

  public function registration($userData){
      if ($this->validate()) {
          $model = new User();
          return $model->registration($userData);
      }
      return false;

  }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
            return $this->_user;
        }
        return false;
    }

}