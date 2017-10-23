<?php

use yii\db\Migration;

class m171023_155521_create_login_attempt_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('login_attempt', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'amount' => $this->integer(2)->defaultValue(1),
            'reset_at' => $this->timestamp(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addIndex('login_attempt_key_index', 'login_attempt', 'key');
        $this->addIndex('login_attempt_amount_index', 'login_attempt', 'amount');
        $this->addIndex('login_attempt_reset_at_index', 'login_attempt', 'reset_at');
    }

    public function safeDown()
    {
        $this->dropTable('login_attempt');
    }
}
