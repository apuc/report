<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "report_type_custom_fields".
 *
 * @property integer $report_type_id
 * @property integer $custom_fields_id
 *
 * @property CustomFields $customFields
 * @property ReportType $reportType
 */
class ReportTypeCustomFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_type_custom_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_type_id', 'custom_fields_id'], 'required'],
            [['report_type_id', 'custom_fields_id'], 'integer'],
            [['custom_fields_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomFields::className(), 'targetAttribute' => ['custom_fields_id' => 'id']],
            [['report_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReportType::className(), 'targetAttribute' => ['report_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_type_id' => 'Report Type ID',
            'custom_fields_id' => 'Custom Fields ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomFields()
    {
        return $this->hasOne(CustomFields::className(), ['id' => 'custom_fields_id'])->orderBy('sort DESC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportType()
    {
        return $this->hasOne(ReportType::className(), ['id' => 'report_type_id']);
    }
}
