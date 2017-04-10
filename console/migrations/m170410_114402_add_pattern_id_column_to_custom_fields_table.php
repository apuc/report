<?php

use yii\db\Migration;

/**
 * Handles adding pattern_id to table `custom_fields`.
 */
class m170410_114402_add_pattern_id_column_to_custom_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('custom_fields', 'pattern_id', $this->integer(11)->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('custom_fields', 'pattern_id');
    }
}
