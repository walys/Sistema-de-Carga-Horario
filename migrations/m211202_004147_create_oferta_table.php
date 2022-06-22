<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oferta}}`.
 */
class m211202_004147_create_oferta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    //id, semestre, inicio, matriz_fk, usuario_fk, registro, create_at, úpdate_at
    public function safeUp()
    {
        $this->createTable('{{%oferta}}', [
            'id' => $this->primaryKey(),
            'matriz_id'=>$this->integer()->notNull(),
            'usuario_id'=>$this->integer()->notNull(),
            'semestre_ano_inicio'=>$this->string(6)->notNull(),
            'data_registro'=>$this->date(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey(
            'matriz_o_fk', 
            'oferta', 
            'matriz_id', 
            'matriz', 
            'id', 
            'RESTRICT');

        $this->addForeignKey(
            'usuario_o_fk', 
            'oferta', 
            'usuario_id', 
            'usuario', 
            'id', 
            'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('matriz_o_fk', 'oferta');
        $this->dropForeignKey('usuario_o_fk', 'oferta');
        $this->dropTable('{{%oferta}}');
    }
}
