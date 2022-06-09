<?php

use yii\db\Migration;

/**
 * Class m220524_115144_comments
 */
class m220524_115144_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(),
            'text' => $this->string(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220524_115144_comments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220524_115144_comments cannot be reverted.\n";

        return false;
    }
    */
}
