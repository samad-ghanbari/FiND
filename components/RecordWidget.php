<?php
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;

class RecordWidget extends Widget
{
    public $record, $operations, $choices, $searchParams;
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        return $this->render("RecordView", ["record"=>$this->record, 'operations'=>$this->operations, 'choices'=>$this->choices, 'searchParams'=>$this->searchParams]);
    }
}
?>
