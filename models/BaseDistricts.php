<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.districts".
 *
 * @property int $id
 * @property int $province_id
 * @property string $district
 */
class BaseDistricts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'district'], 'required', "message" => "ورود فیلد الزامی است."],
            [['province_id'], 'default', 'value' => null],
            [['province_id'], 'integer'],
            [['district'], 'string', 'max' => 512],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseProvinces::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'استان',
            'district' => 'منطقه',
        ];
    }
}
