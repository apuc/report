<?php

use yii\db\Migration;

/**
 * Handles adding error_msg to table `custom_fields`.
 */
class m170410_115947_add_error_msg_column_to_custom_fields_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('custom_fields', 'error_msg', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('custom_fields', 'error_msg');
    }
}
