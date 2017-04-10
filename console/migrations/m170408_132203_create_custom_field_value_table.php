<?php

use yii\db\Migration;

/**
 * Handles the creation of table `custom_field_value`.
 */
class m170408_132203_create_custom_field_value_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('custom_field_value', [
            'id' => $this->primaryKey(),
            'reports_id' => $this->integer(11)->notNull(),
            'report_type_id' => $this->integer(11),
            'cf_key' => $this->string(255),
            'cf_value' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-cfv-reports',
            'custom_field_value',
            'reports_id',
            'reports',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cfv-report-type',
            'custom_field_value',
            'report_type_id',
            'report_type',
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
            'fk-cfv-reports',
            'custom_field_value'
        );

        $this->dropForeignKey(
            'fk-cfv-report-type',
            'custom_field_value'
        );

        $this->dropTable('custom_field_value');
    }
}
