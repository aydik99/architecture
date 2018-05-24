<?php

use yii\db\Migration;

/**
 * Class m180420_154710_add_timefix_to_task
 */
class m180420_154710_add_timefix_to_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("task", "create_at", $this->dateTime());
        $this->addColumn("task", "update_at", $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180420_154710_add_timefix_to_task cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180420_154710_add_timefix_to_task cannot be reverted.\n";

        return false;
    }
    */
}
