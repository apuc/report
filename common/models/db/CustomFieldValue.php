<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;

/**
 * This is the model class for table "custom_field_value".
 *
 * @property integer $id
 * @property integer $reports_id
 * @property integer $report_type_id
 * @property string $cf_key
 * @property string $cf_value
 *
 * @property ReportType $reportType
 * @property Reports $reports
 */
class CustomFieldValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom_field_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reports_id'], 'required'],
            [['reports_id', 'report_type_id'], 'integer'],
            [['cf_value'], 'string'],
            [['cf_key'], 'string', 'max' => 255],
            [
                ['report_type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ReportType::className(),
                'targetAttribute' => ['report_type_id' => 'id'],
            ],
            [
                ['reports_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Reports::className(),
                'targetAttribute' => ['reports_id' => 'id'],
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
            'reports_id' => 'Reports ID',
            'report_type_id' => 'Report Type ID',
            'cf_key' => 'Cf Key',
            'cf_value' => 'Cf Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportType()
    {
        return $this->hasOne(ReportType::className(), ['id' => 'report_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasOne(Reports::className(), ['id' => 'reports_id']);
    }

    public function getCustomField()
    {
        return $this->hasOne(CustomFields::className(), ['slug' => 'cf_key']);
    }

    public function getValue()
    {
        if($this->customField->isSelectable()){
            if(CustomFields::isJson($this->cf_value)){
                $v = json_decode($this->cf_value);
                $val = '';
                foreach ($v as $item){
                    $val .= FieldVariations::getVariationTitle($item,$this->customField->id) . ',';
                }
                return substr($val, 0, -1);
            }
            return FieldVariations::getVariationTitle($this->cf_value,$this->customField->id);
        }
        return $this->cf_value;
    }
}
