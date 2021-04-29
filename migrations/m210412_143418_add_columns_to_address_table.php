<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%address}}`.
 */
class m210412_143418_add_columns_to_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%address}}', 'created_at', 'timestamp(0) with time zone NOT NULL DEFAULT now()');
        $this->addColumn('{{%address}}', 'updated_at', 'timestamp(0) with time zone');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
