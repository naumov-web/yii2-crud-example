<?php

use yii\db\Migration;

/**
 * Handles the creation of table "categories"
 */
class m211112_214345_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'parent_id' => $this->integer()->unsigned()->null(),
            'level' => $this->integer()->unsigned()->notNull()
        ]);

        $this->addForeignKey(
            'fk-categories-parent_id',
            'categories',
            'parent_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
