<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190420_193433_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
          'id' => $this->primaryKey(),
          'name' => $this->string()->notNull(),
          'description' => $this->string()->notNull(),
          'creator_id' => $this->integer(),
          'responsible_id' => $this->integer(),
          'deadline' => $this->date(),
          'status_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
