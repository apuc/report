<?php

use yii\db\Migration;

/**
 * Handles the creation of table `validate`.
 */
class m170410_101739_create_validate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('validate', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'pattern' => $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('validate');
    }
}
