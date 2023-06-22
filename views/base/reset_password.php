<?php
/* @var $this yii\web\View */
/* @var $user */

$this->title = 'FiND|Login';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$session = Yii::$app->session;
$session->open();
?>
<div class="div-center-contents bg-cover div-100vh">

    <div class="box-shadow-lightblue" style="width:80%;background-color: rgba(50,50,50,0.6); padding: 20px; border-radius:10px;">
        <div class="row" style="width:100%; margin:0px auto;">
            <div class="col-md-4 col-md-push-7 padding-5">
                <h4 class="text-white text-right padding-5" style="direction: rtl;">پسورد جدید خود را وارد نمایید</h4>
                <div class="box-shadow-dark" style="background-color: rgba(50,50,50,0.8);border-radius:10px; padding:20px; width:95%; max-width:450px;margin: auto;">
                    <?php
                    $form = ActiveForm::begin(['options'=>['style'=>'direction:rtl;']]);
                    ?>
                    <label style='color:#84dbff;' for='pId'>رمز جاری</label>
                    <?= Html::input('cp','cp','', $options=['id'=>"pId", 'type'=>"password", 'class'=>'form-control', 'placeholder'=>'رمز جاری', 'style'=>"dispaly: block;margin:auto;"]); ?>
                    <hr style="border-top:1px dotted #84dbff;">
                    <?php
                    echo "<input name='id' type='hidden' value='".$user->id."'>";
                    echo "<label class='text-white' for='p1Id'>رمز عبور جدید</label>";
                    echo Html::input('password','password','', $options=['id'=>"p1Id", 'type'=>"password", 'class'=>'form-control', 'style'=>'margin:auto;']);
                    echo "<label class='text-white' for='p2Id'>تایید رمز عبور</label>";
                    echo Html::input('passwordConfirm','passwordConfirm', '', $options=['id'=>"p2Id", 'type'=>"password", 'class'=>'form-control', 'style'=>'margin:auto;']);
                    ?>
                    <br />
                    <div class="form-group">
                        <?= Html::submitButton('تایید', ['class' => 'btn btn-success pull-left',"style"=>"width:100px;", "id"=>"resetPassBtn"]) ?>
                    </div>
                    <br style="clear:both;" />
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-4 padding-5">
                <img style="padding-top:5%; width=90%; max-width:300px; display:block;margin:auto; margin-top:20px;" src="<?= Yii::$app->request->baseUrl."/web/images/new_pass.png"; ?>">
            </div>
        </div>

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

