<?php

use yii\db\Migration;

/**
 * Class m220505_120251_account
 */
class m220505_120251_account extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reception', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'service_id' => $this->integer(),
            'date' => $this->string(),
            'time' => $this->integer(),
            'status' => $this->integer(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220505_120251_account cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220505_120251_account cannot be reverted.\n";

        return false;
    }
    */
}
