<?php

use yii\db\Migration;

/**
 * Class m211230_111944_unique
 */
class m211230_111944_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('usuario', 'login', 'string unique');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('usuario', 'login', 'string');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211230_111944_unique cannot be reverted.\n";

        return false;
    }
    */
}
