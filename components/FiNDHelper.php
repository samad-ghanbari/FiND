<?php

namespace app\components;
use Yii;
use yii\base\Component;

class FiNDHelper extends Component
{
    public static function beforeAction()
    {
        // return  ['default'=>false, 'redirect'=>""];

        if( (Yii::$app->controller->id == "base") && (Yii::$app->controller->action->id == "index") )
            return ['default'=>true, 'redirect'=>""];

        //
        $session = Yii::$app->session;
        $session->open();
        //IP check
        if(isset($session['ipAccepted']))
        {
            if($session['ipAccepted'] == false)
            {
                Yii::$app->session->remove("user");
                return ['default'=>false, 'redirect'=>"base/index"];
            }
        }
        else
        {
            Yii::$app->session->remove("user");
            return ['default'=>false, 'redirect'=>"base/index"];
        }


        if ((isset($session['user'])) && (Yii::$app->controller->id == "base")  &&  (Yii::$app->controller->action->id == "login"))
        {
            if(isset($session['selected']))
            {
                $selected = $session['selected'];
                if($selected['saloon_id'] > 0)
                    return ['default'=>false, 'redirect'=>"saloon/index"];
                else if($selected['center_id'] > 0)
                    return ['default'=>false, 'redirect'=>"center/index"];
                else if($selected['district_id'] > 0)
                    return ['default'=>false, 'redirect'=>"base/districts"];
                else
                    return ['default'=>false, 'redirect'=>"base/provinces"];
            }
            else
                return ['default'=>false, 'redirect'=>"base/provinces"];
        }
        else if(isset($session['user']) || ((Yii::$app->controller->id == "base")  && (Yii::$app->controller->action->id == "login") ) )
        {
            return ['default'=>true, 'redirect'=>""];
        }
        else
        {
            return ['default'=>false, 'redirect'=>"base/index"];
        }
    }

    public static function getSelectedArray($province_id, $district_id, $center_id, $saloon_id)
    {
        return ['province_id'=>$province_id, "district_id"=>$district_id, "center_id"=>$center_id, "saloon_id"=>$saloon_id];
    }
}

class User
{
    public static function getUserIps($userId)
    {
        $allowed = [];
        try
        {
            $allowedIps = \Yii::$app->db->createCommand("SELECT permissions->'ips' AS allowed FROM base.users where id=:USERID;")->bindValue(":USERID", $userId)->queryOne();

            $temp = json_decode($allowedIps['allowed']);
            foreach ($temp as $t)
            {
                $t = str_replace(' ', '', $t);
                array_push($allowed, $t);
            }
        }
        catch (\Exception $e){}

        return $allowed;
    }

    public static function getAllIps() // all ips
    {
        //allow Ips array
        $allowed = [];
        try
        {
            $allowedIps = \Yii::$app->db->createCommand("select permissions->'ips' as allowed FROM base.users;")->queryAll();
            foreach ($allowedIps as $ip)
            {
                $temp = json_decode($ip['allowed']);
                foreach ($temp as $t)
                {
                    $t = str_replace(' ', '', $t);
                    array_push($allowed, $t);
                }
            }
        }
        catch (\Exception $e){ }

        return $allowed;
    }

    public static function isPermissionsValid($permissions)
    {
        try
        {
            $provinces = $permissions['provinces'];
            $districts = $permissions['districts'];
            $centers = $permissions['centers'];
            $exchAllow = $permissions['centers']['allow'];
            $exchDeny = $permissions['centers']['deny'];
            $saloons = $permissions['saloons'];
            $salAllow = $permissions['saloons']['allow'];
            $salDeny = $permissions['saloons']['deny'];
            $ips = $permissions['ips'];
            $enabled = $permissions['enabled'];
            $reset_password = $permissions['reset_password'];
            $admin = $permissions['admin'];
            $rw = $permissions['rw'];
            $authority = $permissions['authority'];

            $ok = true;
            if(!is_array($provinces))
                $ok = false;
            if(!is_array($districts))
                $ok = false;
            if(!is_array($ips))
                $ok = false;
            if(!is_array($exchAllow))
                $ok = false;
            if(!is_array($exchDeny))
                $ok = false;
            if(!is_array($salAllow))
                $ok = false;
            if(!is_array($salDeny))
                $ok = false;
            if(!is_bool($enabled))
                $ok = false;
            if(!is_bool($reset_password))
                $ok = false;
            if(!is_bool($admin))
                $ok = false;
            if(!is_bool($rw))
                $ok = false;
            if(!in_array($authority,["planner", "executer", "observer" ]))
                $ok = false;

            return $ok;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public static function checkProvince($provinceId, $permissions)
    {
        if(!isset($permissions['provinces'])) return false;
        $provinces = $permissions['provinces'];
        if(in_array($provinceId, $provinces))
            return true;
        else
            return false;
    }

    public static function checkDistrict($districtId, $permissions)
    {
        if(!isset($permissions['districts'])) return false;
        if(!isset($permissions['provinces'])) return false;
        $districts = $permissions['districts'];
        $provinces = $permissions['provinces'];

        $provinceId = \app\models\BaseDistricts::findOne($districtId);
        if(empty($provinceId)) return false;
        $provinceId = $provinceId->province_id;
        if(in_array($districtId, $districts))
        {
            if(in_array($provinceId, $provinces))
                return true;
            else
                return false;
        }
        else
            return false;
    }

    public static function checkCenter($centerId, $permissions)
    {
        if(!isset($permissions['centers'])) return false;
        if(!isset($permissions['districts'])) return false;
        if(!isset($permissions['centers']['allow'])) return false;
        if(!isset($permissions['centers']['deny'])) return false;

        $allow = $permissions['centers']['allow'];
        $deny  = $permissions['centers']['deny'];
        $districts = $permissions['districts'];
        $districtId = \app\models\BaseSubex::findOne($centerId);
        if(empty($districtId)) return false;
        $districtId = $districtId->district_id;

        if(! self::checkDistrict($districtId, $permissions))
            return false;

        if(empty($allow))
        {
            //all exchanges
            if(empty($deny))
            {
                // nothing prohibited
                return true;
            }
            else
            {
                // not to be in deny list
                if(in_array($centerId, $deny))
                    return false;
                else
                    return true;
            }
        }
        else
        {
            // selective allow
            if(in_array($centerId, $allow))
            {
                if(in_array($centerId, $deny))
                    return false;
                else
                    return true;
            }
            else
                return false;
        }
    }

    public static function checkSaloon($saloonId, $permissions)
    {
        if(!isset($permissions['saloons'])) return false;
        if(!isset($permissions['saloons']['allow'])) return false;
        if(!isset($permissions['saloons']['deny'])) return false;

        $allow = $permissions['saloons']['allow'];
        $deny  = $permissions['saloons']['deny'];

        $center_id = \app\models\BaseSaloons::findOne($saloonId);
        if(empty($center_id)) return false;
        $center_id = $center_id->center_id;
        if(!self::checkCenter($center_id,$permissions)) return false;

        if(empty($allow))
        {   //all saloon
            if(empty($deny))
            {
                // nothing prohibited
                return true;
            }
            else
            {
                // not to be in deny list
                if(in_array($saloonId, $deny))
                    return false;
                else
                    return true;
            }
        }
        else
        {
            // selective allow
            if(in_array($saloonId, $allow))
            {
                if(in_array($saloonId, $deny))
                    return false;
                else
                    return true;
            }
            else
                return false;
        }
    }

    public static function checkAdmin($permissions)
    {
        if(!isset($permissions['admin'])) return false;
        return $permissions['admin'];
    }

    public static function checkRW($permissions)
    {
        if(!isset($permissions['rw'])) return false;
        return $permissions['rw'];
    }

    public static function checkAuthority($permissions)
    {
        if(!isset($permissions['authority'])) return "";
        return $permissions['authority'];
    }


}
abstract class Authority
{
    const Planner = "planner";
    const Executer = "executer";
    const Observer = "observer";
}
