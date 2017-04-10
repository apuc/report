<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "validate".
 *
 * @property integer $id
 * @property string $name
 * @property string $pattern
 */
class Validate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'validate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pattern'], 'required'],
            [['pattern'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'pattern' => 'Pattern',
        ];
    }

    public static function getPatternById($id)
    {
        return self::findOne($id)->pattern;
    }
}
