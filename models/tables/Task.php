<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $creator_id
 * @property int $responsible_id
 * @property string $deadline
 * @property int $status_id
 */
class Task extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'task';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'description'], 'required'],
      [['creator_id', 'responsible_id', 'status_id'], 'integer'],
      [['deadline'], 'safe'],
      [['name', 'description'], 'string', 'max' => 255],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'description' => 'Description',
      'creator_id' => 'Creator ID',
      'responsible_id' => 'Responsible ID',
      'deadline' => 'Deadline',
      'status_id' => 'Status ID',
    ];
  }

  public function getCreator()
  {
    return $this->hasOne(Users::class, ['id' => 'creator_id']);
  }

  public function getResponsible()
  {
    return $this->hasOne(Users::class, ['id' => 'responsible_id']);
  }
}
