<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%disciplina}}`.
 */
class m211202_002559_create_disciplina_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    //(id, nome, periodo, ch, nucleo_id, matriz_id)
    public function safeUp()
    {
        $this->createTable('{{%disciplina}}', [
            'id' => $this->primaryKey(),
            'nucleo_id' => $this->integer(),
            'matriz_id' => $this->integer(),
            'nome' => $this->string()->notNull(),
            'ch' => $this->smallInteger()->notNull(),
            'periodo'=>$this->smallInteger()->notNull(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        // add foreign key for table `disciplina`
        $this->addForeignKey(
            'nucleo_d_fk',
            'disciplina',
            'nucleo_id',
            'nucleo',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'matriz_d_fk',
            'disciplina',
            'matriz_id',
            'matriz',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {   
        $this->dropForeignKey('nucleo_d_fk', 'disciplina');
        $this->dropForeignKey('matriz_d_fk', 'disciplina');
        $this->dropTable('{{%disciplina}}');
    }
}
