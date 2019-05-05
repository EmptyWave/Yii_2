<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_status}}`.
 */
class m190505_162434_create_task_statuses_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('task_statuses', [
      'id' => $this->primaryKey(),
      'title' => $this->string()->notNull(),
      'description' => $this->string()->notNull(),
    ]);

    $this->batchInsert('task_statuses', ['title'], [
      ['Новая'],
      ['В работе'],
      ['Выполнена'],
      ['Закрыта'],
      ['Тестирование'],
      ['На доработке'],
      ['На модерации'],
      ['Редактируется'],
    ]);

    $this->addForeignKey('fk_task_statuses', 'task', 'status_id', 'task_statuses', 'id');

    $this->update('task', ['status_id' => 1]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%task_statuses}}');
  }
}
