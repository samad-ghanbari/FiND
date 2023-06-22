<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.departments".
 *
 * @property int $id
 * @property string $department
 */
class BaseDepartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department'], 'required'],
            [['department'], 'string', 'max' => 512],
            [['department'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'Department',
        ];
    }
}
