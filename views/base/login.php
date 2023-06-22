<?php
/* @var $this yii\web\View */
/* @var $model */

$this->title = 'FiND|Login';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="div-center-contents bg-cover div-100vh">

    <div class="box-shadow-lightblue" style="width:80%;max-width: 500px; background-color: rgba(50,50,50,0.8); padding: 20px; border-radius:10px;">
        <img src="<?= Yii::$app->request->baseUrl.'/web/images/text.png'; ?>" style="display: block; margin:auto; width:100%;">
        <img src="<?= Yii::$app->request->baseUrl.'/web/images/icon.png'; ?>" style="display: block; margin:auto; width:150px;height:150px;">
        <?php $form = ActiveForm::begin(['options' => ['style' => "width:90%; max-width:300px; margin:auto; display:block; direction:rtl;"]]); ?>
        <?= $form->field($model, 'nid', ['labelOptions' => ['style' => 'color:white;'], 'errorOptions' => ['class' => 'text-yellow']])->textInput(['placeholder' => "کد ملی خود را وارد نمایید"]); ?>
        <?= $form->field($model, 'password', ['labelOptions' => ['style' => 'color:white;'], 'errorOptions' => ['class' => 'text-yellow']])->passwordInput(['placeholder' => "رمز عبور خود را وارد نمایید"]); ?>
        <div class="form-group" style="width:100px;margin:auto;">
            <br />
            <button type="submit" class="btn btn-info" style="width:100px;"><i class="fa fa-sign-in-alt text-white"></i> ورود</button>
        </div>
        <?php ActiveForm::end(); ?>
        <!-- display error message -->
        <?php if (Yii::$app->session->hasFlash('error')): ?>
        <br />
            <div  class="alert alert-danger alert-dismissible fade in" align="center" style="text-align: right; direction:rtl; margin: auto; width:100%;">
                <!--            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
            <br/>
        <?php endif; ?>

    </div>

</div>

