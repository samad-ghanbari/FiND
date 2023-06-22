<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "FiND|".$name;
?>
<div class="div-center-contents div-100vh">
    <div class="site-error">
        <div class="alert alert-danger text-center">
            <img src="<?= Yii::$app->request->baseUrl.'/web/images/error.png'; ?>" style="display: block; width: 200px; margin:auto;">
            <br />
            <h3><?= Html::encode($this->title) ?></h3>
            <?= nl2br(Html::encode($message)) ?>
            <br /><br />
            <a href="<?= Yii::$app->request->baseUrl."/base/index"; ?>" class="btn btn-danger" style="width:200px;display: block;margin:auto;"> بازگشت  <i class="fa fa-undo"></i> </a>

            <br /><br />
            <p style="direction: rtl; text-align: right;">
                صفحه درخواستی شما با خطا مواجه شد
            </p>
            <p style="direction: rtl;text-align: right;">
                اگر چنانچه فکر می‌کنید این خطا از سمت سرور می‌باشد موضوع را به ادمین سامانه اطلاع دهید.
            </p>
        </div>
        <br / >
        <img src="<?= Yii::$app->request->baseUrl.'/web/images/icon.png'; ?>" style="display: block; width: 200px; margin:auto;">
    </div>
</div>