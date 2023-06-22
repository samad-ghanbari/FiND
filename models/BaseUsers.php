<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "base.users".
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $nid
 * @property string $ecode
 * @property int $residence_province_id
 * @property int $office_id
 * @property int|null $department_id
 * @property string $permissions { "provinces":[1,2,3], "areas":[2,4,8], "exchanges":"{\"allow\":[2,3,4,5],\"deny\":[4]}", "saloons":"{\"allow\":[2,3,44,55],\"deny\":[2]}", "ips":["1.1.1.1","2.2.2.2", "127.0.0.1"], "enabled":1,  "admin":1, "rw":1, "authority":"planner"}
 * @property string $password
 * @property string|null $passwordConfirm

 */
class BaseUsers extends \yii\db\ActiveRecord
{
    public $passwordConfirm;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'base.users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'nid', 'ecode', 'residence_province_id', 'office_id', 'permissions', 'password'], 'required', 'message' => "ورورد فیلد الزامی می‌باشد."],
            [['residence_province_id', 'office_id', 'department_id'], 'default', 'value' => null],
            [['residence_province_id', 'office_id', 'department_id'], 'integer'],
            [['permissions'], 'safe'],
            [['name', 'lastname'], 'string', 'max' => 100],
            [['nid', 'ecode'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 1024],
            [['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'message'=>'رمز های عبور یکسان نیستتند'],
            [['ecode'], 'unique'],
            [['nid'], 'unique'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseOffices::className(), 'targetAttribute' => ['office_id' => 'id']],
            [['residence_province_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseProvinces::className(), 'targetAttribute' => ['residence_province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام',
            'lastname' => 'نام‌خانوادگی',
            'nid' => 'کد‌ملی',
            'ecode' => 'کد‌مستخدمی',
            'residence_province_id' => 'استان محل اقامت',
            'office_id' => 'اداره کل/معاونت',
            'department_id' => 'اداره',
            'permissions' => 'مجوزها',
            'password' => 'رمز ورود',
            'reset_password' => 'بازنشانی رمز عبور',
        ];
    }
}
