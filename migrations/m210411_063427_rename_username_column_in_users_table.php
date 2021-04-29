<?php

use yii\db\Migration;

/**
 * Class m210411_063427_rename_username_column_in_users_table
 */
class m210411_063427_rename_username_column_in_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%users}}', 'username', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210411_063427_rename_username_column_in_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210411_063427_rename_username_column_in_users_table cannot be reverted.\n";

        return false;
    }
    */
}
