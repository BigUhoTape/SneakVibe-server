<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m210410_130112_create_product_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'url' => $this->string(1024)->notNull(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-product_image-product_id}}',
            '{{%product_image}}',
            'product_id'
        );

        $this->addForeignKey(
            '{{%fk-product_image-product_id}}',
            '{{%product_image}}',
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
        $this->dropForeignKey('{{%fk-product_image-product_id}}', '{{%product_image}}');
        $this->dropIndex('{{%idx-product_image-product_id}}', '{{%product_image}}');
        $this->dropTable('{{%product_image}}');
    }
}
