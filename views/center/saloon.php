<?php
/* @var $this yii\web\View */
/* @var $model \app\models\BaseViewSaloons */
/* @var  */
/* @var  */
$this->title = 'FiND|Saloon';

?>
<!--info-->
<div style="margin: 0; padding:0;background-color: #555; color:white;">
    <div style="width:100%; margin:0;padding:10px;">
        <h3 style="text-align: center; color:greenyellow; direction: rtl;"><?= "سالن ".$model['saloon_name']; ?></h3>
        <h3 style="text-align: center; color:limegreen; direction: rtl;"><?= "مرکز: ".$model['name']; ?></h3>
    </div>
    <div class="row" style="width: 100%; margin:0;">
        <div class="col-sm-2" style="padding: 10px;cursor:pointer;height:60px;line-height: 60px; ">
            <a data-toggle="tooltip" title="ویرایش/حذف سالن" onclick="editSaloon()" style="width:40px;display: block; margin: auto;"><i class=" fa fa-edit fa-2x hover-dim" style="color:greenyellow;"></i></a>
        </div>
        <div class="col-sm-10" style="margin:0;">
            <div class="row" style="width: 100%; margin:0;">
                <div class="col-sm-6 col-sm-push-6 " style="padding: 10px;height:60px;line-height: 60px;">
                    <h4 style="text-align: right;direction: rtl;"><?= "ساختمان ".$model['building_name']; ?></h4>
                </div>
                <div class="col-sm-6 col-sm-pull-6" style="padding: 10px;height:60px;line-height: 60px;">
                    <h4 style="text-align: right;direction: rtl;"><?= "طبقه "."<span style='direction:ltr; display:inline-block;'>".$model['floor_no']."</span>"; ?></h4>
                </div>
            </div>
            <div class="row" style="width: 100%; margin:0;">
                <div class="col-sm-6" style="padding: 10px;height:60px;line-height: 60px; ">
                    <h4 style="text-align: right;direction: rtl;">
                        عرض سالن به متر :
                        <?= " ".$model['saloon_width']; ?>
                    </h4>
                </div>
                <div class="col-sm-6" style="padding: 10px;height:60px;line-height: 60px; ">
                    <h4 style="text-align: right;direction: rtl;">
                        طول سالن به متر :
                        <?= " ".$model['saloon_height']; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--abbr-->
<h2 style="width:150px;height:80px; line-height: 80px;text-align:center;margin:auto;color: #84dbff;"><?= $model['saloon_abbr']; ?></h2>
<!-- saloon -->
<div style="display:flex; width:100%;margin: 10px; padding:10px;background-color: #555;">
<!--    floor plan -->
    <div id="saloon-fp" style="flex: 1 1 auto; overflow: auto; margin:5px;">
    <div style="border:1px solid #fff; width: <?= $model['saloon_width']*100+10;?>px; height:<?= $model['saloon_height']*100+10; ?>px; background-color: #333; position: relative; " >
    <!--    saloon inside -->
<!--    --><?//= app\components\ObjectGenerator::space("baseRoom","اتاف دیتا", 1010,510,"#fff",4,0,0,0); ?>
    <?= app\components\ObjectGenerator::doubleDoor("door","درب ورودی", 100,50,"#fff",2,300,-20,90); ?>
    <?= app\components\ObjectGenerator::wall("wa1","partition1",500,10,"#fff",3,"#fff",200,0,0 ); ?>
    <?= app\components\ObjectGenerator::wall("wa2","partition2",200,10,"#fff",3,"#fff",5,400,90 ); ?>
    <?= app\components\ObjectGenerator::unEvenDoor("door2","درب ورودی", 100,50,"#fff",2,130,470,90); ?>
        <?= app\components\ObjectGenerator::text("obj123","samad ghan", "#f00", 16, "#0ff", "#5f9", 10, 5, 100, 100,0); ?>
<!---->
<!--    --><?//= \app\components\ObjectGenerator::rect("rack1", "rack",50,50,"#fff",2,false,"none","none",300,600,0); ?>
    <?= \app\components\ObjectGenerator::rect("rack2", "rack2",50,50,"#fff",2,false,"none","none",300,550,0); ?>
    <?= \app\components\ObjectGenerator::rect("rack2", "rack2",50,50,"#fff",2,false,"none","none",300,500,0); ?>
    <?= \app\components\ObjectGenerator::vDim("d", "dimension",50,50,"#fff",2,"50cm", 12,false,300,450,0,false); ?>

    </div>
    </div>
    <!-- saloon toolbar  -->
    <div id="saloon-toolbar" style=" flex:0 0 64px;border:1px solid #aaa;background-color:#333; height:<?= $model['saloon_height']*100+10; ?>px;overflow: auto;margin:5px; ">
        <button saloon-id="<?= $model['id']; ?>" title="Rearrange Saloon" edit-toggle="0" style="border:none; width:60px;display:block; margin:auto;height:32px;background-color:transparent;border-radius:2px;" onclick="rearrangeSaloon(this)"><i id="toggle-btn" class="fa fa-toggle-off fa-lg" style="color:#fff;" ></i> </button>
        <!-- objects -->
        <div id="toolbars" style="height: 50%;width:100%; position: relative; display: none;">
            <hr style="border:1px dotted gray;" />
            <button id="fp-object-move-btn" title="Move Saloon Object" move-toggle="0" style="border:none; width:60px;float: left;height:32px;background-color:transparent;border-radius:2px;" onclick="moveSaloonObject(this)"><i id="move-toggle-btn" class="fa fa-toggle-off fa-lg" style="color:#fff;" ></i> جابجایی </button>
            <button id="fp-object-resize-btn" title="resize Saloon Object" resize-toggle="0" style="border:none; width:60px;float: right;height:32px;background-color:transparent;border-radius:2px;" onclick="resizeSaloonObject(this)"><i id="resize-toggle-btn" class="fa fa-toggle-off fa-lg" style="color:#fff;" ></i> اندازه </button>
            <br style="clear: both;" />
            <br />
            <?= \app\components\ObjectGenerator::getObjects(); ?>
        </div>
    </div>
    <br style="clear:both;">
</div>
<br />
<!-- side button back-->
<a data-toggle="tooltip" title="بازگشت" href="<?= Yii::$app->request->baseUrl.'/center/index';?>" class="side-button-div-small" style="color:white;  padding:5px; background-color: mediumvioletred; top:145px;">
    <i class="fa fa-arrow-left" style="float:right; line-height: 40px;height:40px;"></i>
</a>

<?php
require_once("modals/editSaloonModal.php");

$bPath = Yii::$app->request->baseUrl;
$modelJson = json_encode($model);

$js = <<< JS

$(document).ready(function()
{
  $('[data-toggle="tooltip"]').tooltip({'container': 'body','placement': 'bottom'});
});

function editSaloon()
{
    $("#modalEdRemSaloonId").val($modelJson.id);
    $("#modalEdRemSaloonBuilding").val($modelJson.building_name);
    $("#modalEdRemSaloonCenter").val($modelJson.name);
    $("#modalEdRemSaloonFloor").val($modelJson.floor_no);
    $("#modalEdRemSaloonName").val($modelJson.saloon_name);
    $("#modalEdRemSaloonApChar").val($modelJson.append_char);
    $("#modalEdRemSaloonWidth").val($modelJson.saloon_width);
    $("#modalEdRemSaloonHeight").val($modelJson.saloon_height);    
    $("#editSaloonModal").modal("show");
}

function rearrangeSaloon(obj)
{
    var saloonId = $(obj).attr("saloon-id"); 
    var editToggle = $(obj).attr("edit-toggle");
    
    $("#move-toggle-btn").removeClass("fa-toggle-on");
    $("#move-toggle-btn").addClass("fa-toggle-off");
    $("#resize-toggle-btn").removeClass("fa-toggle-on");
    $("#resize-toggle-btn").addClass("fa-toggle-off");
    $(".fp-object-move-handler").css("display", "none");
    $(".fp-object-resize-handler").css("display", "none");
    $("#move-toggle-btn").css("color","#fff");
    $("#resize-toggle-btn").css("color","#fff");
    $("#fp-object-move-btn").attr("move-toggle", 0);
    $("#fp-object-resize-btn").attr("resize-toggle", 0);
    
    if(editToggle == 1)
    {
        $("#toggle-btn").removeClass("fa-toggle-on");
        $("#toggle-btn").addClass("fa-toggle-off");
        $("#toggle-btn").css("color","#fff");
        $("#saloon-toolbar").css("flex","0 0 60px");
        $("#toolbars").css("display","none");
        $(obj).attr("edit-toggle", 0);
    }
    else 
    {
        $("#toggle-btn").removeClass("fa-toggle-off");
        $("#toggle-btn").addClass("fa-toggle-on");
        $("#toggle-btn").css("color","greenyellow");
        $(obj).attr("edit-toggle", 1);
        $("#saloon-toolbar").css("flex","0 0 200px");
        $("#toolbars").css("display","block");
    }
    
}
function moveSaloonObject(obj)
{
    var moveToggle = $(obj).attr("move-toggle");
    
    if(moveToggle == 1)
    { //must set off
        $("#move-toggle-btn").removeClass("fa-toggle-on");
        $("#move-toggle-btn").addClass("fa-toggle-off");
        $("#move-toggle-btn").css("color","#fff");
        $(obj).attr("move-toggle", 0);
        $(".fp-object-move-handler").css("display", "none");
    }
    else 
    {
        //must set on
        $("#move-toggle-btn").removeClass("fa-toggle-off");
        $("#move-toggle-btn").addClass("fa-toggle-on");
        $("#move-toggle-btn").css("color","greenyellow");
        $(obj).attr("move-toggle", 1);
        $(".fp-object-move-handler").css("display", "block");
    }
    
}
function resizeSaloonObject(obj)
{
    var resizeToggle = $(obj).attr("resize-toggle");
    
    if(resizeToggle == 1)
    { //must set off
        $("#resize-toggle-btn").removeClass("fa-toggle-on");
        $("#resize-toggle-btn").addClass("fa-toggle-off");
        $("#resize-toggle-btn").css("color","#fff");
        $(obj).attr("resize-toggle", 0);
        $(".fp-object-resize-handler").css("display", "none");
    }
    else 
    {
        //must set on
        $("#resize-toggle-btn").removeClass("fa-toggle-off");
        $("#resize-toggle-btn").addClass("fa-toggle-on");
        $("#resize-toggle-btn").css("color","greenyellow");
        $(obj).attr("resize-toggle", 1);
        $(".fp-object-resize-handler").css("display", "block");
    } 
}

//drag
function dragObject(obj)
{
    var obj = $(obj).parent();
    dragElement(obj[0]);
}
function dragObjectDone(obj)
{
    document.onmouseup = null;
    document.onmousemove = null;
    document.onmousedown = null;
    var obj = $(obj).parent()[0];
    // save the element's new position:
    var top = obj.offsetTop;
    var left = obj.offsetLeft;

    $.ajax(
        {
        url: "$bPath/center/rearrange_object",
        type:"POST",
        data:{'id':1, 'top':top, 'left':left},

        success: function(ok)
            {
            if(ok == false)
                alert("Cannot save the new position of the object.");
            }
        }
    );
}
function dragElement(elmnt)
{
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  elmnt.onmousedown = dragMouseDown;
  elmnt.onmouseup = closeDragElement;
  
  function dragMouseDown(e) 
  {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) 
  {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() 
  {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;    
    elmnt = null;
  }

}

//resize
//h
function resieObjectH(obj)
{
    var obj = $(obj).parent();
    resizeHElement(obj[0]);
}
function resizeHElement(elmnt)
{
}
function resizeObjectHDone(obj)
{
}
//v
function resieObjectV(obj)
{
}
function resizeObjectVDone(obj)
{
}


JS;
$this->registerJs($js, Yii\web\View::POS_END);
?>