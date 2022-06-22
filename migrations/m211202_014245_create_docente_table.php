<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%docente}}`.
 */
class m211202_014245_create_docente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%docente}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'nucleo_id' => $this->integer(),
            'create_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('nucleo_do_fk', 'docente', 'nucleo_id', 'nucleo', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('nucleo_do_fk', 'docente');
        $this->dropTable('{{%docente}}');
    }
}
