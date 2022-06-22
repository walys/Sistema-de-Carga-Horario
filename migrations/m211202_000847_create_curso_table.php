<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%curso}}`.
 */
class m211202_000847_create_curso_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%curso}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'ch_total' => $this->integer(),
            'q_periodo' => $this->smallInteger(),
            'sigla' => $this->string(10),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%curso}}');
    }
}
