<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $hash=
        
        $this->execute("INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, "
                . "`password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'admin', "
                . "'Bj2xEpff-WmRLtY4TyHPHxRp6eAxsNZ0', ".
                '\'$2y$13$lyzLwLoeBeCxjFtGgQVPquL0qaL6F1ygdBgqTnKE22Q2x.dwAaQ9S\''.
                ", NULL, 'piant.grunger@gmail.com', '10', '1485769884', '1488270381')");

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
