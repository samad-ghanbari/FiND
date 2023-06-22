<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.subex".
 *
 * @property int $id
 * @property int $district_id
 * @property int|null $center_id
 * @property string $name
 * @property string $abbr
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $address
 */
class BaseSubex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.subex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'name', 'abbr'], 'required', "message" => "ورود فیلد الزامی است"],
            [['district_id', 'center_id'], 'default', 'value' => null],
            [['district_id', 'center_id'], 'integer'],
            [['name', 'latitude', 'longitude'], 'string', 'max' => 1024],
            [['abbr'], 'string', 'max' => 64],
            [['address'], 'string', 'max' => 2048],
            [['district_id', 'center_id', 'abbr'], 'unique', 'targetAttribute' => ['district_id', 'center_id', 'abbr']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseDistricts::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['center_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseSubex::className(), 'targetAttribute' => ['center_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'منطقه',
            'center_id' => 'مرکز',
            'name' => 'نام',
            'abbr' => 'نام اختصار',
            'latitude' => 'عرض جغرافیایی',
            'longitude' => 'طول جغرافیایی',
            'address' => 'آدرس',
        ];
    }
}
