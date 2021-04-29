<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 */
class m210414_123326_create_favorite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorite}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-favorite-product_id}}',
            '{{%favorite}}',
            'product_id'
        );

        $this->createIndex(
            '{{%idx-favorite-user_id}}',
            '{{%favorite}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-favorite-product_id}}',
            '{{%favorite}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-favorite-user_id}}',
            '{{%favorite}}',
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
        $this->dropIndex('{{%idx-favorite-product_id}}', '{{%favorite}}');
        $this->dropIndex('{{%idx-favorite-user_id}}', '{{%favorite}}');
        $this->dropForeignKey('{{%fk-favorite-product_id}}', '{{%favorite}}');
        $this->dropForeignKey('{{%fk-favorite-user_id}}', '{{%favorite}}');
        $this->dropTable('{{%favorite}}');
    }
}
