<?php

use yii\db\Migration;

class m160514_172610_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('companies', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'estimated_earnings' => $this->double()->notNull(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->insert('companies', [
            'id' => '1',
            'name' => 'Company1',
            'estimated_earnings' => '25',
            'parent_id'=>'0',
        ]);
        $this->insert('companies', [
            'id' => '2',
            'name' => 'Company2',
            'estimated_earnings' => '13',
            'parent_id'=>'1',
        ]);
        $this->insert('companies', [
            'id' => '3',
            'name' => 'Company3',
            'estimated_earnings' => '5',
            'parent_id'=>'2',
        ]);
        $this->insert('companies', [
            'id' => '4',
            'name' => 'Company4',
            'estimated_earnings' => '10',
            'parent_id'=>'1',
        ]);
    }

    public function down()
    {
        echo "m160514_172610_init cannot be reverted.\n";
        $this->dropTable('companies');
        return true;
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
