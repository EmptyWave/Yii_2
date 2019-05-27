<?php

namespace app\models\tables;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $passwordHash
 * @property string $authKey
 * @property string $accessToken
 * @property string $email
 * @property string $phone
 * @property int $userType_id
 */
class Users extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'passwordHash', 'authKey', 'accessToken', 'email', 'phone', 'userType_id'], 'required'],
            [['userType_id'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['passwordHash'], 'string', 'max' => 60],
            [['authKey', 'accessToken', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'passwordHash' => 'Password Hash',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'email' => 'Email',
            'phone' => 'Phone',
            'userType_id' => 'User Type ID',
        ];
    }

    public static function getUsersList(){
      return static::find()
        ->select(['username'])
        ->indexBy('id')
        ->column();
    }
}
