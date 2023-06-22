<?php
namespace app\components;
use yii\base\Widget;

class SaloonWidget extends Widget{
    public $model;
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        return $this->render("SaloonView", ["model"=>$this->model]);
    }
}
?>
