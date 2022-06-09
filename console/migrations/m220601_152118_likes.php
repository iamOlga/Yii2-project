<?php

use yii\db\Migration;

/**
 * Class m220601_152118_likes
 */
class m220601_152118_likes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('likes', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(),
            'doctor' => $this->string(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220601_152118_likes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220601_152118_likes cannot be reverted.\n";

        return false;
    }
    */
}
