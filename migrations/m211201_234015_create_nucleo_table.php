<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nucleo}}`.
 */
class m211201_234015_create_nucleo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nucleo}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nucleo}}');
    }
}
