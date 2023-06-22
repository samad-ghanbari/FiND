<?php
/* @var $province_name string */
/* @var $province_id integer */
/* @var $user \app\models\BaseUsers */

$this->title = 'FiND|Province';
use yii\helpers\Html;

?>
    <img src="<?= Yii::$app->request->baseUrl.'/web/images/text.png'; ?>" style="display: block; margin:auto; width:100%; max-width:400px;">
<br />
<hr >
<br />
<div class="row" style="width:100%; padding:5px; ">
    <!--display:flex; align-items:center; justify-content:center; -->
    <div class="col col-md-6">
        <!-- province name -->
        <h4 id="province-name" class="text-white" style="text-align: center; "><?= $province_name; ?> </h4>
        <!-- province map -->
        <div id="province-div">
            <?php require("provinces_map/province-" . $province_id . ".php"); ?>
        </div>
    </div>

    <div class="col col-md-6">
        <!-- iran map -->
        <?php require("provinces_map/iran_map.php"); ?>
    </div>
</div>

<?php
$script =<<< JS

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({'container': 'body','placement': 'bottom'});
});

JS;
$this->registerJs($script, Yii\web\View::POS_END);
?>