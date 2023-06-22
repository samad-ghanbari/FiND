<?php
/* @var $this yii\web\View */
/* @var $model \app\models\BaseViewSubex */
/* @var $saloons \app\models\BaseViewSaloons */
/* @var $subsProvider \yii\data\ActiveDataProvider */
/* @var $districts \app\models\BaseDistricts */
$this->title = 'FiND|Center';

use app\components\SaloonWidget;
if(empty($model->longitude)) $model->longitude = "-";
if(empty($model->latitude)) $model->latitude = "-";

?>
<!--info-->
<div class="box-shadow-dark" style="margin: 0; padding:0;background-color: #555; color:white;">
    <div style="width:100%; margin:0;padding:10px;">
        <h3 style="text-align: center; color:greenyellow; direction: rtl;"><?= "مرکز ".$model->name; ?></h3>
    </div>
    <div class="row" style="width: 100%; margin:0;">
        <div class="col-sm-2" style="padding: 10px;cursor:pointer;height:60px;line-height: 60px; ">
            <a data-toggle="tooltip" title="ویرایش/حذف مرکز" onclick="editCenter()" style="width:40px;display: block; margin: auto;"><i class=" fa fa-edit fa-2x hover-dim" style="color:greenyellow;"></i></a>
        </div>
        <div class="col-sm-10" style="margin:0;">
            <div class="row" style="width: 100%; margin:0;">
                <div class="col-sm-6 col-sm-push-6 " style="padding: 10px;height:60px;line-height: 60px;">
                    <h4 style="text-align: right;direction: rtl;"><?= "استان ".$model->province; ?></h4>
                </div>
                <div class="col-sm-6 col-sm-pull-6" style="padding: 10px;height:60px;line-height: 60px;">
                    <h4 style="text-align: right;direction: rtl;"><?= $model->district; ?></h4>
                </div>
            </div>
            <div class="row" style="width: 100%; margin:0;">
                <div class="col-sm-6" style="padding: 10px;height:60px;line-height: 60px; ">
                    <h4 style="text-align: right;direction: rtl;">
                        عرض جغرافیایی :
                        <?= " ".$model->latitude; ?>
                    </h4>
                </div>
                <div class="col-sm-6" style="padding: 10px;height:60px;line-height: 60px; ">
                    <h4 style="text-align: right;direction: rtl;">
                        طول جغرافیایی :
                        <?= " ".$model->longitude; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <hr style="margin:2px; padding:0; border-top:1px solid greenyellow;" />
    <div style="width:100%; margin:0;padding:10px;">
        <h5 style="text-align: right;direction: rtl;"><?= $model->address; ?></h5>
    </div>
</div>
<!--abbr-->
    <h2 style="width:150px;height:80px; line-height: 80px;text-align:center;margin:auto;color: #84dbff;"><?= $model->abbr; ?></h2>
<!--saloons-->
<div style="width:100%;margin: 10px; padding:10px;background-color: #555;">
    <div style="width: 100%; padding:10px;">
        <h4 style="text-align: right; color:#84dbff;float:right;">سالن‌های مرکز</h4>
        <a data-toggle="tooltip" title="سالن جدید" onclick="addSaloon()" style="width:40px;float:left; margin: auto;cursor:pointer;"><i class=" fa fa-plus fa-2x hover-dim" style="color:#84dbff;"></i></a>
    </div>
    <br />
    <div style="display: flex; align-items:center; flex-wrap:wrap; justify-content: center;width:100%;">
    <?php
    if(empty($saloons))
    {
        echo "<h4 style='color:#fff; direction:rtl; text-align: center;'> سالنی برای این مرکز تعریف نشده است.</h4>";
    }
    foreach ($saloons as $saloon) {
        echo SaloonWidget::widget(['model' => $saloon]);
    }
    ?>
    </div>
</div>
<br />
<!--subscribers-->
<div style="width:100%;margin: 10px; padding:10px;background-color: #555;">
    <div style="width: 100%; padding:10px;">
        <h4 style="text-align: right; color:#84dbff;float:right;">مشترکین مرکز</h4>
        <a data-toggle="tooltip" title="مشترک جدید" onclick="addSubscriber()" style="width:40px;float:left; margin: auto;cursor:pointer;"><i class=" fa fa-plus fa-2x hover-dim" style="color:#84dbff;"></i></a>
    </div>
    <br />
    <div style="display: flex; align-items:center; flex-wrap:wrap; justify-content: center;width:100%;">
        <?php
        if(empty($subsProvider->getModels()))
        {
            echo "<h4 style='color:#fff; direction:rtl; text-align: center;'>مشترکی در این مرکز موجود نیست.</h4>";
        }
        foreach ($subsProvider->getModels() as $sub)
        {
            echo \app\components\SubexWidget::widget(['model'=>$sub]);
        }
        echo '<br style="clear: both;">';
        echo yii\widgets\LinkPager::widget([
                'pagination' => $subsProvider->pagination,
                'options'=>['style'=>'float:left;', 'class'=>'pagination'] ]);
        ?>
        <br style="clear: both">
    </div>
</div>
<br />
<!-- side button back-->
<a data-toggle="tooltip" title="بازگشت" href="<?= Yii::$app->request->baseUrl.'/base/districts';?>" class="side-button-div-small" style="color:white;  padding:5px; background-color: mediumvioletred; top:145px;">
    <i class="fa fa-arrow-left" style="float:right; line-height: 40px;height:40px;"></i>
</a>

<?php
require_once("modals/newSubscriberModal.php");
require_once("modals/newSaloonModal.php");
require_once("modals/editCenterModal.php");
require_once(Yii::$app->basePath."/views/modals/searchModal.php");
require_once(Yii::$app->basePath."/views/modals/warningModal.php");

$bPath = Yii::$app->request->baseUrl;
$temp = ['id'=>$model->id, 'district_id'=>$model->district_id, 'name'=>$model->name, 'abbr'=>$model->abbr, 'latitude'=>$model->latitude, 'longitude'=>$model->longitude, 'address'=>$model->address];
$centerJson = json_encode($temp);
//districts
$districtsJason = [];
foreach ($districts as $dist)
    $districtsJason[$dist['id']] = $dist->district;
$districtsJason = json_encode($districtsJason);
$js = <<< JS

$(document).ready(function()
{
  $('[data-toggle="tooltip"]').tooltip({'container': 'body','placement': 'bottom'});
});

function editCenter()
{
    $("#centerDistrictId").empty();
    var json = $districtsJason;
    for(var id in json)
    {
        $("#centerDistrictId").append('<option value='+id+'>'+json[id]+'</option>');
    }
    
    json = $centerJson;
    $("#centerId").val(json.id);
    $("#centerDistrictId").val(json.district_id);
    $("#centerNameId").val(json.name);
    $("#centerAbbrId").val(json.abbr);
    $("#centerLatId").val(json.latitude);
    $("#centerLongId").val(json.longitude);
    $("#centerAddressId").val(json.address);
    $("#editCenterModal").modal("show");
}

function addSaloon()
{
    $("#modalSaloonCenterId").val($centerJson.id);
    $("#modalSaloonCenter").val($centerJson.name);
    $("#modalSaloonBuilding").val("");
    $("#modalSaloonFloor").val("");
    $("#modalSaloonWidth").val(10);
    $("#modalSaloonHeight").val(10);
    $("#newSaloonModal").modal("show");
}

function addSubscriber()
{
    $("#modalNewSubDistrictId").val($centerJson.district_id);
    $("#modalNewSubCenterId").val($centerJson.id);
    $("#modalNewSubCenter").val($centerJson.name);
    $("#modalNewSubName").val("");
    $("#modalNewSubAbbr").val("");
    $("#modalNewSubLat").val("");
    $("#modalNewSubLong").val("");
    $("#modalNewSubAddress").val("");
    
    $("#newSubscriberModal").modal("show");
}
JS;
$this->registerJs($js, Yii\web\View::POS_END);
?>