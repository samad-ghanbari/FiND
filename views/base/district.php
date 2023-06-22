<?php
/* @var $this yii\web\View */
/* @var $subexModel \app\models\BaseSubex */
/* @var $province */
/* @var $district */
$this->title = 'FiND|District';

use app\components\SubexWidget;
?>
<div style="width:95%; padding:5px; margin:5px auto;">
    <h3 style="text-align: center;direction: rtl;"><?= " استان ".$province['name'];?></h3>
    <h4 style="text-align: center;direction: rtl;"><?= " لیست مراکز ".$district['name']; ?></h4>
    <form onsubmit="goIntoAbbr(); return false;">
        <div class="input-group" style="max-width: 400px; min-width: 100px;height: 40px;margin: auto;">
            <input type="text" id="abbr_search_id"  class="form-control" style="height:40px;text-align:right;" placeholder="جستجو">
            <span class="input-group-addon" onclick="goIntoAbbr();" type="submit" style="cursor:pointer;height: 40px; width:120px;"> <i class="fa fa-search"></i> جستجوی بر اساس اختصار</span>
        </div>
    </form>
</div>

<div style="display: flex; align-items:center; flex-wrap:wrap; justify-content: center;">
    <?php
    foreach ($subexModel as $model) {
        echo SubexWidget::widget(['model' => $model]);
    }
    ?>
</div>

<!-- side button back-->
<a data-toggle="tooltip" title="بازگشت" href="<?= Yii::$app->request->baseUrl.'/base/provinces';?>" class="side-button-div-small" style="color:white;  padding:5px; background-color: mediumvioletred; top:145px;">
    <i class="fa fa-arrow-left" style="float:right; line-height: 40px;height:40px;"></i>
</a>
<!-- side button search subscriber-->
<div data-toggle="tooltip" title="جستجوی مشترکین" onclick="searchSubInDistrict();" class="side-button-div-small" style="  padding:5px; background-color: dodgerblue; top:200px;">
    <i class="fa fa-search" style="float:right; line-height: 40px;height:40px;"></i>
<!--    <h5 style="float: right; height: 40px; line-height: 40px;margin:0; padding-right: 5px;">جستجوی مشترک</h5>-->
</div>
<!-- side button add exchange-->
<div data-toggle="tooltip" title="مرکز جدید" onclick="addNewCenter();" class="side-button-div-small" style="top:255px;background-color: olivedrab;  padding:5px;">
    <i class="fa fa-plus" style="float:right;line-height: 40px; height:40px;"></i>
<!--    <h5 style="float: right; height: 40px; line-height: 40px; margin:0;padding-right: 5px; ">افزودن مرکز</h5>-->
</div>

<?php
require_once("modals/newCenterModal.php");
require_once(Yii::$app->basePath."/views/modals/searchModal.php");
require_once(Yii::$app->basePath."/views/modals/warningModal.php");

$bPath = Yii::$app->request->baseUrl;
$districtJson = json_encode($district);
$js = <<< JS
$(document).ready(function()
{
  $('[data-toggle="tooltip"]').tooltip({'container': 'body','placement': 'bottom'});
});


function goIntoAbbr()
{
    var abbr = $("#abbr_search_id").val();
    abbr = abbr.toUpperCase();
    var comp = document.getElementById("comp-"+abbr);
    if(comp)
        {
            comp.scrollIntoView();
            window.scrollBy(0,-100);
            //$('html,body').animate({scrollTop: $(window).scrollTop() - 50 });
            $(".comp-div").css("background-color", "gainsboro");
            $("#comp-div-"+abbr).css("background-color", "#84dbff");
        }
    else
        {
            $(".comp-div").css("background-color", "gainsboro");
            
            $("#warning-title").text("خطا");
            $("#warning-body").text(" برای اختصار "+abbr+" در این منطقه موردی یافت نشد ");
            $("#warningModal").modal("show");
        }
}

function addNewCenter()
{
    var did = $districtJson.id;
    $("#newCenterDistrictId").val(did);
    $("#newCenterNameId").val("");
    $("#newCenterAbbrId").val("");
    $("#newCenterLatId").val("");
    $("#newCenterLongId").val("");
    $("#newCenterAddressId").val("");
    $("#newCenterModal").modal("show");
}

function searchSubInDistrict()
{
    $.ajax(
        {
        url: "$bPath/base/search_sub_in_district",
        type:"POST",
        data:{'districtId':$districtJson.id},
        success: function(searchHtml)
            {
                if(searchHtml == "")
                {
                    return ;
                }
                else 
                {
                    $("#searchModal-body").html(searchHtml);
                    $("#searchModal-title").html(" جستجوی مشترکین "+$districtJson.name);
                    $("#searchModal").modal("show");
                }
            }
        }
         );
}

JS;
$this->registerJs($js, Yii\web\View::POS_END);
?>