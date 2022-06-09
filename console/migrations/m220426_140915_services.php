<?php

use yii\db\Migration;

/**
 * Class m220426_140915_services
 */
class m220426_140915_services extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'service_name' => $this->string(),
            'category_name' => $this->string(),
            'doctor' => $this->string(),
            'price' => $this->integer(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220426_140915_services cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220426_140915_services cannot be reverted.\n";

        return false;
    }
    */
}
