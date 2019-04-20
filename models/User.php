<?php

namespace app\models;

use app\models\tables\Users;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
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

  public function setPasswordHash($password){
    $this->passwordHash = \Yii::$app->getSecurity()->generatePasswordHash($password);
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
}
