<?php

use yii\db\Migration;

class m160826_123244_tags extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('255'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->createTable('{{%news_has_tag}}', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(10)->notNull(),
            'news_id' => $this->integer(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%news_has_tag}}');
    }
}
