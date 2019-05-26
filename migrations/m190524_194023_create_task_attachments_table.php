<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_attachments}}`.
 */
class m190524_194023_create_task_attachments_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%task_attachments}}', [
      'id' => $this->primaryKey(),
      'task_id' => $this->integer(),
      'path' => $this->string()
    ]);

    $this->addForeignKey('fk_attachments_tasks','task_attachments','task_id','task','id');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('task_attachments', 'fk_attachments_tasks');
    $this->dropTable('{{%task_attachments}}');
  }
}
