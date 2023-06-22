<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\db\JsonExpression;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class CenterController extends Controller
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

    public function actionIndex($id=-1)
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if($id == -1)
        {
            if(isset($session['selected']))
            {
                if($session['selected']['center_id'] > 0)
                    $id = $session['selected']['center_id'];
                else
                    return $this->redirect(['base/districts']);
            }
            else
                return $this->redirect(['base/districts']);
        }

        //check permission
        if(\app\components\User::checkCenter($id, $user->permissions ))
        {
            if(isset($session['selected']))
                Yii::$app->session->remove('selected');

            $center = \app\models\BaseViewSubex::findOne($id);
            if(empty($center)) return $this->redirect(['base/districts']);
            $district_id = $center->district_id;
            $province_id = \app\models\BaseDistricts::findOne($district_id);
            if(empty($province_id)) return $this->redirect(['base/districts']);
            $province_id = $province_id->province_id;
            $districts = \app\models\BaseDistricts::find()->where(['province_id'=>$province_id])->all();
            $selected = \app\components\FiNDHelper::getSelectedArray($province_id, $district_id, $id,-1);
            $session['selected'] = $selected;

            $saloons = \app\models\BaseViewSaloons::find()->where(['center_id'=>$id])->orderBy('building_name', 'floor_no', 'saloon_name')->all();
            //subscribers page by page
            if(empty(Yii::$app->request->queryParams))
            {
                $searchModel = new \app\models\BaseViewSubexSearch();
                $subsProvider = $searchModel->search(Yii::$app->request->queryParams);
                $subsProvider->query->andWhere(['center_id' => $id])->orderBy('name');
            }
            else
            {
                $query = \app\models\BaseViewSubexSearch::find()->where(["center_id" => $id])->orderBy('name');
                $subsProvider = new ActiveDataProvider(['query' => $query]);
            }
            $subsProvider->pagination->pageSize = 20;

            return $this->render("index", ['model'=>$center,'subsProvider'=>$subsProvider, "saloons"=>$saloons, 'districts'=>$districts]);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز دسترسی به این مرکز را ندارید.");
            return $this->redirect(['base/districts']);
        }
    }

    public function actionEdit_remove_center()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if(!Yii::$app->request->isPost)
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
        $post = Yii::$app->request->post()['center'];
        $id = $post['id'];
        $district_id = $post['district'];
        $name = $post['name'];
        $abbr = $post['abbr'];
        $lat = $post['lat'];
        $lng = $post['long'];
        $address = $post['address'];
        $action = $post['action'];


        $model = \app\models\BaseSubex::findOne($id);

        if(!empty($model->center_id)) return $this->redirect(['center/index']);

        //check permission
        if(\app\components\User::checkCenter($model->id, $user->permissions ))
        {
            if($action == "update")
            {
                $model->district_id = $district_id;
                $model->center_id = null;
                $model->name = $name;
                $model->abbr = $abbr;
                $model->latitude = $lat;
                $model->longitude = $lng;
                $model->address = $address;
                try
                {
                    if($model->update())
                    {
                        Yii::$app->session->setFlash("success", "ویرایش اطلاعات مرکز با موفقیت انجام شد.");
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    }
                } catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                }

                return $this->redirect(['center/index', 'id'=>$model->id]);
            }
            else if($action == "remove")
            {
                try
                {
                    if($model->delete())
                    {
                        Yii::$app->session->setFlash("success", "حذف مرکز با موفقیت انجام شد.");
                        $selected = $session['selected'];
                        $selected['center_id'] = -1;
                        Yii::$app->session->remove('selected');
                        $session['selected'] = $selected;
                        return $this->redirect(['base/districts']);
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                        return $this->redirect(['center/index', 'id'=>$model->id]);
                    }

                }
                catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    return $this->redirect(['center/index', 'id'=>$model->id]);
                }
            }
            else
                return $this->redirect(['center/index']);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
    }

    public function actionSubscriber($id=-1)
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if($id == -1) return $this->redirect(['center/index']);

        $subsModel = \app\models\BaseViewSubex::findOne($id);

        if(empty($subsModel->center_id)) return $this->redirect(['center/index']);

        //check permission
        if(\app\components\User::checkCenter($subsModel->center_id, $user->permissions ))
        {
            //districts
            $province_id = $subsModel->province_id;
            if(empty($province_id)) return $this->redirect(['center/index']);
            $districts = \app\models\BaseDistricts::find()->where(['province_id'=>$province_id])->all();
            $districtsArray = [];
            foreach ($districts as $dist)
            {
                $districtsArray[$dist->id] = $dist->district;
            }
            //centers
            $centersArray = [];
            $centers = \app\models\BaseSubex::find()->where(['center_id'=>null])->orderBy('district_id, name')->all();
            foreach ($centers as $cen)
            {
                $centersArray[$cen->district_id][$cen->id] = "مرکز ".$cen->name;
            }

            return $this->render("subscriber", ['model'=>$subsModel, 'districtsArray'=>$districtsArray, 'centersArray'=>$centersArray]);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز دسترسی به مشترکین این مرکز را ندارید.");
            return $this->redirect(['base/districts']);
        }
    }

    public function actionEdit_remove_subscriber()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if(!Yii::$app->request->isPost)
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
        $post = Yii::$app->request->post()['subscriber'];
        $id = $post['id'];
        $district_id = $post['district'];
        $center_id = $post['center'];
        $name = $post['name'];
        $abbr = $post['abbr'];
        $lat = $post['lat'];
        $lng = $post['long'];
        $address = $post['address'];
        $action = $post['action'];

        if($center_id < 1) return $this->redirect(['center/index']);

        $subsModel = \app\models\BaseSubex::findOne($id);

        if(empty($subsModel->center_id)) return $this->redirect(['center/index']);

        //check permission
        if(\app\components\User::checkCenter($subsModel->center_id, $user->permissions ))
        {
            if($action == "update")
            {
                $subsModel->district_id = $district_id;
                $subsModel->center_id = $center_id;
                $subsModel->name = $name;
                $subsModel->abbr = $abbr;
                $subsModel->latitude = $lat;
                $subsModel->longitude = $lng;
                $subsModel->address = $address;
                try
                {
                    if($subsModel->update())
                    {
                        Yii::$app->session->setFlash("success", "ویرایش اطلاعات مشترک با موفقیت انجام شد.");
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    }
                } catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                }

                return $this->redirect(['center/subscriber', 'id'=>$subsModel->id]);
            }
            else if($action == "remove")
            {
                try
                {
                    if($subsModel->delete())
                    {
                        Yii::$app->session->setFlash("success", "حذف مشترک با موفقیت انجام شد.");
                        return $this->redirect(['center/index']);
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                        return $this->redirect(['center/subscriber', 'id'=>$subsModel->id]);
                    }
                }
                catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    return $this->redirect(['center/subscriber', 'id'=>$subsModel->id]);
                }
            }
            else
                return $this->redirect(['center/index']);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
    }

    public function actionNew_saloon()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if(!Yii::$app->request->isPost)
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
        $post = Yii::$app->request->post()['saloon'];
        $center_id = $post['center_id'];
        $building_name = $post['building_name'];
        $floor_no = $post['floor_no'];
        $name = $post['name'];
        $append_char = $post['append_char'];
        $width = $post['width'];
        $height = $post['height'];

        //check permission
        if(\app\components\User::checkCenter($center_id, $user->permissions ))
        {
            $model = new \app\models\BaseSaloons();
            $model->center_id = $center_id;
            $model->building_name = $building_name;
            $model->floor_no = $floor_no;
            $model->saloon_name = $name;
            $model->append_char = $append_char;
            $model->saloon_width = $width;
            $model->saloon_height = $height;

            try
            {
                if($model->save())
                {
                    Yii::$app->session->setFlash("success", "سالن جدید با موفقیت اصافه شد.");
                }
                else
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                }
            } catch (\Exception $e)
            {
                Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
            }

            return $this->redirect(['center/index', 'id'=>$model->center_id]);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['base/districts']);
        }
    }

    public function actionNew_subscriber()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if(!Yii::$app->request->isPost)
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
        $post = Yii::$app->request->post()['sub'];
        $district_id = $post['district_id'];
        $center_id = $post['center_id'];
        $name = $post['name'];
        $abbr = $post['abbr'];
        $lat = $post['lat'];
        $long = $post['long'];
        $address = $post['address'];

        //check permission
        if(\app\components\User::checkCenter($center_id, $user->permissions ))
        {
            $model = new \app\models\BaseSubex();
            $model->district_id = $district_id;
            $model->center_id = $center_id;
            $model->name = $name;
            $model->abbr = $abbr;
            $model->latitude = $lat;
            $model->longitude = $long;
            $model->address = $address;
            try
            {
                if($model->save())
                {
                    Yii::$app->session->setFlash("success", "مشترک جدید با موفقیت اصافه شد.");
                }
                else
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                }
            } catch (\Exception $e)
            {
                Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
            }

            return $this->redirect(['center/index', 'id'=>$model->center_id]);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['base/districts']);
        }
    }

    // Saloon
    public function actionSaloon($id = -1)
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if($id == -1)
        {
            if(isset($session['selected']))
            {
                if($session['selected']['saloon_id'] > 0)
                    $id = $session['selected']['saloon_id'];
                else
                    return $this->redirect(['center/index']);
            }
            else
                return $this->redirect(['center/index']);
        }

        //check permission
        if(\app\components\User::checkSaloon($id, $user->permissions ))
        {
            $selected = $session['selected'];
            if(isset($session['selected']))
                Yii::$app->session->remove('selected');
            $selected['saloon_id'] = $id;
            $session['selected'] = $selected;

            $model = \app\models\BaseViewSaloons::find()->where(['id'=>$id])->asArray()->one();
            return $this->render('saloon', ['model'=>$model]);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز دسترسی به این سالن را ندارید.");
            return $this->redirect(['center/index']);
        }
    }

    public function actionEdit_remove_saloon()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!isset($session['user'])) return $this->redirect(['base/logout']);
        $user = $session['user'];

        if(!Yii::$app->request->isPost)
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
        $post = Yii::$app->request->post()['saloon'];
        $id = $post['id'];
        $building_name = $post['building_name'];
        $floor_no = $post['floor_no'];
        $name = $post['name'];
        $append_char = $post['append_char'];
        $width = $post['width'];
        $height = $post['height'];
        $action = $post['action'];

        if($id < 1) return $this->redirect(['center/index']);
        $model = \app\models\BaseSaloons::findOne($id);

        //check permission
        if(\app\components\User::checkSaloon($id, $user->permissions ))
        {
            if($action == "update")
            {
                $model->building_name = $building_name;
                $model->floor_no = $floor_no;
                $model->saloon_name = $name;
                $model->append_char = $append_char;
                $model->saloon_width = $width;
                $model->saloon_height = $height;

                try
                {
                    if($model->update())
                    {
                        Yii::$app->session->setFlash("success", "ویرایش اطلاعات سالن با موفقیت انجام شد.");
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    }
                } catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                }

                return $this->redirect(['center/saloon', 'id'=>$model->id]);
            }
            else if($action == "remove")
            {
                try
                {
                    if($model->delete())
                    {
                        Yii::$app->session->setFlash("success", "حذف سالن با موفقیت انجام شد.");
                        return $this->redirect(['center/index']);
                    }
                    else
                    {
                        Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                        return $this->redirect(['center/saloon', 'id'=>$model->id]);
                    }
                }
                catch (\Exception $e)
                {
                    Yii::$app->session->setFlash("error", "انجام عملیات با خطا مواجه شد.");
                    return $this->redirect(['center/saloon', 'id'=>$model->id]);
                }
            }
            else
                return $this->redirect(['center/index']);
        }
        else
        {
            Yii::$app->session->setFlash("error", "شما مجوز لازم برای این عملیات را ندارید.");
            return $this->redirect(['center/index']);
        }
    }

    // floorplan
    public function actionRearrange_object()
    {
        return true;
    }



}
