<?php

namespace app\models\tables;

use app\controllers\TaskController;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
 * @property string $created
 * @property string $modified
 *
 * @property TaskStatuses $status
 * @property TaskAttachments $TaskAttachments
 * @property TaskComments $TaskComments
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
            [['deadline', 'created', 'modified'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app','task_name'),
            'description' => Yii::t('app','description'),
            'creator_id' => Yii::t('app','creator'),
            'responsible_id' => Yii::t('app','responsible'),
            'deadline' => Yii::t('app','deadline'),
            'status_id' => Yii::t('app','status'),
            'created' => Yii::t('app','created'),
            'modified' => Yii::t('app','modified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(TaskStatuses::class, ['id' => 'status_id']);
    }

    public function getCreator()
    {
        return $this->hasOne(Users::class, ['id' => 'creator_id']);
    }

    public function getResponsible()
    {
        return $this->hasOne(Users::class, ['id' => 'responsible_id']);
    }

    public function getCreatedDate()
    {
        return  date('d-m-Y', strtotime($this->created));
    }

    public function getModifiedDate()
    {
        return  date('d-m-Y', strtotime($this->modified));
    }

    public function getTaskAttachments()
    {
      return $this->hasMany(TaskAttachments::class,['task_id' => 'id']);
    }
    public function getTaskComments()
    {
      return $this->hasMany(TaskComments::class,['task_id' => 'id']);
    }

    public static function getCreateMonthList()
    {
        $monthList = static::find()
            ->select(['created'])
            ->indexBy('created')
            ->orderBy('created')
            ->column();

        $newMonthList = [];
        foreach ($monthList as $key => $date) {
            $monthNum = date('m', strtotime($date));
            $yearNum = date('Y', strtotime($date));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            $newDate = $monthName . ' ' . $yearNum;
            if (!in_array($newDate, $newMonthList)) {
                $newKey = $yearNum . '-' . $monthNum . '[\d\W]*';
                $newMonthList[$newKey] = $newDate;
            }
        }
        return $newMonthList;
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'modified',
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
}
