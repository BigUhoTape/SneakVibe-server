<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_product}}`.
 */
class m210418_112256_create_order_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_product}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'count' => $this->integer()->notNull(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-order_product-order_id}}',
            '{{%order_product}}',
            'order_id'
        );

        $this->createIndex(
            '{{%idx-order_product-product_id}}',
            '{{%order_product}}',
            'product_id'
        );

        $this->addForeignKey(
            '{{%fk-order_product-order_id}}',
            '{{%order_product}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-order_product-product_id}}',
            '{{%order_product}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%idx-order_product-order_id}}','{{%order_product}}');
        $this->dropIndex('{{%idx-order_product-product_id}}','{{%order_product}}');
        $this->dropForeignKey('{{{%fk-order_product-order_id}}','{{%order_product}}');
        $this->dropForeignKey('{{%fk-order_product-product_id}}','{{%order_product}}');
        $this->dropTable('{{%order_product}}');
    }
}
