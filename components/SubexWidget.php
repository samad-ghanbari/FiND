<?php
namespace app\components;
use yii\base\Widget;

class SubexWidget extends Widget{
    public $model;
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        return $this->render("SubexView", ["model"=>$this->model]);
    }
}
?>
