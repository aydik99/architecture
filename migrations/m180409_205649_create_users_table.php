<?php

use yii\db\Migration;
use app\models\User;
/**
 * Handles the creation of table `users`.
 */
class m180409_205649_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    private $tableName = 'users';
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'password' => $this->string(50),
            'auth_key'=> $this->string(100)
        ]);

        $this->createIndex('ix_users_login', $this->tableName, "username");

        $model = new User();
        $model->username = 'admin';
        $model->password = 'admin';
        $model->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
