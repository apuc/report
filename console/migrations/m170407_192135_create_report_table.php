<?php

use yii\db\Migration;

/**
 * Handles the creation of table `report`.
 */
class m170407_192135_create_report_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('report_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('report_type');
    }
}
