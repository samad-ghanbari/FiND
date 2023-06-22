<?php
/* @var $model \app\models\BaseViewSaloons */
?>
<a id="<?= "comp-".$model->id; ?>" href="<?= Yii::$app->request->baseUrl.'/center/saloon?id='.$model->id; ?>" >
  <div id="<?= "comp-div-".$model->id; ?>" class="hover-dim comp-div" style="direction:rtl;width:250px; height: 200px; background-color:gainsboro; margin:5px;padding:5px;">
      <h4 class="text-center" style="color:dodgerblue;height: 30px;line-height: 30px;"><?= "سالن ".$model->saloon_name; ?></h4>
      <hr style="margin:1px; padding:0;">
      <h4 style="text-align: center; color:#222;height: 30px;line-height: 30px;"><?= "ساختمان ".$model->building_name; ?></h4>
      <h4 style="direction:rtl; text-align: center; color:#333;height: 30px;line-height: 30px;">
          <?= "طبقه "."<span style='display: inline-block; direction: ltr;'>".$model->floor_no."</span>"; ?>
      </h4>
      <h5 style="clear:both;text-align: center; color:mediumvioletred;font-weight:bold; height: 30px;line-height: 30px;"><?= $model->saloon_abbr; ?></h5>
  </div>
</a>
