<?php

use yii\db\Migration;

/**
 * Class m210503_113756_add_card_number_to_order_table
 */
class m210503_113756_add_card_number_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'card_number', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'card_number');
    }
}
