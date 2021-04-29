<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m210412_135927_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'country' => $this->string(255),
            'city' => $this->string(255),
            'address' => $this->string(512),
            'phone_number' => $this->string(255),
            'postcode' => $this->string(255)
        ]);

        $this->createIndex(
            '{{%idx-address-city}}',
            '{{%address}}',
            'city'
        );

        $this->createIndex(
            '{{%idx-address-counrty}}',
            '{{%address}}',
            'country'
        );

        $this->addForeignKey(
            '{{%fk-address-user_id}}',
            '{{%address}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
