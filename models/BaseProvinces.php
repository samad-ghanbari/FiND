<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.provinces".
 *
 * @property int $id
 * @property string $province
 */
class BaseProvinces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.provinces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province'], 'required'],
            [['province'], 'string', 'max' => 100],
            [['province'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province' => 'Province',
        ];
    }
}
