<?php

use yii\db\Schema;
use yii\db\Migration;

class m151114_124230_add_authors extends Migration
{
    public function up()
    {
        $this->insert('authors', ['firstname' => 'Лев', 'lastname' => 'Толстой']);
        $this->insert('authors', ['firstname' => 'Фёдор', 'lastname' => 'Достоевский']);
        $this->insert('authors', ['firstname' => 'Иван', 'lastname' => 'Бунин']);
        $this->insert('authors', ['firstname' => 'Александр', 'lastname' => 'Пушкин']);
        $this->insert('authors', ['firstname' => 'Михаил', 'lastname' => 'Лермонтов']);
    }

    public function down()
    {
        echo "m151114_124230_add_authors cannot be reverted.\n";

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
