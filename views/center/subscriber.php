<?php
/* @var $this yii\web\View */
/* @var $model \app\models\BaseViewSubex */
/* @var $districtsArray */
/* @var $centersArray */
$this->title = 'FiND|Subscriber';

if(empty($model->longitude)) $model->longitude = "-";
if(empty($model->latitude)) $model->latitude = "-";

?>
<!--info-->
<div style="margin: 0; padding:0;background-color: #555; color:white;">
    <div style="width:100%; margin:0;padding:10px;">
        <h3 style="text-align: center; color:greenyellow; direction: rtl;"><?= $model->name; ?></h3>
        <h3 style="text-align: center; color:limegreen; direction: rtl;"><?= "محدوده مرکز: ".$model->center_name; ?></h3>
    </div>
    <div class="row" style="width: 100%; margin:0;">
        <div class="col-sm-2" style="padding: 10px;cursor:pointer;height:60px;line-height: 60px; ">
            <a data-toggle="tooltip" title="ویرایش/حذف مشترک" onclick="editSubscriber()" style="width:40px;display: block; margin: auto;"><i class=" fa fa-edit fa-2x hover-dim" style="color:greenyellow;"></i></a>
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
<!-- topology -->
<div style="width:100%;margin: 10px; padding:10px;background-color: #555;">
    <h4 style="text-align: right; color:#84dbff;width:100%;padding:10px;">توپولوژی ارتباط</h4>
    <br />

</div>
<br />
<!-- side button back-->
<a data-toggle="tooltip" title="بازگشت" href="<?= Yii::$app->request->baseUrl.'/center/index';?>" class="side-button-div-small" style="color:white;  padding:5px; background-color: mediumvioletred; top:145px;">
    <i class="fa fa-arrow-left" style="float:right; line-height: 40px;height:40px;"></i>
</a>

<?php
require_once("modals/editSubscriberModal.php");

$bPath = Yii::$app->request->baseUrl;
$districtsJson = json_encode($districtsArray);
$centersJson = json_encode($centersArray);
$temp = ['id'=>$model->id, 'district_id'=>$model->district_id, 'center_id'=>$model->center_id, 'name'=>$model->name, 'abbr'=>$model->abbr, 'latitude'=>$model->latitude, 'longitude'=>$model->longitude, 'address'=>$model->address];
$subsJson = json_encode($temp);

$js = <<< JS

$(document).ready(function()
{
  $('[data-toggle="tooltip"]').tooltip({'container': 'body','placement': 'bottom'});
});

function districtChanged()
{
    var centersJson = $centersJson;
    var districtId = $("#subsDistrictId").val();
    $("#subsCenterId").empty();
    for(var id in centersJson[districtId])
        $("#subsCenterId").append('<option value='+id+'>'+centersJson[districtId][id]+'</option>');
}
function editSubscriber()
{
    $("#subsDistrictId").empty();
    $("#subsCenterId").empty();
    var districtsJson = $districtsJson;
    var dId = $subsJson.district_id;
    var cId = $subsJson.center_id;
    
    for (var id in districtsJson)
            $("#subsDistrictId").append('<option value='+id+'>'+districtsJson[id]+'</option>');
    $("#subsDistrictId").val(dId);
    districtChanged();
    $("#subsCenterId").val(cId);
    $("#subsId").val($subsJson.id);
    $("#subsAbbrId").val($subsJson.abbr);
    $("#subsNameId").val($subsJson.name);
    $("#subsLatId").val($subsJson.latitude);
    $("#subsLongId").val($subsJson.longitude);
    $("#subsAddressId").val($subsJson.address);    
    $("#editSubscriberModal").modal("show");
}

JS;
$this->registerJs($js, Yii\web\View::POS_END);
?>