<?php

use yii\db\Migration;

/**
 * Handles the creation of table `field_variations`.
 */
class m170407_195711_create_field_variations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('field_variations', [
            'id' => $this->primaryKey(),
            'field_id' => $this->integer(11),
            'variation_key' => $this->string(255),
            'variation_title' => $this->string(255),
        ]);

        $this->addForeignKey(
            'fk-field_variations_id',
            'field_variations',
            'field_id',
            'custom_fields',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-field_variations_id',
            'field_variations'
        );

        $this->dropTable('field_variations');
    }
}
