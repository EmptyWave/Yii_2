<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_comments}}`.
 */
class m190524_190530_create_task_comments_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->createTable('{{%task_comments}}', [
      'id' => $this->primaryKey(),
      'task_id' => $this->integer(),
      'creator_id' => $this->integer(),
      'comment' => $this->text(),
      'created' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
      'modified' => $this->timestamp()
    ]);

    $this->addForeignKey('fk_comments_tasks', 'task_comments', 'task_id', 'task', 'id');
    $this->addForeignKey('fk_comments_users', 'task_comments', 'creator_id', 'users', 'id');
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_task_comments','task_comments');
    $this->dropForeignKey('fk_users_comments','task_comments');
    $this->dropTable('{{%task_comments}}');
  }
}
