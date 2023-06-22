<?php

/* @var $this yii\web\View */

?>
<div class="div-center-contents div-100vh">
    <div class="site-error">
        <div class="alert alert-danger text-center"   style="border:2px solid mediumvioletred;padding:10px;">
            <img src="<?= Yii::$app->request->baseUrl.'/web/images/denied.png'; ?>" style="display: block; width: 200px; margin:auto;">
            <br />
            <h4 style="direction: rtl; text-align: center;color:mediumvioletred;">
                شما مجوز لازم جهت ورود به سامانه را ندارید.
            </h4>
            <br / >
            <img src="<?= Yii::$app->request->baseUrl.'/web/images/icon.png'; ?>" style="display: block; width: 200px; margin:auto;">
        </div>
    </div>
</div>

