<?php

use yii\db\Migration;

class m160906_093121_organizations extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%organization_staff}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'gender' => $this->string(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->createTable('{{%organization_staff_color}}', [
            'id' => $this->primaryKey(10),
            'staff_id' => $this->integer(10)->notNull(),
            'color' => $this->string(10)->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%organization_staff}}');
        $this->dropTable('{{%organization_staff_color}}');
    }
}
