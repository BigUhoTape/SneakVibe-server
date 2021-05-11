<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_card}}`.
 */
class m210503_120321_create_user_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_card}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'card_number' => $this->string()->notNull(),
            'cvc' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'expired_date' => $this->date()->notNull(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-user_card-user_id}}',
            '{{%user_card}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-user_card-user_id}}',
            '{{%user_card}}',
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
        $this->dropIndex('{{%idx-user_card-user_id}}', '{{%user_card}}');
        $this->dropForeignKey('{{%fk-user_card-user_id}}', '{{%user_card}}');
        $this->dropTable('{{%user_card}}');
    }
}
