<?php

use yii\db\Migration;

/**
 * Class m210410_114433_add_created_at_and_updated_at_to_users_table
 */
class m210410_114433_add_created_at_and_updated_at_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'created_at', 'timestamp(0) with time zone NOT NULL DEFAULT now()');
        $this->addColumn('{{%users}}', 'updated_at', 'timestamp(0) with time zone');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210410_114433_add_created_at_and_updated_at_to_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210410_114433_add_created_at_and_updated_at_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
