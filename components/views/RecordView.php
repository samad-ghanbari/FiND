<?php
use yii\helpers\Url;

/* @var $record */
/* @var $operations */
/* @var $choices */
/* @var $searchParams */

$headercolor = "#019dbe";
if($record['done'] == true)
    $headercolor = "darkgreen";
if($record['bitstream'] == true)
    $headercolor = "#993366";

$topicName = "";
if(!empty($record['center_abbr'])) $topicName = $record['center_abbr'];
if(!empty($record['kv_code'])) $topicName = $topicName.'-'.$record['kv_code']; else $topicName = $topicName.'-'.$record['exchange'];

$weight = 0;
if($record['project_weight'] > 0) $weight = round(100*$record['weight']/$record['project_weight'], 1);
$progressBarClass = "progress-bar progress-bar-danger progress-bar-striped "; //active
if( ($weight <= 70) && ($weight >= 50) )
    $progressBarClass = "progress-bar progress-bar-warning progress-bar-striped "; //active
else if($weight > 70)
    $progressBarClass = "progress-bar progress-bar-success progress-bar-striped "; //active

?>

<div class="hvr-border-fade box-shadow-dark"  style="border-radius:5px;direction:rtl; width:300px;height:auto;background-color:whitesmoke;position: relative;float:right; margin: 10px;">

    <div style="position: relative; top:0; background-color:<?= $headercolor; ?>;border-radius:5px; color:white; height:40px;font-size: 18px; font-weight: bold; line-height:40px;" align="center">
        <?= $topicName; ?>
    </div>

    <div class="progress" style="height: 30px; border:1px solid green; border-radius:0px; margin:0 5px;">
        <?php if($weight < 30) echo $weight. "%"; ?>
        <div class=" <?= $progressBarClass; ?> " role="progressbar"
             aria-valuenow="<?= $weight; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $weight; ?>%">
            <?php if($weight >= 30) echo $weight. "%"; ?>
        </div>
    </div>

    <div style="color:darkslateblue;padding:10px; height:200px; overflow: auto;">
        <table class="table table-hover">
            <tr>
                <td style="color:darkslategray">
                    منطقه
                </td>
                <td>
                    <?= $record['area']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    مرکز اصلی
                </td>
                <td>
                    <?= $record['center_name']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    نام سایت/مرکز
                </td>
                <td>
                    <?= $record['exchange']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    شناسه سایت
                </td>
                <td>
                    <?= $record['site_id']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    کد کافو
                </td>
                <td>
                    <?= $record['kv_code']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    فاز
                </td>
                <td>
                    <?= $record['phase']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?= $record['address']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    موقعیت جغرافیایی
                </td>
                <td>
                    <?= $record['position']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    ضریب پیشرفت
                </td>
                <td>
                    <?= $record['weight'].'/'.$record['project_weight']; ?>
                </td>
            </tr>


            <?php
            $bsExcept = Yii::$app->params['bsExcept'];
            foreach ($operations as $op)
            {
                if(in_array($op['id'],$bsExcept) && $record['bitstream'])
                {
                    continue;
                }
                else
                {
                    $value = $record[$op['operation']]['value'];
                    $value = ($value == null)? "" : $value;
                    $style = "";
                    if(str_contains($value, 'نشد') || str_contains($value, 'نکرد') || str_contains($value, 'ندارد'))
                        $style = " style='background-color: pink' ";
                    echo "<tr ".$style."><td style='color:darkslategray'>";
                    echo $op['operation'];
                    echo "</td><td>";
                    echo $value;
                    echo "</td></tr>";
                }
            }
            ?>

            <tr>
                <td style="color:darkslategray">
                    ویراستار
                </td>
                <td>
                    <?= $record['modifier']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    زمان ویرایش
                </td>
                <td>
                    <?= $record['modified_ts']; ?>
                </td>
            </tr>
            <tr>
                <td style="color:darkslategray">
                    زمان ثبت
                </td>
                <td>
                    <?= $record['register_ts']; ?>
                </td>
            </tr>
        </table>
    </div>

    <div style="position: relative; bottom: 0px;width:100%; height:30px;">
        <?php if($record['done'] == false){
            $qp='';
            foreach ($searchParams as $p=>$v)
                $qp = $qp. "&search[" . $p . ']=' . (string)$v;

            ?>
        <a href="<?= Yii::$app->request->baseUrl.'/project/view_record?eId='.$record['id'].$qp; ?>" title="نمایش و ویرایش رکورد" class="btn hvr-bounce-in" style="border-radius:50%; width:100%;"><i class="fa fa-th fa-lg text-success"></i></a>
        <?php } ?>
    </div>

</div>
