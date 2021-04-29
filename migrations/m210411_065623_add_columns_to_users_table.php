<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m210411_065623_add_columns_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'name', $this->string(255));
        $this->addColumn('{{%users}}', 'last_name', $this->string(255));
        $this->addColumn('{{%users}}', 'gender', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'name');
        $this->dropColumn('{{%users}}', 'last_name');
        $this->dropColumn('{{%users}}', 'gender');
    }
}
