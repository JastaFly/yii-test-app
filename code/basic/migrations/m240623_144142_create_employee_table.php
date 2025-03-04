<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m240623_144142_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'attestation_date' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
