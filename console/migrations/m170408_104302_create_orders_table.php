<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m170408_104302_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reports', [
            'id' => $this->primaryKey(),
            'report_type_id' => $this->integer(11)->notNull(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk-reports-report-type',
            'reports',
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
            'fk-reports-report-type',
            'reports'
        );

        $this->dropTable('reports');
    }
}
