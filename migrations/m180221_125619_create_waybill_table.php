<?php

use yii\db\Migration;

/**
 * Handles the creation of table `waybill`.
 */
class m180221_125619_create_waybill_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = $this->db->getDriverName() == 'mysql' ? 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;

        $this->createTable('waybill', [
            'id' => $this->primaryKey(),
            'from' => $this->string(250)->notNull(),
            'to' => $this->string(250)->notNull(),
            'receiver' => $this->string(250)->notNull(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('waybill');
    }
}
