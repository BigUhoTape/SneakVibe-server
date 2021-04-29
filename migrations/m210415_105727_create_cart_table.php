<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m210415_105727_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'count' => $this->integer()->defaultValue(1),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-cart-product_id}}',
            '{{%cart}}',
            'product_id'
        );

        $this->createIndex(
            '{{%idx-cart-user_id}}',
            '{{%cart}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-cart-product_id}}',
            '{{%cart}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-cart-user_id}}',
            '{{%cart}}',
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
        $this->dropIndex('{{%idx-cart-product_id}}', '{{%cart}}');
        $this->dropIndex('{{%idx-cart-user_id}}', '{{%cart}}');
        $this->dropForeignKey('{{%fk-cart-product_id}}', '{{%cart}}');
        $this->dropForeignKey('{{%fk-cart-user_id}}', '{{%cart}}');
        $this->dropTable('{{%cart}}');
    }
}
