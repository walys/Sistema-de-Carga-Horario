<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coordena}}`.
 */
class m211202_013448_create_coordena_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coordena}}', [
            'id' => $this->primaryKey(),
            'usuario_id'=>$this->integer(),
            'curso_id'=>$this->integer(),
            'inicio'=>$this->date(),
            'fim'=>$this->date(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('usuario_c_fk', 'coordena', 'usuario_id', 'usuario', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('curso_c_fk', 'coordena', 'curso_id', 'curso', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('usuario_c_fk', 'coordena');
        $this->dropForeignKey('curso_c_fk', 'coordena');
        $this->dropTable('{{%coordena}}');
    }
}
