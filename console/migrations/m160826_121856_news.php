<?php

use yii\db\Migration;

class m160826_121856_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string('255'),
            'description' => $this->string('255'),
            'text' => $this->text(),
            'category_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%news_category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string('255'),
            'description' => $this->string('255'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->createTable('{{%news_has_author}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(10)->notNull(),
            'staff_id' => $this->integer(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%news_has_author}}');
        $this->dropTable('{{%news_category}}');
        $this->dropTable('{{%news}}');
    }
}
