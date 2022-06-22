<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%matriz}}`.
 */
class m211202_001844_create_matriz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    //id, sigla, ch_total, curso_id
    public function safeUp()
    {
        $this->createTable('{{%matriz}}', [
            'id' => $this->primaryKey(),
            'curso_id' => $this->integer(),
            'ch_total' => $this->integer(),
            'sigla' => $this->string(10),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        // add foreign key for table `matriz`
        $this->addForeignKey(
            'curso_fk',
            'matriz',
            'curso_id',
            'curso',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%matriz}}');
    }
}
