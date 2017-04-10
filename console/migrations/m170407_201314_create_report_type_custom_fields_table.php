<?php

use yii\db\Migration;

/**
 * Handles the creation of table `report_type_custom_fields`.
 */
class m170407_201314_create_report_type_custom_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('report_type_custom_fields', [
            'report_type_id' => $this->integer(),
            'custom_fields_id' => $this->integer(),
            'PRIMARY KEY(report_type_id, custom_fields_id)',
        ]);

        $this->addForeignKey(
            'fk-report_type_id',
            'report_type_custom_fields',
            'report_type_id',
            'report_type',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-custom_fields_id',
            'report_type_custom_fields',
            'custom_fields_id',
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
            'fk-report_type_id',
            'report_type_custom_fields'
        );

        $this->dropForeignKey(
            'fk-custom_fields_id',
            'report_type_custom_fields'
        );

        $this->dropTable('report_type_custom_fields');
    }
}
