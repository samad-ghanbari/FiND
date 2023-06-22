<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.saloons".
 *
 * @property int $id
 * @property int $center_id
 * @property string $building_name
 * @property int $floor_no
 * @property string $saloon_name
 * @property string|null $append_char
 * @property float $saloon_width
 * @property float $saloon_height
 */
class BaseSaloons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.saloons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['center_id', 'building_name', 'floor_no', 'saloon_name', 'saloon_width', 'saloon_height'], 'required'],
            [['center_id', 'floor_no'], 'default', 'value' => null],
            [['center_id', 'floor_no'], 'integer'],
            [['saloon_width', 'saloon_height'], 'number'],
            [['building_name', 'saloon_name'], 'string', 'max' => 128],
            [['append_char'], 'string', 'max' => 5],
            [['center_id', 'building_name', 'floor_no', 'saloon_name'], 'unique', 'targetAttribute' => ['center_id', 'building_name', 'floor_no', 'saloon_name']],
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
            'center_id' => 'مرکز',
            'building_name' => 'ساختمان',
            'floor_no' => 'طبقه',
            'saloon_name' => 'نام سالن',
            'append_char' => 'کاراکتر الصاقی',
            'saloon_width' => 'عرض سالن',
            'saloon_height' => 'طول سالن',
        ];
    }
}
