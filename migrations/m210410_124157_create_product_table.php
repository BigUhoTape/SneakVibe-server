<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210410_124157_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'article' => $this->string(255)->notNull(),
            'brand' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'price' => $this->integer()->notNull(),
            'discountPrice' => $this->integer(),
            'gender' => $this->string()->notNull(),
            'description' => $this->text(),
            'color' => $this->string(255)->notNull(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
