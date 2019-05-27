<?php

namespace app\models;

use app\models\tables\Users;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
  public $id;
  public $username;
  public $passwordHash;
  public $authKey;
  public $accessToken;
  public $email;
  public $phone;
  public $userType_id;

  /**
   * {@inheritdoc}
   */
  public static function findIdentity($id)
  {
    $user = Users::findOne($id)->attributes;

    if (!is_null($user))
      return new static($user);

    return null;
  }

  /**
   * {@inheritdoc}
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    $user = Users::findOne(['accessToken' => $token])->attributes;
    if (!is_null($user))
      return new static($user);

    return null;
  }

  /**
   * Finds user by username
   *
   * @param string $username
   * @return static|null
   */
  public static function findByUsername($username)
  {
    $user = Users::findOne(['username' => $username])->attributes;
    if (!is_null($user))
      return new static($user);

    return null;
  }

  /**
   * {@inheritdoc}
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthKey()
  {
    return $this->authKey;
  }

  public function getHash()
  {
    return $this->passwordHash;
  }


  /**
   * {@inheritdoc}
   */
  public function validateAuthKey($authKey)
  {
    return $this->authKey === $authKey;
  }

  /**
   * Validates password
   *
   * @param string $password password to validate
   * @return bool if password provided is valid for current user
   */

  public function validatePassword($password){
    return \Yii::$app->getSecurity()->validatePassword($password, $this->passwordHash);
  }
    public function getPasswordHash($password){
        return \Yii::$app->getSecurity()->generatePasswordHash($password);
    }

  public function registration($userData){
      $newUserData = [];
      $newUserData['Users']['username'] = $userData['RegistrationForm']['username'];
      $newUserData['Users']['passwordHash'] = $this->getPasswordHash($userData['RegistrationForm']['password']);
      $newUserData['Users']['authKey'] = '1';
      $newUserData['Users']['accessToken'] = '1';
      $newUserData['Users']['email'] = $userData['RegistrationForm']['email'];
      $newUserData['Users']['phone'] = $userData['RegistrationForm']['phone'];
      $newUserData['Users']['userType_id'] = 1;

      $model = new users();
      $model->load($newUserData);
      return $model->save();

  }

}
