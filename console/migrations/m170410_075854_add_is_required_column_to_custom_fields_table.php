<?php

use yii\db\Migration;

/**
 * Handles adding is_required to table `custom_fields`.
 */
class m170410_075854_add_is_required_column_to_custom_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('custom_fields', 'is_required', $this->integer(1)->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('custom_fields', 'is_required');
    }
}
