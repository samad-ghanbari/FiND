<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.offices".
 *
 * @property int $id
 * @property string $office
 */
class BaseOffices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.offices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office'], 'required'],
            [['office'], 'string', 'max' => 512],
            [['office'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office' => 'Office',
        ];
    }
}
