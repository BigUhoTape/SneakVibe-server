<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m210418_085255_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->string()->notNull()->defaultValue('active'),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-order-user_id}}',
            '{{%order}}',
            'user_id'
        );

        $this->createIndex(
            '{{%idx-order-status}}',
            '{{%order}}',
            'status'
        );

        $this->addForeignKey(
            '{{%fk-order-user_id}}',
            '{{%order}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%idx-order-user_id}}', '{{%order}}');
        $this->dropIndex('{{%idx-order-status}}', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
