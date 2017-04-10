<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;

/**
 * This is the model class for table "field_variations".
 *
 * @property integer $id
 * @property integer $field_id
 * @property string $variation_key
 * @property string $variation_title
 *
 * @property CustomFields $field
 */
class FieldVariations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_variations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id'], 'integer'],
            [['variation_key', 'variation_title'], 'string', 'max' => 255],
            [
                ['field_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => CustomFields::className(),
                'targetAttribute' => ['field_id' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Field ID',
            'variation_key' => 'Variation Key',
            'variation_title' => 'Variation Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(CustomFields::className(), ['id' => 'field_id']);
    }

    public static function getVariationTitle($key, $field_id)
    {
        return self::find()->where(['variation_key'=>$key,'field_id'=>$field_id])->one()->variation_title;
    }
}
