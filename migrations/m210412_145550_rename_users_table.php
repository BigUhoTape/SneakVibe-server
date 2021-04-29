<?php

use yii\db\Migration;

/**
 * Class m210412_145550_rename_users_table
 */
class m210412_145550_rename_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('{{%users}}', '{{%user}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210412_145550_rename_users_table cannot be reverted.\n";

        return false;
    }
    */
}
