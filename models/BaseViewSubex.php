<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.view_subex".
 *
 * @property int|null $id
 * @property int|null $province_id
 * @property string|null $province
 * @property int|null $district_id
 * @property string|null $district
 * @property int|null $center_id
 * @property string|null $center_abbr
 * @property string|null $center_name
 * @property string|null $name
 * @property string|null $abbr
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $address
 */
class BaseViewSubex extends \yii\db\ActiveRecord
{
	public static function primaryKey()
    {
        return ['id'];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.view_subex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'district_id', 'center_id'], 'default', 'value' => null],
            [['id', 'province_id', 'district_id', 'center_id'], 'integer'],
            [['province'], 'string', 'max' => 100],
            [['district'], 'string', 'max' => 512],
            [['center_abbr', 'abbr'], 'string', 'max' => 64],
            [['center_name', 'name', 'latitude', 'longitude'], 'string', 'max' => 1024],
            [['address'], 'string', 'max' => 2048],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province ID',
            'province' => 'Province',
            'district_id' => 'District ID',
            'district' => 'District',
            'center_id' => 'Center ID',
            'center_abbr' => 'Center Abbr',
            'center_name' => 'Center Name',
            'name' => 'Name',
            'abbr' => 'Abbr',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'address' => 'Address',
        ];
    }
}
