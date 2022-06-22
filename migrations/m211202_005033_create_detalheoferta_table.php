<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detalheoferta}}`.
 */
class m211202_005033_create_detalheoferta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%detalheoferta}}', [
            'id' => $this->primaryKey(),
            'semestre_ano'=>$this->string(6)->notNull(),
            'disciplina_id'=>$this->integer(),
            'oferta_id'=>$this->integer(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('disciplina_d_fk', 'detalheoferta', 'disciplina_id', 'disciplina', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('oferta_d_fk', 'detalheoferta', 'oferta_id', 'oferta', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('oferta_d_fk', 'detalheoferta');
        $this->dropForeignKey('disciplina_d_fk', 'detalheoferta');
        $this->dropTable('{{%detalheoferta}}');
    }
}
