<?php

use yii\db\Schema;
use yii\db\Migration;

class m151112_183435_db_structure extends Migration
{
    public function up()
    {
        $this->createTable('books', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'date_create' => 'date NOT NULL',
            'date_update' => 'date NOT NULL',
            'preview' => 'string',
            'date' => 'date NOT NULL',
            'author_id' => 'integer',
        ]);

        $this->createTable('authors', [
            'id' => 'pk',
            'firstname' => 'string NOT NULL',
            'lastname' => 'string NOT NULL',
        ]);

        $this->addForeignKey('FK_author_id', 'books', 'author_id', 'authors', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        echo "m151112_183435_db_structure cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
