<?php

namespace app\controllers;

use Yii;
use yii\db\JsonExpression;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class BaseController extends Controller
{
    public function actions()
    {
        return ['error' => ['class' => 'yii\web\ErrorAction']];
    }

    public function beforeAction($action)
    {
        $ret = \app\components\FiNDHelper::beforeAction();
        if(!empty($ret['redirect']))
            return $this->redirect([$ret['redirect']]);
        else if($ret['default'] == true)
            return parent::beforeAction($action);
        else
            return $this->redirect(['base/index']);
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();

        $userIp =  \Yii::$app->request->getUserIP();
        $allowed = \app\components\User::getAllIps();
        if(in_array($userIp, $allowed))
        {
            $session['ipAccepted'] = true;
            return $this->redirect(['base/login']);
        }
        else
        {
            $session['ipAccepted'] = false;
            $this->layout = "plain";
            return $this->render("denied");
        }
    }

    public function actionLogin()
    {
        $model = new \app\models\BaseUsers();

        if (Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post()))
            {
                $model->password = md5($model->password);
                $user = \app\models\BaseUsers::find()->where(["nid" => $model->nid, "password" => $model->password])->one();
                if(!empty($user))
                {
                    //valid permissions
                    if(\app\components\User::isPermissionsValid($user->permissions))
                    {
                        // check user IP
                        $allowed = \app\components\User::getUserIps($user['id']);
                        $userIp =  \Yii::$app->request->getUserIP();
                        if(in_array($userIp, $allowed))
                        {
                            $session = Yii::$app->session;
                            $session->open();
                            if (isset($session['user']))
                                $session->remove("user");

                            //check user is enabled
                            if(!$user->permissions['enabled'])
                            {
                                //user disabled
                                Yii::$app->session->setFlash('error', "اکانت شما فعال نیست لطفا با ادمین خود تماس بگیرید.");
                                return $this->redirect(['base/logout']);
                            }

                            $session['user'] = $user;

                            //check user must reset password
                            if($user->permissions['reset_password'])
                            {
                                //user must reset password
                                return $this->redirect(['base/reset_password']);
                            }

                            return $this->redirect(['base/provinces']);
                        }
                        else
                        {
                            Yii::$app->session->setFlash('error', "ورود به سامانه از این سیستم برای شما مجاز نمی‌باشد!");
                            $model->nid = NULL;
                            $model->password = NULL;
                            return $this->redirect(['base/index']);
                        }

                    }
                    else
                    {
                        Yii::$app->session->setFlash('error', "مجوز اکانت شما معتبر نمی باشد لطفا با ادمین خود تماس بگیرید.");
                        $model->password = NULL;
                    }
                }
                else
                {
                    Yii::$app->session->setFlash('error', "نام کاربری یا رمز عبور اشتباه است");
                    $model->password = NULL;
                }
            }
        }

        $this->layout = "plain";
        return $this->render('login',['model' => $model]);
    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->open();
        if (isset($session['user']))
        {
            $session->remove('user');
        }

        $session->destroy();
        return $this->redirect(['base/index']);
    }

    public function actionReset_password()
    {
        $session = Yii::$app->session;
        $session->open();
        if (isset($session['user']))
        {
            $user = $session['user'];
            if($user->permissions['reset_password'])
            {
                if(Yii::$app->request->isPost)
                {
                    $post = Yii::$app->request->post();
                    $id = $post['id'];
                    $password = md5($post['password']);
                    $passwordConfirm = md5($post['passwordConfirm']);
                    $cp = md5($post['cp']);
                    $model = \app\models\BaseUsers::findOne($user->id);

                    if(($model->password == $cp) && ($id == $model->id) )
                    {
                        if($password == $passwordConfirm)
                        {
                            $model->passwordConfirm = $password;
                            $model->password = $password;
                            $permissions = $model->permissions;
                            $permissions['reset_password'] = false;
                            $model->permissions = new JsonExpression($permissions);
                            try
                            {
                                $model->update();
                                $session->remove('user');
                                $model = \app\models\BaseUsers::findOne($user->id);
                                $session['user'] = $model;

                                Yii::$app->session->setFlash('success', 'رمز شما با موفقیت تغییر یافت.');
                                return $this->redirect(['base/index']);
                            }
                            catch (\Exception $e){Yii::$app->session->setFlash('error', 'تغییر رمز با خطا مواجه شد.');}
                        }
                        else
                            Yii::$app->session->setFlash('error', 'رمزهای جدید وارد شده با هم تطابق ندارند.');
                    }
                    else
                        Yii::$app->session->setFlash('error', 'رمز جاری وارد شده صحیح نمی باشد.');
                }

                $this->layout = "plain";
                return $this->render("reset_password", ['user'=>$user]);
            }
            else
                return $this->redirect(['base/index']);
        } else
            return $this->redirect(['base/logout']);
    }

    public function actionProvinces($id=-1)
    {
        $session = Yii::$app->session;
        $session->open();

        if(isset($session['selected']))
        {
            if($id == -1)
                if($session['selected']['province_id'] > 0)
                    $id = $session['selected']['province_id'];

            $session->remove("selected");
        }

        if (isset($session['user']))
        {
            $user = $session['user'];
            if($id == -1)
            {
                //get the first province id of user permissions
                $provinces = $user->permissions['provinces'];
                if(isset($provinces[0]))
                    $id = $provinces[0];
            }
            // check permission
            if(\app\components\User::checkProvince($id,$user->permissions))
            {
                $session['selected'] = \app\components\FiNDHelper::getSelectedArray($id, -1, -1, -1);
                $province_name = \app\models\BaseProvinces::findOne($id);
                return $this->render("provinces", ['user'=>$session['user'], "province_id"=>$id, "province_name"=>" استان ".$province_name->province]);
            }
            else
            {
                $prvName = \app\models\BaseProvinces::findOne($id);
                if(!empty($prvName)) $prvName = $prvName->province;
                $id = -1;
                //get the first province id of user permissions
                $provinces = $user->permissions['provinces'];
                if(isset($provinces[0]))
                    $id = $provinces[0];

                if($id > 0)
                {
                    $session['selected'] = ['province_id'=>$id, 'district_id'=>-1, 'center_id'=>-1, 'saloon_id'=>-1];
                    Yii::$app->session->setFlash("error", "شما مجوز مشاهده استان ".$prvName." را ندارید. ");
                    $province_name = \app\models\BaseProvinces::findOne($id);
                    return $this->render("provinces", ['user'=>$session['user'], "province_id"=>$id, "province_name"=>" استان ".$province_name->province]);
                }
                else
                {
                    Yii::$app->session->setFlash("error", "شما مجوز مشاهده هیچ استانی را ندارید.");
                    return $this->redirect(['base/logout']);
                }
            }

        } else
            return $this->redirect(['base/logout']);
    }

    public function actionDistricts($id=-1)
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];
        if(isset($session['selected']))
        {
            if($id == -1)
                if($session['selected']['district_id'] > 0)
                    $id = $session['selected']['district_id'];
                else
                    return $this->redirect(['base/provinces']);

            $session->remove('selected');
        }
        else if($id == -1) return $this->redirect(['base/provinces']);

        if(\app\components\User::checkDistrict($id, $user->permissions))
        {
            $districtName = \app\models\BaseDistricts::findOne($id);
            if(!empty($districtName))
            {
                $provinceId = $districtName->province_id;
                $session['selected'] = \app\components\FiNDHelper::getSelectedArray($provinceId, $id, -1, -1);
                $provinceName = \app\models\BaseProvinces::findOne($provinceId)->province;
                $districtName = $districtName->district;
                $subexModel= \app\models\BaseSubex::find()->where(['district_id'=>$id, 'center_id'=>null])->orderBy("abbr")->all();

                return $this->render("district", ['province'=>['id'=>$provinceId, 'name'=>$provinceName], 'district'=>['id'=>$id,'name'=>$districtName], "subexModel"=>$subexModel]);
            }
            else
                return $this->redirect(['base/provinces']);
        }
        else
        {
            $dist = \app\models\BaseDistricts::findOne($id);
            if(!empty($dist)) $dist = $dist->district;
            Yii::$app->session->setFlash("error", "شما مجوز مشاهده ".$dist." را ندارید. ");
            return $this->redirect(['base/provinces']);
        }
    }

    public function actionSearch_sub_in_district()
    {
        if (Yii::$app->request->isAjax)
        {
            $session = Yii::$app->session;
            $session->open();
            if(!isset($session['user']))
                return $this->redirect(['base/logout']);
            if(!isset($session['selected']['district_id']))
                return $this->redirect(['base/districts']);

            $post = Yii::$app->request->post();
            $districtId = -1;
            if(isset($post['districtId']))
                $districtId = $post['districtId'];
            if($districtId == -1)
                $districtId = $session['selected']['district_id'];

            if(\app\components\User::checkDistrict($districtId, $session['user']->permissions))
            {
                $dataModel = new \app\models\BaseViewSubexSearch();
                if (Yii::$app->request->queryParams)
                {
                    $dataProvider = $dataModel->search(Yii::$app->request->queryParams);
                    $dataProvider->query->andWhere(['district_id' => $districtId]);
                }
                else
                {
                    $query = \app\models\BaseViewSubexSearch::find()->where(["district_id" => $districtId]);
                    $dataProvider = new ActiveDataProvider(['query' => $query]);
                }
                $dataProvider->query->andWhere(['not',['center_id' => null]]);
                $dataProvider->pagination->pageSize = 3;
                return $this->renderAjax('modals/ajax/searchSubInDistrict', ['dataProvider'=>$dataProvider, 'filterModel'=>$dataModel]);
            }
            else
            {
                //no permission
                Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
                return $this->redirect(['base/districts']);
            }
        }

        return "not ajax";//$this->redirect(['base/logout']);
    }

    public function actionAdd_new_center()
    {
        if (Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post()["center"];
            $session = Yii::$app->session;
            $session->open();
            if (isset($session['user']))
            {
                $district = $post['district'];
                $name = $post['name'];
                $abbr = $post['abbr'];
                $lat = $post['lat'];
                $long = $post['long'];
                $addr = $post['address'];
                if(\app\components\User::checkDistrict($district, $session['user']->permissions))
                {
                    $model = new \app\models\BaseSubex();
                    $model->district_id = $district;
                    $model->center_id = null;
                    $model->name = $name;
                    $model->abbr = $abbr;
                    $model->latitude = $lat;
                    $model->longitude = $long;
                    $model->address = $addr;

                    if (($district > -1) && (!empty($name))  && (!empty($abbr)))
                    {
                        if($model->save())
                            Yii::$app->session->setFlash("success", "عملیات با موفقیت انجام شد.");
                        else
                            Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    }
                    else
                        Yii::$app->session->setFlash("error", "پارامترهای ورودی به درستی وارد نشده است.");

                    return $this->redirect(['base/districts', 'id' => $district]);
                }
                else
                {
                    //permission denied
                    Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
                    return $this->redirect(['base/provinces']);
                }
            }
            else
                return $this->redirect(['base/logout']);
        }

        return $this->redirect(["base/districts"]);
    }

}
