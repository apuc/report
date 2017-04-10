<?php

use yii\db\Migration;

/**
 * Handles the creation of table `custom_fields`.
 */
class m170407_193653_create_custom_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('custom_fields', [
            'id' => $this->primaryKey(),
            'label' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull(),
            'type' => "ENUM('text', 'textarea', 'select', 'radio', 'checkbox')",
            'valid' => $this->string(255),
            'is_main' => $this->integer(1),
            'default_value' => $this->string(255),
            'placeholder' => $this->string(255),
            'sort' => $this->integer(2)->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('custom_fields');
    }
}
