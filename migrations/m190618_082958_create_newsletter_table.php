<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%newsletter}}`.
 */
class m190618_082958_create_newsletter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%newsletter}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'to' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%newsletter_title_index}}', '{{%newsletter}}', 'title');
        $this->createIndex('{{%newsletter_created_at_index}}', '{{%newsletter}}', 'created_at');
        $this->createIndex('{{%newsletter_updated_at_index}}', '{{%newsletter}}', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%newsletter}}');
    }
}
