<?php
/* @var $model \app\models\BaseSubex */

$url = "";
if(empty($model->center_id))
    $url = Yii::$app->request->baseUrl.'/center/index?id='.$model->id;
else
    $url = Yii::$app->request->baseUrl.'/center/subscriber?id='.$model->id;;
?>

<a id="<?= "comp-".$model->abbr; ?>" href="<?= $url; ?>" >
  <div id="<?= "comp-div-".$model->abbr; ?>" class="hvr-grow comp-div" style="width:250px; height: 300px; background-color:gainsboro; margin:5px;padding:5px;">
      <h3 class="text-center" style="color:dodgerblue;"><?= $model->abbr; ?></h3>
      <hr style="margin: 2px;" />
      <h4 style="text-align: center; color:#222;"><?= $model->name; ?></h4>
      <hr style="margin: 2px;" />
      <p style="text-align: left; line-height:30px; padding:5px; width:100%;height:30px; color:#444;"><?= "Lat: ".$model->latitude; ?></p>
      <p style="text-align: left;width:100%;height:30px; line-height:30px; padding:5px; color:#444;"><?= "Long: ".$model->longitude; ?></p>
      <hr style="margin: 2px;" />
      <h5 style="text-align: center; color:#444;"><?= $model->address; ?></h5>
  </div>
</a>
