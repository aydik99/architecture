<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mail`.
 */
class m180417_053101_create_mail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mail', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mail');
    }
}
