<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190420_193531_create_users_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%users}}', [ // TODO: позднее часть можно будет удалить
      'id' => $this->primaryKey(11),
      'username' => $this->string(20)->notNull(),
      'passwordHash' => $this->string(60)->notNull(),
      'authKey' => $this->string()->notNull(),
      'accessToken' => $this->string()->notNull(),
      'email' => $this->string()->notNull(),
      'phone' => $this->string(16)->notNull(),
      'userType_id' => $this->integer(11)->notNull(),
    ]);

    $this->insert('users', [
      'id' => 1,
      'username' => 'admin',
      'passwordHash' => '$2y$13$E5u6.FFZ2XmGhk1GpyarIe.5bzavRH18mASAtGWdZ/rewriqYmtlK',
      'authKey' => 'test100key',
      'accessToken' => '100-token',
      'email' => 'admin@gmail.com',
      'phone' => '+7(999)999-99-99',
      'userType_id' => 9,
    ]);

    $this->insert('users', [
      'id' => 2,
      'username' => 'demo',
      'passwordHash' => '$2y$13$teOAILNJrfroJ9zqNKBiKOyVGiY7IH4TyGH5FTktOvKHu/1ZpyRPu',
      'authKey' => 'test101key',
      'accessToken' => '101-token',
      'email' => 'demo@gmail.com',
      'phone' => '+7(999)999-99-98',
      'userType_id' => 1,
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->delete('users', ['id' => 2]);
    $this->delete('users', ['id' => 1]);
    $this->dropTable('{{%users}}');
  }
}
