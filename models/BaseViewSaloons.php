<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.view_saloons".
 *
 * @property int|null $id
 * @property int|null $district_id
 * @property string|null $name
 * @property string|null $abbr
 * @property int|null $center_id
 * @property string|null $building_name
 * @property int|null $floor_no
 * @property string|null $saloon_name
 * @property string|null $append_char
 * @property string|null $saloon_abbr
 * @property float|null $saloon_width
 * @property float|null $saloon_height
 */
class BaseViewSaloons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.view_saloons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'center_id', 'floor_no'], 'default', 'value' => null],
            [['id', 'district_id', 'center_id', 'floor_no'], 'integer'],
            [['saloon_abbr'], 'string'],
            [['saloon_width', 'saloon_height'], 'number'],
            [['name'], 'string', 'max' => 1024],
            [['abbr'], 'string', 'max' => 64],
            [['building_name', 'saloon_name'], 'string', 'max' => 128],
            [['append_char'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'District ID',
            'name' => 'Name',
            'abbr' => 'Abbr',
            'center_id' => 'Center ID',
            'building_name' => 'Building Name',
            'floor_no' => 'Floor No',
            'saloon_name' => 'Saloon Name',
            'append_char' => 'Append Char',
            'saloon_abbr' => 'Saloon Abbr',
            'saloon_width' => 'Saloon Width',
            'saloon_height' => 'Saloon Height',
        ];
    }
}
