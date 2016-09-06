<?php

use yii\db\Migration;

class m160803_083700_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('255'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%country}}');
    }
}
