<?php

use yii\db\Migration;

/**
 * Class m190720_083956_createtablebarang
 */
class m190720_083956_createtablebarang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('barang', [
          'id' => $this->primaryKey(),
          'kode' => $this->string(20),
          'nama' => $this->string(100),

      ]) ;      
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190720_083956_createtablebarang cannot be reverted.\n";

        return false;
    }
    */
}
