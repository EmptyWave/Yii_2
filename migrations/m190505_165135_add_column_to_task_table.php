<?php

use yii\db\Migration;

/**
 * Class m190505_165135_add_column_to_task_table
 */
class m190505_165135_add_column_to_task_table extends Migration
{
  /**
   * {@inheritdoc}
   */

  public function safeUp()
  {
    $this->addColumn('task', 'created', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
    $this->addColumn('task', 'modified', $this->timestamp());
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropColumn('task', 'created');
    $this->dropColumn('task', 'modified');
  }

  /*
  // Use up()/down() to run migration code without a transaction.
  public function up()
  {

  }

  public function down()
  {
      echo "m190505_165135_add_column_to_task_table cannot be reverted.\n";

      return false;
  }
  */
}
