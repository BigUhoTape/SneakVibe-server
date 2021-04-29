<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 */
class m210409_122546_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'body' => $this->text(),
            'user_id' => $this->integer(),
            'created_at' => 'timestamp(0) with time zone NOT NULL DEFAULT now()',
            'updated_at' => 'timestamp(0) with time zone'
        ]);

        $this->createIndex(
            '{{%idx-notes-user_id}}',
            '{{%notes}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-notes-user_id}}',
            '{{%notes}}',
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
        $this->dropForeignKey('{{%fk-notes-user_id}}', '{{%notes}}');
        $this->dropIndex('{{%idx-notes-user_id}}', '{{%notes}}');
        $this->dropTable('{{%notes}}');
    }
}
