<?php

namespace app\components;
use Yii;
use yii\base\Component;
use yii\debug\panels\EventPanel;

//top
//5
//50
//95
//140
//185
//230
//275
//320
//365
//410
//455
//500
//545
//590
//635
//680

class ObjectGenerator extends Component
{
    const TOPHEADER = "<div style='background-color:BCOLOR;padding:0; margin:0;padding:0;border:none;width:WIDTH_PARAMpx; height:HEIGHT_PARAMpx; position: absolute; top: TOP_PARAMpx; left: LEFT_PARAMpx; transform: rotate(DEGREE_PARAMdeg);'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1'  id='ID_PARAM' width='WIDTH_PARAMpx' height='HEIGHT_PARAMpx' class='fp-object'  viewBox='VIEW_START VIEW_START VIEW_WIDTH VIEW_HEIGHT'>
                            <title>OBJECT_TITLE</title>";
    const BOTTOMTRAILER = "</svg>
                           <i class='fp-object-move-handler fa fa-arrows-alt'  onmousedown='dragObject(this)' onmouseup='dragObjectDone(this)' style='display:none;z-index:100;cursor:move; width:16px; height:16px; color:mediumvioletred; background-color:#eee;position: absolute; top:MOVE_TOP_PARAMpx; left:MOVE_LEFT_PARAMpx;'></i>
                           <i class='fp-object-resize-handler fa fa-arrows-alt-h' onmousedown='resizeObjectH(this)' onmouseup='resizeObjectHDone(this)' style='display:none;cursor:grabbing; width:16px; height:16px; color:springgreen; position: absolute; top:RESIZE_H_TOP_PARAMpx; left:RESIZE_H_LEFT_PARAMpx; '></i>
                           <i class='fp-object-resize-handler fa fa-arrows-alt-v' onmousedown='resizeObjectV(this)' onmouseup='resizeObjectVDone(this)' style='display:none;cursor:grabbing; width:16px; height:16px; color:mediumvioletred;position: absolute; top:RESIZE_V_TOP_PARAMpx; left:RESIZE_V_LEFT_PARAMpx; '></i>
                           </div>";

    public static function getObjects()
    {
        //width of 200px; each row 3 object obsolutely positioned

        //text
        $doc = "<div class='panel-group' id='toolbar-accordion'>

                <div class='panel panel-default'>
                  <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarText'>
                    <div class='panel-heading' style='background-color:  #333;color:#fff;' >
                        <h4 class='panel-title text-right'  >
                            متن
                        </h4>
                    </div>
                  </a>
                    <div id='toolbarText' class='panel-collapse collapse'>
                        <div class='panel-body' style='position: relative; height:50px;'>";
        //icons
        $doc = $doc.self::text("textObject","متن","#000",14,"#eee","yellowgreen",2,0,10,80,0 );
        $doc = $doc."</div></div></div>";

        //shapes
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarShapes'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                اشکال
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarShapes' class='panel-collapse collapse'>
                        <div class='panel-body' style='height:730px; position:relative;'>";
        //icons
        //5
        $doc = $doc.self::rect("rectObject", "Rectangle", 50,40,"#000", 2,false,"#ddd","none",5,5,0);
        $doc = $doc.self::rect("dashedRectObject", "Dashed Rectangle", 50,40,"#000", 2,true,"#ddd","none",5,60,0);
        $doc = $doc.self::rectHalved("halvedRectObject", "Halved Rectangle", 50,40,"#000", 2,false,"#ddd","none",5,115,0);
        //50
        $doc = $doc.self::rectHalved("dahsedHalvedRectObject", "Dashed Halved Rectangle", 50,40,"#000", 2,true,"#ddd","none",50,5,0);
        $doc = $doc.self::rectPlus("plusRectObject", "Plus Rectangle", 50,40,"#000", 2,false,"#ddd","none",50,60,0);
        $doc = $doc.self::rectPlus("dashedplusRectObject", "Dahsed Plus Rectangle", 50,40,"#000", 2,true,"#ddd","none",50,115,0);
        // 95
        $doc = $doc.self::rectCrossed("crossedRectObject", "crossed Rectangle", 50,40,"#000", 2,false,"#ddd","none",95,5,0);
        $doc = $doc.self::rectCrossed("dashedCrossedRectObject", "dashed crossed Rectangle", 50,40,"#000", 2,true,"#ddd","none",95,60,0);
        // top 140
        $doc = $doc.self::ellipse("ellipseObject", "Ellipse", 50,40,"#000", 2,false,"#ddd","none",140,5,0);
        $doc = $doc.self::ellipse("dashedEllipseObject", "dashed ellipse", 50,40,"#000", 2,true,"#ddd","none",140,60,0);
        $doc = $doc.self::ellipseHalved("halvedEllipseObject", "halved Ellipse", 50,40,"#000", 2,false,"#ddd","none",140,115,0);
        //185
        $doc = $doc.self::ellipseHalved("dashedHalvedEllipseObject", "dashed halved Ellipse", 50,40,"#000", 2,true,"#ddd","none",185,5,0);
        $doc = $doc.self::ellipsePlus("plusEllipseObject", "plus Ellipse", 50,40,"#000", 2,false,"#ddd","none",185,60,0);
        $doc = $doc.self::ellipsePlus("dashedPlusEllipseObject", "dashed plus Ellipse", 50,40,"#000", 2,true,"#ddd","none",185,115,0);

        //230
        $doc = $doc.self::ellipseCrossed("crossedEllipseObject", "crossed Ellipse", 50,40,"#000", 2,false,"#ddd","none",230,5,0);
        $doc = $doc.self::ellipseCrossed("dashedcrossedObject", "dashed crossed Ellipse", 50,40,"#000", 2,true,"#ddd","none",230,60,0);

        //275
        $doc = $doc.self::triangle("triangleObject", "triangle", 50,40,"#000", 2,false,"#ddd","none",275,5,0);
        $doc = $doc.self::triangle("dashedTriangleObject", "dashed triangle", 50,40,"#000", 2,true,"#ddd","none",275,60,0);
        $doc = $doc.self::triangle90("triangle90Object", "triangle 90", 50,40,"#000", 2,false,"#ddd","none",275,115,0);
        //320
        $doc = $doc.self::triangle90("dashedTriangle90Object", "dashed triangle90", 50,40,"#000", 2,true,"#ddd","none",320,5,0);
        $doc = $doc.self::triangleB2B("triangleB2BObject", "triangle B2B", 50,40,"#000", 2,false,"#ddd","none",320,60,0);
        $doc = $doc.self::triangleB2B("dashedTriangleB2BObject", "dashed triangle B2B", 50,40,"#000", 2,true,"#ddd","none",320,115,0);

        //365
        $doc = $doc.self::triangleH2H("triangleH2HObject", "Triangle H2H", 50,40,"#000", 2,false,"#ddd","none",365,5,0);
        $doc = $doc.self::triangleH2H("dashedTriangleH2HObject", "dashed Triangle H2H", 50,40,"#000", 2,true,"#ddd","none",365,60,0);

        //410
        $doc = $doc.self::parallelogram("parallelogramObject", "parallelogram", 50,40,"#000", 2,false,"#ddd","none",410,5,0);
        $doc = $doc.self::parallelogram("dashedParallelogramObject", "dashed parallelogram", 50,40,"#000", 2,true,"#ddd","none",410,60,0);
        $doc = $doc.self::parallelogramHalved("parallelogramHalvedObject", "parallelogram Halved", 50,40,"#000", 2,false,"#ddd","none",410,115,0);
        //455
        $doc = $doc.self::parallelogramHalved("dashedParallelogramHalvedObject", "dashed parallelogram Halved", 50,40,"#000", 2,true,"#ddd","none",455,5,0);
        $doc = $doc.self::parallelogramCrossed("parallelogramCrossedObject", "parallelogram Crossed", 50,40,"#000", 2,false,"#ddd","none",455,60,0);
        $doc = $doc.self::parallelogramCrossed("dashedParallelogramCrossedObject", "dashed parallelogram Crossed", 50,40,"#000", 2,true,"#ddd","none",455,115,0);

        //500
        $doc = $doc.self::star("starObject", "star", 50,40,"#000", 2,false,"#ddd","none",500,5,0);
        $doc = $doc.self::star("dashedStarObject", "dashed Star", 50,40,"#000", 2,true,"#ddd","none",500,60,0);
        $doc = $doc.self::squareStar("squareStarObject", "square Star", 50,40,"#000", 2,false,"#ddd","none",500,115,0);
        //545
        $doc = $doc.self::squareStar("dashedSquareStarObject", "dashed square Star", 50,40,"#000", 2,true,"#ddd","none",545,5,0);
        $doc = $doc.self::plus("plusObject", "Plus", 50,40,"#000", 2,false,"#ddd","none",545,60,0);
        $doc = $doc.self::plus("dashedPlusObject", "dashed plus", 50,40,"#000", 2,true,"#ddd","none",545,115,0);
        //590
        $doc = $doc.self::minus("minusObject", "minus", 50,40,"#000", 2,true,"#ddd","none",590,5,0);
        $doc = $doc.self::minus("dashedMinusObject", "dashed minus", 50,40,"#000", 2,false,"#ddd","none",590,60,0);
        $doc = $doc.self::cross("crossObject", "cross", 50,40,"#000", 2,false,"#ddd","none",590,115,0);
        //635
        $doc = $doc.self::cross("dashedCrossObject", "dashed cross", 50,40,"#000", 2,true,"#ddd","none",635,5,0);
        $doc = $doc.self::slash("slashObject", "slash", 50,40,"#000", 2,false,"#ddd","none",635,60,0);
        $doc = $doc.self::slash("dashedSlashObject", "dashed slash", 50,40,"#000", 2,true,"#ddd","none",635,115,0);
        //680
        $doc = $doc.self::backSlash("backSlashObject", "slash", 50,40,"#000", 2,false,"#ddd","none",680,5,0);
        $doc = $doc.self::backSlash("dashedBackSlashObject", "dashed backslash", 50,40,"#000", 2,true,"#ddd","none",680,60,0);


        $doc = $doc."</div></div></div>";

        //lines and arrows
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarArrows'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                خطوط
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarArrows' class='panel-collapse collapse'>
                        <div class='panel-body' style='position: relative; height:290px;'>";
        //icons

        //5
        $doc = $doc.self::line("lineObject", "line", 50,10,"#000", false,5,5,0);
        $doc = $doc.self::line("lineObject", "dashed line", 50,10,"#000", true,5,60,0);
        $doc = $doc.self::arrow("arrowObject", "arrow", 50,10,"#000", false,5,115,0,true);
        //50
        $doc = $doc.self::arrow("dashedArrowObject", "dashed arrow", 50,10,"#000", true,50,5,0, true);
        $doc = $doc.self::arrow2Way("arrow2WayObject", "arrow 2Way", 50,10,"#000", false,50,60,0);
        $doc = $doc.self::arrow2Way("dashedArrow2WayObject", "dashed arrow 2Way", 50,10,"#000", true,50,115,0);
        //95
        $doc = $doc.self::arrowThick("arrowThickObject", "arrow Thick", 50,10,"#000", 2,false,"#ddd",95,5,0, true);
        $doc = $doc.self::arrowThick("dashedArrowThickObject", "dashed arrow Thick", 50,15,"#000", 2,false,"#ddd",95,60,0, true);
        $doc = $doc.self::arrowThick2Way("arrowThick2WayObject", "arrow Thick 2Way", 50,15,"#000", 2,false,"#ddd",95,115,0);
        //140
        $doc = $doc.self::arrowThick2Way("dashedArrowThick2WayObject", "dashed arrow Thick 2Way", 50,15,"#000", 2,true,"#ddd",140,5,0);
        //185
        $doc = $doc.self::vDim("vDimObject", "vDim", 30,40,"#000", 2,"",14,false,185,5,0);
        $doc = $doc.self::vDim("dashedVDimObject", "dashed vDim", 30,40,"#000", 2,"",14,true,185,60,0);
        //230
        $doc = $doc.self::hDim("hDimObject", "hDim", 50,30,"#000", 2,"",14,false,240,5,0);
        $doc = $doc.self::hDim("dashedHDimObject", "dashed hDim", 50,30,"#000", 2,"",14,true,240,60,0);

        $doc = $doc."</div></div></div>";

        //door
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarDoor'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                درب‌
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarDoor' class='panel-collapse collapse'>
                        <div class='panel-body' style='position: relative; height:250px;'>";
        //icons
        //5
        $doc = $doc.self::singleDoor("singleDoorObject", "single Door", 70,40,"#000", 2,5,5,0);
        $doc = $doc.self::doubleDoor("doubleDoorObject", "double Door", 70,40,"#000", 2,5,90,0);
        //60
        $doc = $doc.self::bifoldDoor("bifoldDoorObject", "bifoldDoor", 70,40,"#000", 2,60,5,0);
        $doc = $doc.self::slidingDoor("slidingDoorObject", "sliding Door", 70,30,"#000", 2,60,90,0);
        //110
        $doc = $doc.self::foldDoor("foldDoorObject", "fold Door", 70,40,"#000", 2,110,5,0);
        $doc = $doc.self::unEvenDoor("unEvenDoorObject", "unEven Door", 70,40,"#000", 2,110,90,0,true);
        //140
        $doc = $doc.self::opposingDoor("opposingDoorObject", "opposing Door", 70,40,"#000", false,160,5,0);
        $doc = $doc.self::revolvingDoor("revolvingDoorObject", "revolving Door", 70,"#000", 2,160,90,0);

        $doc = $doc."</div></div></div>";

        //windows
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarWindow'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                پنجره
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarWindow' class='panel-collapse collapse'>
                        <div class='panel-body' style='position:relative; height:120px;'>";
        //icons
        //5
        $doc = $doc.self::window("windowObject", "window", 70,40,"#000", 2,5,5,0);
        $doc = $doc.self::doubleWindow("doubleWindowObject", "double Window", 70,40,"#000", 2,5,90,0);
        //60
        $doc = $doc.self::gliderWindow("gliderWindowObject", "glider Window", 70,40,"#000", 2,60,5,0);

        $doc = $doc."</div></div></div>";

        //walls
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarWall'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                دیوار
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarWall' class='panel-collapse collapse'>
                        <div class='panel-body' style='position:relative; height:150px;'>";
        //icons
        //5
        $doc = $doc.self::wall("wallObject", "wall", 70,20,"#000", 2,"#ddd",5,5,0);
        $doc = $doc.self::lWall("lWallObject", "l Wall", 70,40,15, 15,"#000",2,"#ddd",5,90,0,true,true);
        //60
        $doc = $doc.self::uWallUD("uWallUDObject", "u Wall UD", 70,40,15,15,15,15,15,"#000", 2,"#ddd",60,5,0);
        $doc = $doc.self::uWallLR("uWallLRObject", "u Wall LR", 70,40,10,10,10,10,10,"#000", 2,"#ddd",60,90,0);

        $doc = $doc."</div></div></div>";

        //spaces
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarSpace'>
                            <div class='panel-heading' style='background-color:  #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                فضا
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarSpace' class='panel-collapse collapse'>
                        <div class='panel-body' style='position:relative; height:120px;'>";
        //icons
        //5
        $doc = $doc.self::space("spaceObject", "space", 70,40,"#000", 2,5,5,0);
        $doc = $doc.self::lSpace("lSpaceObject", "L Space", 70,40,20, 15,"#000",2,5,90,0);
        //60
        $doc = $doc.self::tSpace("tSpaceObject", "T Space", 70,40,20,20,15,15,"#000", 2,60,5,0);

        $doc = $doc."</div></div></div>";

        //staires
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarStair'>
                            <div class='panel-heading' style='background-color: #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                پله
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarStair' class='panel-collapse collapse'>
                        <div class='panel-body' style='position:relative; height:100px; '>";
        //icons
        $doc = $doc.self::stairs("stairsObject", "stairs", 50,80,5,"#000", 2,5,75,0);

        $doc = $doc."</div></div></div>";

        //network
        $doc = $doc."<div class='panel panel-default'>
                        <a data-toggle='collapse' data-parent='#toolbar-accordion' href='#toolbarNet'>
                            <div class='panel-heading' style='background-color: #333;color:#fff;'>
                                <h4 class='panel-title text-right'>
                                شبکه
                                </h4>
                            </div>
                        </a>
                    <div id='toolbarNet' class='panel-collapse collapse'>
                        <div class='panel-body' style='position: relative; height:500px;'>";
        //icons
        //5
        $doc = $doc.self::router("routerObject", "router", 60,60,"#000", "#fff",2,2,"#888",5,5,0);
        $doc = $doc.self::switchL2("switchL2Object", "switch L2", 60,60,"#000", "#fff",2,2,"#888",5,90,0);
        //80
        $doc = $doc.self::switchL3("switchL3Object", "switch L3", 60,60,"#000", "#fff",2,2,"#888",80,5,0);
        $doc = $doc.self::link("linkObject", 90,100,150,100,"#000",2);
        //145
        $doc = $doc.self::cloud("cloudObject", "cloud", 70,40,"#000", 2,"#888","cloud","#fff",10,155,5,0);
        $doc = $doc.self::server("serverObject", "server", 50,40,"#000", 2,"#888",155,90,0);
        //190
        $doc = $doc.self::computer("computerObject", "computer", 70,40,"#000", 2,"#888",210,5,0);
        $doc = $doc.self::dslam("dslamObject", "dslam", 60,60,"#000", 1,"#888",210,90,0);

        $doc = $doc."</div></div></div></div>";

        return $doc;

    }

    //text
    public static function text($id,$text, $color, $fontSize, $backColor, $borderColor, $padding, $radius, $top, $left,$rotation)
    {
          //$param = json_decode($jsonParam,true); return var_dump($param["id"]);
          //$id,$text, $color, $fontSize, $backColor, $borderColor, $padding, $radius, $top, $left,$rotation
//        $id = $param['id'];
//        $text = $param['text'];
//        $color = $param['color'];
//        $fontSize = $param['fontSize'];
//        $backColor = $param['backColor'];
//        $borderColor = $param['borderColor'];
//        $padding = $param['padding'];
//        $radius = $param['radius'];
//        $top = $param['top'];
//        $left = $param['left'];
//        $rotation = $param['rotation'];

        $padding = $padding."px";
        $fontSize = $fontSize."px";
        $left = $left."px";
        $top = $top."px";
        $radius = $radius."px";
        $rotation = $rotation."deg";
        if(!empty($borderColor))
            $border = "border:1px solid $borderColor";

        $doc = "<div id='$id' style='font-size: $fontSize;padding:$padding;border-radius: $radius; color:$color; background-color: $backColor; $border ; position: absolute; top:$top; left:$left; transform: rotate($rotation); '>";
        $doc = $doc."<i class='fp-object-move-handler fa fa-arrows-alt' onmousedown='dragObject(this)' onmouseup='dragObjectDone(this)' style='display:none;z-index:100;cursor:move; width:16px; height:16px; color:mediumvioletred; background-color:#eee;position: absolute; top:0px; left:0px;'></i>";

        $doc = $doc."<span>$text</span></div>";

        return $doc;
    }
    //rect
    public static function rect($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", ceil(-1*$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        if($dash)
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function rectCrossed($id, $title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        if($dash)
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<path d='M 0 0 L $width $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";
        $doc = $doc."<path d='M 0 $height L $width 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function rectPlus($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        if($dash)
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $width2 = $width/2;
        $height2= $height/2;
        $doc = $doc."<path d='M $width2 0 L $width2 $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";
        $doc = $doc."<path d='M 0 $height2 L $width $height2' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function rectHalved($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        if($dash)
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<path d='M 0 0 L $width $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //circle
    public static function ellipse($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        if($dash)
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function ellipseHalved($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        if($dash)
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $width2 = $width /2;
        $doc = $doc."<path d='M $width2 0 L $width2 $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function ellipseCrossed($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        if($dash)
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $x1 = $cx - $width/4;
        $x2 = $cx + $width/4;
        $y1 = self::getEllipseY($cx, $cy,$rx, $ry, $x1);
        $y2 = self::getEllipseY($cx, $cy,$rx, $ry, $x2);
        $y1H = $y1[0];
        $y1L = $y1[1];
        if($y1[1] < $y1[0]){ $y1H = $y1[1]; $y1L = $y1[0]; }
        $y2H = $y2[0];
        $y2L = $y2[1];
        if($y2[1] < $y2[0]){ $y2H = $y2[1]; $y2L = $y2[0]; }

        $doc = $doc."<path d='M $x1 $y1H L $x2 $y2L' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";
        $doc = $doc."<path d='M $x1 $y1L L $x2 $y2H' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function ellipsePlus($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        if($dash)
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5' />";
        else
            $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $width2 = $width/2;
        $height2= $height/2;
        $doc = $doc."<path d='M $width2 0 L $width2 $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";
        $doc = $doc."<path d='M 0 $height2 L $width $height2' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    private static function getEllipseY($cx, $cy, $rx, $ry, $x)
    {
        $y1 = $cy + ($ry/$rx) * sqrt(pow($rx, 2) - pow(($x - $cx),2 ));
        $y2 = $cy - ($ry/$rx) * sqrt(pow($rx, 2) - pow(($x - $cx),2 ));

        return [$y1, $y2];
    }
    //triangle
    public static function triangle($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        $width2 = $width/2;
        if($dash)
            $doc = $doc."<polygon points='$width2,0 0,$height $width,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$width2,0 0,$height $width,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function triangleH2H($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        //head to head
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        $width2 = $width/2;
        $height2 = $height/2;
        if($dash)
        {
            $doc = $doc . "<polygon points='0,0 $width,0 $width2,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
            $doc = $doc . "<polygon points='0,$height $width, $height $width2,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        }
        else
        {
            $doc = $doc . "<polygon points='0,0 $width,0 $width2,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
            $doc = $doc . "<polygon points='0,$height $width, $height $width2,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
        }
        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function triangleB2B($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    { //back to back
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        $width2 = $width/2;
        $height2 = $height/2;
        if($dash)
        {
            $doc = $doc . "<polygon points='$width2,0 0,$height2 $width,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
            $doc = $doc . "<polygon points='$width2,$height 0,$height2 $width,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        }
        else
        {
            $doc = $doc . "<polygon points='$width2,0 0,$height2 $width,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
            $doc = $doc . "<polygon points='$width2,$height 0,$height2 $width,$height2' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";
        }
        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function triangle90($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    { //back to back
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        if($dash)
        {
            $doc = $doc . "<polygon points='0,0 0,$height $width,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        }
        else
        {
            $doc = $doc . "<polygon points='0,0 0,$height $width,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
        }
        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //parallelogram
    public static function parallelogram($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$offset=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if(($offset >= $width) || ($offset < 0))
        {
            $offset = $width/4;
        }

        $widthOff = $width - $offset;


        if($dash)
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function parallelogramCrossed($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$offset=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if(($offset >= $width) || ($offset < 0))
        {
            $offset = $width/4;
        }

        $widthOff = $width - $offset;


        if($dash)
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<path d='M $offset 0 L $widthOff $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";
        $doc = $doc."<path d='M 0 $height L $width 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function parallelogramHalved($id, $title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$offset=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if(($offset >= $width) || ($offset < 0))
        {
            $offset = $width/4;
        }

        $widthOff = $width - $offset;


        if($dash)
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$offset,0 $width,0 $widthOff,$height 0,$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<path d='M $offset 0 L $widthOff $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //star
    public static function star($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $w4 =$width/4;
        $w2 =$width/2;
        $w34 = 3*$width/4;

        $h4 = $height/4;
        $h2 = $height/2;
        $h34 = 3*$height/4;

        $points = "0,0 $w2,$h4 $width,0 $w34,$h2 $width,$height $w2,$h34 0,$height $w4,$h2";
        if ($dash)
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 2'/>";
        else
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function squareStar($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $w6 =$width/6;
        $w26 =$width/3;
        $w36 = $width/2;
        $w46 = 2*$width/3;
        $w56 = 5*$width/6;

        $h6 = $height/6;
        $h26 = $height/3;
        $h36 = $height/2;
        $h46 = 2*$height/3;
        $h56 = 5*$height/6;

        $points = "0,0 $w26,$h6 $w36,0 $w46,$h6 $width,0 $w56,$h26 $width,$h36 $w56,$h46 $width,$height $w46,$h56 $w36,$height $w26,$h56 0,$height $w6,$h46, 0,$h36 $w6,$h26";
        if ($dash)
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 2'/>";
        else
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //plus minus cross slash backslash
    public static function plus($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$vHeight=-1, $hHeight=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if(($vHeight > $width) || ($vHeight < 0)) $vHeight = $width/4;
        if(($hHeight > $height) || ($hHeight < 0)) $hHeight = $height/4;
        $wo = ($width - $vHeight)/2;// widthOffset
        $ho = ($height - $hHeight)/2; // height offset
        $woH = $wo + $vHeight;
        $hoH = $ho + $hHeight;
        if($dash)
            $doc = $doc."<polygon points='$wo,0 $wo,$ho 0,$ho 0,$hoH $wo,$hoH $wo,$height $woH,$height $woH,$hoH $width,$hoH $width,$ho $woH,$ho $woH,0 ' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$wo,0 $wo,$ho 0,$ho 0,$hoH $wo,$hoH $wo,$height $woH,$height $woH,$hoH $width,$hoH $width,$ho $woH,$ho $woH,0 ' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function minus($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$mHeight=-1, $isHorizontal=true)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if($isHorizontal)
        {
            // -
            if(($mHeight > $height) || ($mHeight < 0)) $mHeight = $height/4;
            $ho = ($height - $mHeight)/2; // height offset
            $hoH = $ho + $mHeight;

            if($dash)
                $doc = $doc."<polygon points='0,$ho 0,$hoH $width,$hoH $width,$ho' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
            else
                $doc = $doc."<polygon points='0,$ho 0,$hoH $width,$hoH $width,$ho' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        }
        else
        {
            //vertical  |
            if(($mHeight > $width) || ($mHeight < 0)) $mHeight = $width/4;
            $wo = ($width - $mHeight)/2;// widthOffset
            $woH = $wo + $mHeight;

            if($dash)
                $doc = $doc."<polygon points='$wo,0 $wo,$height $woH,$height $woH,0 ' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
            else
                $doc = $doc."<polygon points='$wo,0 $wo,$height $woH,$height $woH,0 ' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        }


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function cross($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$sHeight=-1, $bHeight=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        // slash height offset s
        //backslash height offset b
        if(($sHeight >= $width) || ($sHeight > $height) || ( $sHeight < 0))
            $sHeight = $width/4;
        if(($bHeight >= $width) || ($bHeight > $height) || ( $bHeight < 0))
            $bHeight = $width/4;

        $b = $bHeight/sqrt(2);
        $s = $sHeight/sqrt(2);
        $bWo = $width - $b;
        $bHo = $height - $b;
        $sWo = $width - $s;
        $sHo = $height - $s;

        //points: Top Left Right Bottom
        //Top
        $tx = -$sWo - $b*($bHo*$sWo)/($bWo*$sHo);
        $temp = ( -$bHo*$sWo )/( $bWo*$sHo ) - 1;
        $tx = $tx/$temp;
        $ty = ($sHo)/($sWo) *($sWo - $tx);
        //Right
        $rx = $b*$bHo/$bWo + $width*$sHo/$sWo + $s;
        $temp = $sHo/$sWo + $bHo/$bWo;
        $rx = $rx/$temp;
        $ry = ($bHo)/($bWo) *($rx - $b);
        //Left
        $lx = $sHo - $b;
        $temp = $bHo/$bWo + $sHo/$sWo;
        $lx = $lx/$temp;
        $ly = $bHo/$bWo * $lx + $b;
        //Bottom
        $bx = $s + $width*$sHo/$sWo - $b;
        $temp = $bHo/$bWo + $sHo/$sWo;
        $bx = $bx/$temp;
        $by = $bHo/$bWo * $bx +$b;

        if($dash)
            $doc = $doc."<polygon points='$b,0 $tx,$ty $sWo,0 $width,$s $rx,$ry $width,$bHo $bWo,$height $bx,$by $s,$height 0,$sHo $lx,$ly 0,$b' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$b,0 $tx,$ty $sWo,0 $width,$s $rx,$ry $width,$bHo $bWo,$height $bx,$by $s,$height 0,$sHo $lx,$ly 0,$b' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function slash($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation,$sHeight=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        // slash height offset s
        //backslash height offset b
        if(($sHeight >= $width) || ($sHeight > $height) || ( $sHeight < 0))
            $sHeight = $width/4;

        $s = $sHeight/sqrt(2);
        $sWo = $width - $s;
        $sHo = $height - $s;

        if($dash)
            $doc = $doc."<polygon points='$sWo,0 $width,$s $s,$height 0,$sHo' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$sWo,0 $width,$s $s,$height 0,$sHo' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function backSlash($id,$title, $width,$height,$stroke,$strokeWidth,$dash, $fill,$backColor, $top, $left,$rotation, $bHeight=-1)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", $backColor, $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        //backslash height offset b

        if(($bHeight >= $width) || ($bHeight > $height) || ( $bHeight < 0))
            $bHeight = $width/4;

        $b = $bHeight/sqrt(2);
        $bWo = $width - $b;
        $bHo = $height - $b;

        if($dash)
            $doc = $doc."<polygon points='$b,0 $width,$bHo $bWo,$height 0,$b' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='5 5'/>";
        else
            $doc = $doc."<polygon points='$b,0 $width,$bHo $bWo,$height 0,$b' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    // line arrow star dimension
    public static function line($id,$title, $width, $height,$stroke, $dash, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", 0, $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $height2 = ceil($height/2.0);
        if($dash)
            $doc = $doc."<path d='M 0 $height2 L $width $height2' fill='$stroke' stroke='$stroke' stroke-width='$height' stroke-dasharray='2 2'  />";

        else
            $doc = $doc."<path d='M 0 $height2 L $width $height2' fill='$stroke' stroke='$stroke' stroke-width='$height'   />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function arrow($id,$title, $width, $height,$stroke, $dash, $top, $left,$rotation, $toRight)
    {
        $doc = self::TOPHEADER;
        if($height < 10)
        {
            $lineHeight = $height;
            $height = 10;
            $height2 = ceil($height/2.0);
            $arrowLength = $height;
            $lineWidth = $width - $arrowLength;
        }
        else
        {
            $height2 = ceil($height/2.0);
            $arrowLength = $height;
            $lineWidth = $width - $arrowLength;
            $lineHeight = ceil($height/3.0);
        }

        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", 0, $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        if($toRight)
        {
            if($dash)
                $doc = $doc."<path d='M 0 $height2 L $lineWidth $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight' stroke-dasharray='2 2'  />";

            else
                $doc = $doc."<path d='M 0 $height2 L $lineWidth $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight'   />";

            $doc = $doc."<polygon points='$width,$height2 $lineWidth,0 $lineWidth,$height' fill='$stroke' stroke='$stroke' stroke-width='1'/>";
        }
        else
        {
            if($dash)
                $doc = $doc."<path d='M $arrowLength $height2 L $width $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight' stroke-dasharray='2 2'  />";

            else
                $doc = $doc."<path d='M $arrowLength $height2 L $width $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight'   />";

            $doc = $doc."<polygon points='0,$height2 $arrowLength,0 $arrowLength,$height' fill='$stroke' stroke='$stroke' stroke-width='1'/>";
        }


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function arrow2Way($id,$title, $width, $height,$stroke, $dash, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        if($height < 10)
        {
            $lineHeight = $height;
            $height = 10;
            $height2 = ceil($height/2.0);
        }
        else
        {
            $height2 = ceil($height/2.0);
            $lineHeight = ceil($height/3.0);
        }

        $arrowLength = $height;
        $lineWidth = $width - 2*$arrowLength;

        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", 0, $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $lineWidth += $arrowLength;
        if($dash)
            $doc = $doc."<path d='M $arrowLength $height2 L $lineWidth $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight' stroke-dasharray='1 1'  />";

        else
            $doc = $doc."<path d='M $arrowLength $height2 L $lineWidth $height2' fill='$stroke' stroke='$stroke' stroke-width='$lineHeight'   />";
        $lineWidth -= $arrowLength;

        $doc = $doc."<polygon points='0,$height2 $arrowLength,0 $arrowLength,$height' fill='$stroke' stroke='$stroke' stroke-width='1'/>";
        $lineWidth = $lineWidth+$arrowLength;
        $doc = $doc."<polygon points='$width,$height2 $lineWidth,0 $lineWidth,$height' fill='$stroke' stroke='$stroke' stroke-width='1'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function arrowThick($id,$title, $width, $height,$stroke,$strokeWidth, $dash,$fill, $top, $left,$rotation, $toRight)
    {
        $doc = self::TOPHEADER;

        if($height < 10) $height = 10;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-1*$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $height2 = ceil($height/2.0);
        $lineHeight = ceil($height/3.0);
        $arrowLength = $height;

        if($toRight)
        {
            $lineTLy = $height2 - $lineHeight/2;
            $lineTLx = 0;
            $lineBLx = 0;
            $lineBLy = $height2 + $lineHeight/2;

            $lineTRx = $width - $arrowLength;
            $lineTRy = $lineTLy;
            $lineBRy = $lineBLy;
            $lineBRx = $width - $arrowLength;

            $arrowTx = $lineTRx - $arrowLength/2;
            $arrowBx = $arrowTx;
            $arrowTy  = 0;
            $arrowBy = $height;
            $arrowRx = $width;
            $arrowRy = $height2;

            $toRightPoints = "$lineBLx,$lineBLy $lineTLx,$lineTLy $lineTRx,$lineTRy $arrowTx,$arrowTy $arrowRx,$arrowRy $arrowBx,$arrowBy $lineBRx,$lineBRy ";

            if ($dash)
                $doc = $doc . "<polygon points='$toRightPoints' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 2'/>";
            else
                $doc = $doc . "<polygon points='$toRightPoints' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";
        }
        else
        {
            $lineTRy = $height2 - $lineHeight/2;
            $lineTRx = $width;
            $lineBRx = $width;
            $lineBRy = $height2 + $lineHeight/2;

            $lineTLx = $arrowLength;
            $lineTLy = $lineTRy;
            $lineBLy = $lineBRy;
            $lineBLx = $arrowLength;

            $arrowTx = $lineTLx + $arrowLength/2;
            $arrowBx = $arrowTx;
            $arrowTy  = 0;
            $arrowBy = $height;
            $arrowLx = 0;
            $arrowLy = $height2;

            $toLeftPoints = "$lineBRx,$lineBRy $lineTRx,$lineTRy $lineTLx,$lineTLy $arrowTx,$arrowTy $arrowLx,$arrowLy $arrowBx,$arrowBy $lineBLx,$lineBLy ";

            if ($dash)
                $doc = $doc . "<polygon points='$toLeftPoints' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 2'/>";
            else
                $doc = $doc . "<polygon points='$toLeftPoints' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";
        }


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function arrowThick2Way($id,$title, $width, $height,$stroke,$strokeWidth, $dash,$fill, $top, $left,$rotation)
    {
        $doc = self::TOPHEADER;
        if($height < 10) $height = 10;
//        $height = $height + 2*$strokeWidth;
//        $width = $width + 2*$strokeWidth;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-1*$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $height2 = ceil($height/2.0);
        $lineHeight = ceil($height/3.0);
        $arrowLength = $height;

        $lArrowx = 0;
        $lArrowy = $height2;
        $lArrowTx = 3*$arrowLength/2;
        $lArrowBx = $lArrowTx;
        $lArrowTy  = 0;
        $lArrowBy = $height;

        $lineTLy = $height2 - $lineHeight/2;
        $lineTLx = $arrowLength;
        $lineBLx = $arrowLength;
        $lineBLy = $height2 + $lineHeight/2;

        $lineTRx = $width - $arrowLength;
        $lineTRy = $lineTLy;
        $lineBRy = $lineBLy;
        $lineBRx = $lineTRx;

        $rArrowTx = $lineTRx - $arrowLength/2;
        $rArrowBx = $rArrowTx;
        $rArrowTy  = 0;
        $rArrowBy = $height;
        $rArrowx = $width;
        $rArrowy = $height2;

        $points = "$lArrowx,$lArrowy $lArrowTx,$lArrowTy $lineTLx,$lineTLy $lineTRx,$lineTRy $rArrowTx,$rArrowTy $rArrowx,$rArrowy $rArrowBx,$rArrowBy $lineBRx,$lineBRy $lineBLx,$lineBLy $lArrowBx,$lArrowBy ";

        if ($dash)
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 2'/>";
        else
            $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function vDim($id,$title, $width,$height, $stroke,$strokeWidth, $text, $textSize, $dash , $top, $left,$rotation, $onLeft=true)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2), $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if(!empty($text))
            $asH = $height - $textSize -20 ;//arrowsheight
        else
            $asH = $height;
        if($asH < 0)
        {
            $height = $textSize + 20;
            $asH = $height -$textSize;
        }
        $aH = $asH/2;
        $aH3 = $aH/3;//peykan
        $aH6 = $aH3/6;//text
        $th = $aH + $textSize/2 +10;
        if($aH3 > 10) $aH3 = 10;
        $aH23 = 2*$aH3;

        //bottom
        $hah = $height - $aH;
        $hah3 = $height - $aH3;

        $sw2 = $strokeWidth/2;//strokeWidth2
        if($sw2 < 1) $sw2 = 1;
        //

        if($onLeft)
        {
            $aHO3 = $width - $aH3;// offset
            $aHO23 = $width - $aH23;

            $doc = $doc."<polygon points='$aHO3,0 $width,$aH3 $aHO23,$aH3' fill='$stroke' stroke='$stroke' stroke-width='1' />";//top
            $doc = $doc."<polygon points='$aHO3,$height $width,$hah3 $aHO23,$hah3' fill='$stroke' stroke='$stroke' stroke-width='1' />";//bottom

            $tw = $width - 5*strlen($text)*$textSize/8;

            if($dash)
            {
                $doc = $doc."<path d='M $aHO3 $aH3  L $aHO3 $aH' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M 0 0  L $aHO3 0' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";

                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //bottom
                $doc = $doc."<path d='M $aHO3 $hah3  L $aHO3 $hah' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M 0 $height  L $aHO3 $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";
            }
            else
            {
                $doc = $doc."<path d='M $aHO3 $aH3  L $aHO3 $aH' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'  />";
                $doc = $doc."<path d='M 0 0  L $aHO3 0' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3' />";

                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //bottom
                $doc = $doc."<path d='M $aHO3 $hah3  L $aHO3 $hah' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'   />";
                $doc = $doc."<path d='M 0 $height  L $aHO3 $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3' />";
            }
        }
        else
        {
            $doc = $doc."<polygon points='$aH3,0 $aH23,$aH3 0,$aH3' fill='$stroke' stroke='$stroke' stroke-width='1' />";//top
            $doc = $doc."<polygon points='$aH3,$height $aH23,$hah3 0,$hah3' fill='$stroke' stroke='$stroke' stroke-width='1' />";//bottom

            if($dash)
            {
                $doc = $doc."<path d='M $aH3 $aH3  L $aH3 $aH' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M $aH3 0  L $width 0' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";

                $doc = $doc."<text x='0' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //bottom
                $doc = $doc."<path d='M $aH3 $hah3  L $aH3 $hah' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M $aH3 $height  L $width $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";
            }
            else
            {
                $doc = $doc."<path d='M $aH3 $aH3  L $aH3 $aH' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' />";
                $doc = $doc."<path d='M $aH3 0  L $width 0' fill='$stroke' stroke='$stroke' stroke-width='$sw2'  stroke-dasharray='2 3' />";

                $doc = $doc."<text x='0' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //bottom
                $doc = $doc."<path d='M $aH3 $hah3  L $aH3 $hah' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'  />";
                $doc = $doc."<path d='M $aH3 $height  L $width $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3' />";
            }
        }

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function hDim($id,$title, $width,$height, $stroke,$strokeWidth,$text, $textSize, $dash , $top, $left,$rotation, $onTop=true)
    {
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2), $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        if(empty($text))
            $asW = $width;
        else
            $asW = $width - 5*strlen($text)*$textSize/8 - 10 ;//arrows width

        if($asW < 0)
        {
            $width = 5*strlen($text)*$textSize/8 + 20;
            $asW = $width -$textSize;
        }
        $aW = $asW/2;
        $aW3 = $aW/3;//peykan
        if($aW3 > 10) $aW3 = 10;
        $aW23 = 2*$aW3;

        $aWO3 = $width - $aW3;
        $aWO = $width - $aW;

        //bottom
        $aHO = $height - $aW3;
        $aHO23 = $height - 2*$aW3;

        $sw2 = $strokeWidth/2;//strokeWidth2
        if($sw2 < 1) $sw2 = 1;

        if($onTop)
        {
            //peykans
            $doc = $doc."<polygon points='0,$aW3 $aW3,0 $aW3,$aW23' fill='$stroke' stroke='$stroke' stroke-width='1' />";//left
            $doc = $doc."<polygon points='$width,$aW3 $aWO3,0 $aWO3,$aW23' fill='$stroke' stroke='$stroke' stroke-width='1' />";//right

            if($dash)
            {
                //left
                $doc = $doc."<path d='M $aW3 $aW3  L $aW $aW3' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M 0 $aW3 L 0 $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";
                $th = $aW3 + $textSize/2;
                $tw = $aW +2;
                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //right
                $doc = $doc."<path d='M $aWO $aW3  L $aWO3 $aW3' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M $width $aW3 L $width $height ' fill='$stroke' stroke='$stroke' stroke-width='$sw2' />";
            }
            else
            {
                //left
                $doc = $doc."<path d='M $aW3 $aW3  L $aW $aW3' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'   />";
                $doc = $doc."<path d='M 0 $aW3 L 0 $height' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3' />";
                $th = $aW3 + $textSize/2;
                $tw = $aW +2;
                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //right
                $doc = $doc."<path d='M $aWO $aW3  L $aWO3 $aW3' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'  />";
                $doc = $doc."<path d='M $width $aW3 L $width $height ' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3'  />";
            }
        }
        else
        {
            //peykans
            $doc = $doc."<polygon points='0,$aHO $aW3,$aHO23 $aW3,$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";//left
            $doc = $doc."<polygon points='$width,$aHO $aWO3,$aHO23 $aWO3,$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";//right

            if($dash)
            {
                //left
                $doc = $doc."<path d='M $aW3 $aHO  L $aW $aHO' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
                $doc = $doc."<path d='M 0 0 L 0 $aHO' fill='$stroke' stroke='$stroke' stroke-width='$sw2'  />";
                $th = $aHO;
                $tw = $aW +2;
                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //right
                $doc = $doc."<path d='M $aWO $aHO  L $aWO3 $aHO' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3' />";
                $doc = $doc."<path d='M $width 0 L $width $aHO ' fill='$stroke' stroke='$stroke' stroke-width='$sw2'   />";
            }
            else
            {
                //left
                $doc = $doc."<path d='M $aW3 $aHO  L $aW $aHO' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'   />";
                $doc = $doc."<path d='M 0 0 L 0 $aHO' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3' />";
                $th = $aHO;
                $tw = $aW +2;
                $doc = $doc."<text x='$tw' y='$th' fill='$stroke' font-size='$textSize' >$text</text>";

                //right
                $doc = $doc."<path d='M $aWO $aHO  L $aWO3 $aHO' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'  />";
                $doc = $doc."<path d='M $width 0 L $width $aHO ' fill='$stroke' stroke='$stroke' stroke-width='$sw2' stroke-dasharray='2 3'  />";
            }
        }

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //Floor plan
    //door
    public static function singleDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation, $opensRight=true)
    {
        if(empty($title)) $title = "تک درب";
        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        $w8 = $width/8;
        $h8 = $height/8;
        if($w8 > (5*$strokeWidth))
            $w8 = 5*$strokeWidth;
        if($w8 > $h8)
            $w8 = $h8;
        else
            $h8 = $w8;
        $wo = $width - $w8;//width offset
        $ho = $height - $h8;// height offset
        $doorWidth = 2*$strokeWidth;
        //rects
        $doc = $doc."<rect x='0' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$wo' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        if($opensRight)
        {
            $doorX = $wo - $doorWidth;
            $doc = $doc."<rect x='$doorX' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width/4;
            $middleY = 4;
            $doc = $doc."<path d='M $doorX 0  Q $middleX $middleY $w8 $height ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";
        }
        else
        {
            $doc = $doc."<rect x='$w8' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width - $width/4;
            $middleY = 4;
            $doc = $doc."<path d='M $w8 0  Q $middleX $middleY $wo $height ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        }

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function doubleDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "دو درب";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $w8 = $width/8;
        $h8 = $height/8;
        if($w8 > (5*$strokeWidth))
            $w8 = 5*$strokeWidth;
        if($w8 > $h8)
            $w8 = $h8;
        else
            $h8 = $w8;
        $wo = $width - $w8;//width offset
        $ho = $height - $h8;// height offset
        $doorWidth = 2*$strokeWidth;
        //rects
        $doc = $doc."<rect x='0' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$wo' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        $centerX = $width/2;
        $centerY = $ho;

        $middleY = $height/10;
        if($middleY > 2) $middleY = 2;

        //right
        $doorX = $wo - $doorWidth;
        $doc = $doc."<rect x='$doorX' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $middleX = $width/2 + $width/8;
        $middleY = 2;
        $doc = $doc."<path d='M $doorX 0  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        //left
        $doc = $doc."<rect x='$w8' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $middleX = $width/2 - $width/8;
        $doc = $doc."<path d='M $w8 0  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);


        return $doc;
    }
    public static function slidingDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "درب کشویی";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        $w8 = $width/8;
        $w8O = $width - $w8; // width offset
        $w2 = $width/2;
        $xl = $w2 - 5; // left x
        $sh = $height/2 ; // sliding height
        $dsY = $height - $sh;// down slide y

        if($w8 > (10*$strokeWidth))
            $w8 = 10*$strokeWidth;

        $sw = ($width - 2*$w8)/2 + 5; //slide width

        //rects
        $doc = $doc."<rect x='0' y='0' width='$w8' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$w8O' y='0' width='$w8' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        //right
        $doc = $doc."<rect x='$w8' y='0' width='$sw' height='$sh' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        //left
        $doc = $doc."<rect x='$xl' y='$dsY' width='$sw' height='$sh' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function bifoldDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "درب تا شو دو طرفه";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $w8 = $width/8;
        $h2 = $height/2;
        $lRectX = 0; // left rect
        $lRectY = $h2 - $height/8;
        $rWidth = $w8;//rec width
        $rHeight = 2*$height/8;
        $rRectX = $width - $rWidth;
        $rRectY = $lRectY;

        $doorWidth = $width - 2*$rWidth;
        $sideSize = $doorWidth/5;

        //points
        //left/right side : start top end
        $lStartX = $rWidth;
        $lTopX = $lStartX + $sideSize;
        $lEndX = $lTopX + $sideSize;

        $rStartX = $width - $rWidth;
        $rTopX = $rStartX - $sideSize;
        $rEndX = $rTopX - $sideSize;

        //rects
        $doc = $doc."<rect x='$lRectX' y='0$lRectY' width='$rWidth' height='$rHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$rRectX' y='0$rRectY' width='$rWidth' height='$rHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        //right
        $doc = $doc."<path d='M $rStartX $h2  L $rTopX 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
        $doc = $doc."<path d='M $rTopX 0 L $rEndX $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";

        //left
        $doc = $doc."<path d='M $lStartX $h2  L $lTopX 0 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
        $doc = $doc."<path d='M $lTopX 0 L $lEndX $h2' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function foldDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation,$foldsRight=1)
    {
        if(empty($title)) $title = "درب تا شو";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $w8 = $width/8;
        $h2 = $height/2;
        $lRectX = 0; // left rect
        $lRectY = $h2 - $height/8;
        $rWidth = $w8;//rec width
        $rHeight = 2*$height/8;
        $rRectX = $width - $rWidth;
        $rRectY = $lRectY;

        $doorWidth = $width - 2*$rWidth;
        $sideSize = $doorWidth/6;

        //points
        //left/right side : start top end
        $lStartX = $rWidth;
        $lTopX = $lStartX + $sideSize;
        $lEndX = $lTopX + $sideSize;

        $centerX = $lEndX + $sideSize;

        $rStartX = $width - $rWidth;
        $rTopX = $rStartX - $sideSize;
        $rEndX = $rTopX - $sideSize;

        //rects
        $doc = $doc."<rect x='$lRectX' y='0$lRectY' width='$rWidth' height='$rHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$rRectX' y='0$rRectY' width='$rWidth' height='$rHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        if($foldsRight)
        {
            //right
            $doc = $doc."<path d='M $rStartX $h2  L $rTopX 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
            $doc = $doc."<path d='M $rTopX 0 L $rEndX $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $rEndX $h2 L $centerX 0 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $centerX 0 L $lEndX $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $lEndX $h2 L $lTopX 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
        }
        else
        {
            //left
            $doc = $doc."<path d='M $rTopX 0 L $rEndX $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $rEndX $h2 L $centerX 0 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $centerX 0 L $lEndX $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M $lEndX $h2 L $lTopX 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'   />";
            $doc = $doc."<path d='M  $lTopX 0  L $lStartX $h2' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
        }

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function unEvenDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation,$bigRight = 1)
    {
        if (empty($title)) $title = "دو درب نابرابر";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth / 2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width - $strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height - $strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2 * $strokeWidth;
        $height = $height - 2 * $strokeWidth;
        $w8 = $width / 8;
        $h8 = $height / 8;
        if ($w8 > (5 * $strokeWidth))
            $w8 = 5 * $strokeWidth;
        if ($w8 > $h8)
            $w8 = $h8;
        else
            $h8 = $w8;
        $wo = $width - $w8;//width offset
        $ho = $height - $h8;// height offset
        $doorWidth = 2 * $strokeWidth;
        //rects
        $doc = $doc . "<rect x='0' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<rect x='$wo' y='$ho' width='$w8' height='$h8' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        $centerY = $ho;

        $middleY = $height / 10;
        if ($middleY > 2) $middleY = 2;

        if($bigRight)
        {
            $centerX = $width / 4;

            //right
            $doorX = $wo - $doorWidth;
            $doc = $doc . "<rect x='$doorX' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width / 2 ;
            $middleY = 2;
            $doc = $doc . "<path d='M $doorX 0  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

            //left
            $leftY = $height/2;
            $lHeight = $height - $height/2;
            $doc = $doc . "<rect x='$w8' y='$leftY' width='$doorWidth' height='$lHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width / 8;
            $middleY = $leftY - 2;
            $doc = $doc . "<path d='M $w8 $leftY  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        }
        else
        {
            $centerX = 3*$width/4;

            //right
            $doorX = $wo - $doorWidth;
            $rHeight = $height - $height/2;
            $rightY = $height/2;
            $doc = $doc . "<rect x='$doorX' y='$rightY' width='$doorWidth' height='$rHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width - $width/8;
            $middleY = $rightY - 2;
            $doc = $doc . "<path d='M $doorX $rightY  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

            //left
            $doc = $doc . "<rect x='$w8' y='0' width='$doorWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
            $middleX = $width / 2;
            $middleY = 2;
            $doc = $doc . "<path d='M $w8 0  Q $middleX $middleY $centerX $centerY ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        }


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function opposingDoor($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if (empty($title)) $title = "دو درب متقابل";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth / 2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width - $strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height - $strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2 * $strokeWidth;
        $height = $height - 2 * $strokeWidth;

        $h2 = $height / 2;
        $w2 = $width / 2;
        $rectWidth = $width / 8;
        $rectHeight = $height / 8;
        $lRectX = 0;// left rect x
        $lRectY = $h2 - $rectHeight / 2;
        $rRectX = $width - $rectWidth;
        $rRectY = $lRectY;

        $doorWidth = 3 * $strokeWidth;
        $doorHeight = $h2;

        $lDoorX = $rectWidth;
        $lDoorY = 0;

        $rDoorX = $width - $rectWidth - $doorWidth;
        $rDoorY = $h2;

        $lMiddleX = $w2 - 10;
        $lMiddleY = 2;
        $rMiddleX = $w2 + 10;
        $rMiddleY = $height - 2;

        //rects
        $doc = $doc . "<rect x='$rRectX' y='$rRectY' width='$rectWidth' height='$rectHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<rect x='$lRectX' y='$lRectY' width='$rectWidth' height='$rectHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<rect x='$lRectX' y='$lRectY' width='$width' height='$rectHeight' fill='none' stroke='$stroke' stroke-width='1' />";

        //right
        $doc = $doc . "<rect x='$rDoorX' y='$rDoorY' width='$doorWidth' height='$doorHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<path d='M $rDoorX $height  Q $rMiddleX $rMiddleY $w2 $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        //left
        $doc = $doc . "<rect x='$lDoorX' y='$lDoorY' width='$doorWidth' height='$doorHeight' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<path d='M $lDoorX $lDoorY  Q $lMiddleX $lMiddleY $w2 $h2 ' fill='none' stroke='$stroke' stroke-width='$strokeWidth' stroke-dasharray='2 3'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function revolvingDoor($id,$title, $width,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if (empty($title)) $title = "درب گردان";

        $height = $width;
        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        $sw2 = 2*$strokeWidth;
        //rects
        $h2 = $height/2;
        $rectWidth = $width/8;
//        if($rectWidth > 10) $rectWidth = 10;
        $lRectX = 0;
        $lRectY = $h2 - $rectWidth/2;
        $rRectX = $width - $rectWidth;
        $rRectY = $lRectY;
        $doc = $doc . "<rect x='$lRectX' y='$lRectY' width='$rectWidth' height='$rectWidth' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc . "<rect x='$rRectX' y='$rRectY' width='$rectWidth' height='$rectWidth' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<path d='M 0 $h2 L $width $h2' fill='none' stroke='$stroke' stroke-width='$sw2'  />";


        $x1 = $cx - $width/4;
        $x2 = $cx + $width/4;
        $y1 = self::getEllipseY($cx, $cy,$rx, $ry, $x1);
        $y2 = self::getEllipseY($cx, $cy,$rx, $ry, $x2);
        $y1H = $y1[0];
        $y1L = $y1[1];
        if($y1[1] > $y1[0]){ $y1H = $y1[1]; $y1L = $y1[0]; }
        $y2H = $y2[0];
        $y2L = $y2[1];
        if($y2[1] > $y2[0]){ $y2H = $y2[1]; $y2L = $y2[0]; }

        $doc = $doc."<path d='M $x1 $y1H L $x2 $y2L' fill='none' stroke='$stroke' stroke-width='$sw2'  />";
        $doc = $doc."<path d='M $x1 $y1L L $x2 $y2H' fill='none' stroke='$stroke' stroke-width='$sw2'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //windows
    public static function window($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "پنجره";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $h2 = $height/2;
        $h8 = $height/8;
        $ho = $height - $h8;
        $rectWidth = $width/8;
        $lRectX = 2*$strokeWidth;
        $rectY = 0;
        $rRectX = $width - $rectWidth - 2*$strokeWidth;

        $doc = $doc."<polyline points='0,$h8 0,0 $width,0 $width,$h8' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<polyline points='0,$ho 0,$height $width,$height $width,$ho' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<rect x='$lRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$rRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        $doc = $doc."<path d='M $lRectX $h2  L $rRectX $h2' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'   />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function doubleWindow($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "پنجره";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $w2 = $width/2;
        $h2 = $height/2;
        $h8 = $height/8;
        $ho = $height - $h8;
        $rectWidth = $width/8;
        $rw = $width/16;
        if($rw < 2) $rw = 2;
        $lRectX = 2*$strokeWidth;
        $rectY = 0;
        $rRectX = $width - $rectWidth - 2*$strokeWidth;
        $cRectX = $w2 - $rw/2;

        $doc = $doc."<polyline points='0,$h8 0,0 $width,0 $width,$h8' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<polyline points='0,$ho 0,$height $width,$height $width,$ho' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<rect x='$lRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$cRectX' y='0' width='$rw' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$rRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        $doc = $doc."<path d='M $lRectX $h2  L $rRectX $h2' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth'   />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function gliderWindow($id,$title, $width,$height,$stroke,$strokeWidth, $top, $left,$rotation)
    {
        if(empty($title)) $title = "پنجره کشویی";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $h2 = $height/2;
        $h4 = $height/4;
        $h8 = $height/8;

        $ho = $height - $h8;
        $rectWidth = $width/8;
        $lRectX = 2*$strokeWidth;
        $rRectX = $width - $rectWidth - 2*$strokeWidth;

        $slidersWidth = $rRectX - $lRectX -$rectWidth;
        $sliderWidth = $slidersWidth/2;
        $w2 = $width/2;
        $lSliderX = $lRectX + $rectWidth;
        $lSliderY = $h2;
        $rSliderX = $w2 - $width/8;
        $rSliderY = $h4;

        $doc = $doc."<polyline points='0,$h8 0,0 $width,0 $width,$h8' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<polyline points='0,$ho 0,$height $width,$height $width,$ho' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<rect x='$lRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";
        $doc = $doc."<rect x='$rRectX' y='0' width='$rectWidth' height='$height' fill='$stroke' stroke='$stroke' stroke-width='1' />";

        $doc = $doc."<rect x='$lSliderX' y='$lSliderY' width='$sliderWidth' height='$h4' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<rect x='$rSliderX' y='$rSliderY' width='$sliderWidth' height='$h4' fill='none' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    // walls
    public static function lWall($id, $title, $width, $height, $wDelta, $hDelta, $stroke, $strokeWidth, $fill, $top, $left, $rotation, $posTop, $posLeft)
    {
        if(empty($title)) $title = "دیوار ال";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        if($posTop)
        {
            //top
            if($posLeft)
            {
                //TOP-LEFT Corner
                //points strats top-left and continues clockwise
                $x1 = 0; $y1 = 0;
                $x2 = $width; $y2 = 0;
                $x3 = $width; $y3 = $hDelta;
                $x4 = $wDelta; $y4 = $hDelta;
                $x5 = $wDelta; $y5 = $height;
                $x6 = 0; $y6 = $height;
            }
            else
            {
                //TOP-RIGHT Corner
                //points strats top-left and continues clockwise
                $x1 = 0; $y1 = 0;
                $x2 = $width; $y2 = 0;
                $x3 = $width; $y3 = $height;
                $x4 = $width - $wDelta; $y4 = $height;
                $x5 = $x4; $y5 = $hDelta;
                $x6 = 0; $y6 = $hDelta;
            }
        }
        else
        {
            //bottom
            if($posLeft)
            {
                //bottom-Left Corner
                //points strats top-left and continues clockwise
                $x1 = 0; $y1 = 0;
                $x2 = $wDelta; $y2 = 0;
                $x3 = $x2; $y3 = $height - $hDelta;
                $x4 = $width; $y4 = $y3;
                $x5 = $width; $y5 = $height;
                $x6 = 0; $y6 = $height;
            }
            else
            {
                //Bottom-Right Corner
                //points strats top-left and continues clockwise
                $x1 = $width - $wDelta; $y1 = 0;
                $x2 = $width; $y2 = 0;
                $x3 = $width; $y3 = $height;
                $x4 = 0; $y4 = $height;
                $x5 = 0; $y5 = $height - $hDelta;
                $x6 = $x1; $y6 = $height - $hDelta;
            }
        }

        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6";
        $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function wall($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "دیوار";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $doc = $doc."<rect x='0' y='0' width='$width' height='$height' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function uWallUD($id, $title, $width, $height, $hDelta, $leftWidthDelta,$rightWidthDelta,$leftHeight, $rightHeight, $stroke, $strokeWidth, $fill, $top, $left, $rotation, $toUp = true)
    {
        //up down u wall
        if(empty($title)) $title = "دیوار یو";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        if($toUp)
        {
            //up
            //clockwise point from top-left
            $x1=0; $y1 = $height - $hDelta - $leftHeight;
            $x2 = $leftWidthDelta; $y2 = $y1;
            $x3 = $x2; $y3 = $height - $hDelta;
            $x4 = $width - $rightWidthDelta; $y4 = $y3;
            $x5 = $x4; $y5 = $height - $hDelta - $rightHeight;
            $x6 = $width; $y6 = $y5;
            $x7 = $width; $y7 = $height;
            $x8 = 0; $y8 = $height;
        }
        else
        {
            //clockwise point from top-left
            $x1=0; $y1 = 0;
            $x2 = $width; $y2 = 0;
            $x3 = $width; $y3 = $hDelta+$rightHeight;
            $x4 = $width - $rightWidthDelta; $y4 = $y3;
            $x5 = $x4; $y5 = $hDelta;
            $x6 = $leftWidthDelta; $y6 = $y5;
            $x7 = $x6; $y7 = $hDelta+$leftHeight;
            $x8 = 0; $y8 = $y7;

        }

        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7 $x8,$y8";
        $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function uWallLR($id, $title, $width, $height, $hUpDelta,$hDownDelta, $widthDelta,$upWidth, $downWidth, $stroke, $strokeWidth, $fill, $top, $left, $rotation, $toLeft = true)
    {
        //left right u wall
        if(empty($title)) $title = "دیوار یو";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;
        if($upWidth > ($width-$widthDelta)) $upWidth = $width - $widthDelta;
        if($downWidth > ($width-$widthDelta)) $downWidth = $width - $widthDelta;

        if($toLeft)
        {
            //left
            //clockwise point from top-left
            $x1=$width - $widthDelta - $upWidth; $y1 = 0;
            $x2 = $width; $y2 = 0;
            $x3 = $width; $y3 = $height;
            $x4 = $width - $widthDelta - $downWidth; $y4 = $height;
            $x5 = $x4; $y5 = $height - $hDownDelta;
            $x6 = $width - $widthDelta; $y6 = $y5;
            $x7 = $x6; $y7 = $hUpDelta;
            $x8 = $x1; $y8 = $hUpDelta;
        }
        else
        {
            //clockwise point from top-left
            $x1=0; $y1 = 0;
            $x2 = $widthDelta+$upWidth; $y2 = 0;
            $x3 = $x2; $y3 = $hUpDelta;
            $x4 = $widthDelta; $y4 = $y3;
            $x5 = $x4; $y5 = $height - $hDownDelta;
            $x6 = $widthDelta+$downWidth; $y6 = $y5;
            $x7 = $x6; $y7 = $height;
            $x8 = 0; $y8 = $height;

        }

        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7 $x8,$y8";
        $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //spaces
    public static function space($id, $title, $width, $height, $stroke, $strokeWidth, $top, $left, $rotation)
    {
        if(empty($title)) $title = "فضا";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $x1 = 0; $y1 = 0;
        $x2 = $width; $y2 = 0;
        $x3 = $width; $y3 = $height;
        $x4 = 0; $y4 = $height;

        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4";
        $doc = $doc . "<polygon points='$points' fill='none' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function lSpace($id, $title, $width, $height, $widthDelta, $heightDelta, $stroke, $strokeWidth, $top, $left, $rotation)
    {
        if(empty($title)) $title = "فضای ال";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $x1 = 0; $y1 = 0;
        $x2 = $width; $y2 = 0;
        $x3 = $width; $y3 = $heightDelta;
        $x4 = $widthDelta; $y4 = $heightDelta;
        $x5 = $widthDelta; $y5 = $height;
        $x6 = 0; $y6 = $height;

        //outer
        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6";
        $doc = $doc . "<polygon points='$points' fill='none' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function tSpace($id, $title, $width, $height, $leftWidthDelta, $rightWidthDelta, $leftHeightDelta, $rightHeightDelta,$stroke, $strokeWidth, $top, $left, $rotation)
    {
        if(empty($title)) $title = "فضای تی";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $x1 = 0; $y1 = 0;
        $x2 = $width; $y2 = 0;
        $x3 = $width; $y3 = $rightHeightDelta;
        $x4 = $width - $rightWidthDelta; $y4 = $rightHeightDelta;
        $x5 = $x4; $y5 = $height;
        $x6 = $leftWidthDelta; $y6 = $height;
        $x7 = $x6; $y7 = $leftHeightDelta;
        $x8 = 0; $y8 = $leftHeightDelta;

        //outer
        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7 $x8,$y8";
        $doc = $doc . "<polygon points='$points' fill='none' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //stairs
    public static function stairs($id, $title, $width, $height, $stairCount, $stroke, $strokeWidth, $top, $left, $rotation)
    {
        if(empty($title)) $title = "راه پله";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", (-$strokeWidth/2.0), $doc);
        $doc = str_replace("VIEW_WIDTH", ($width-$strokeWidth), $doc);
        $doc = str_replace("VIEW_HEIGHT", ($height-$strokeWidth), $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height -2*$strokeWidth;

        $x1 = 0; $y1 = 0;
        $x2 = $width; $y2 = 0;
        $x3 = $width; $y3 = $height;
        $x4 = 0; $y4 = $height;
        $x5 = $x4; $y5 = $height;
        $xCenter = $width/2;

        $points = "$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5";
        $doc = $doc . "<polygon points='$points' fill='none' stroke='$stroke' stroke-width='$strokeWidth'/>";
        $doc = $doc."<path d='M $xCenter 0 L $xCenter $height' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
        if($stairCount > 0)
        {
            $stairCount++;
            $stairHeight = $height / $stairCount;

            //first line
            $tempHeight = $stairHeight;
            $doc = $doc."<path d='M 0 $tempHeight L $width $tempHeight' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
            $doc = $doc."<path d='M 0 $tempHeight L $xCenter 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
            $doc = $doc."<path d='M $width $tempHeight L $xCenter 0' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
            //stairs
            $tempHeight += $stairHeight;
            while ($tempHeight < $height)
            {
                $doc = $doc."<path d='M 0 $tempHeight L $width $tempHeight' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";
                $tempHeight += $stairHeight;
            }
        }

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    //Network
    private static function getPerpendicularLinePoints($x1,$y1, $x2,$y2, $x0, $delta)
    {
        //get two points in perpendicular line width symetric delta distance
        $m = ($y2 - $y1)/($x2 - $x1);
        $y0 = $m*($x0 - $x1) + $y1;
        //perpendicular
        $m = -1/$m;
        $xp1 = $x0 + $delta/2;
        $xp2 = $x0 - $delta /2;
        $yp1 = $m*($xp1 - $x0) + $y0;
        $yp2 = $m*($xp2 - $x0) + $y0;

        return [$xp1,$yp1,$xp2,$yp2];
    }
    private static function getLinePointY($x1,$y1,$x2,$y2, $x0)
    {
        return ($y2 - $y1)/($x2 - $x1) * ($x0 - $x1) + $y1;
    }
    private static function getLinePointX($x1,$y1,$x2,$y2, $y0)
    {
        return ($y0 - $y1)*($x2 - $x1)/($y2 - $y1) + $x1;
    }
    public static function router($id, $title, $width, $height,$stroke, $inStroke, $strokeWidth,$inStrokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "روتر";

        $cx = $width/2  - $strokeWidth;
        $cy = $height/2 - $strokeWidth;
        $rx = $cx;
        $ry = $cy;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $x1 = $cx - $width/3;
        $x2 = $cx + $width/3;
        $y1 = self::getEllipseY($cx, $cy,$rx, $ry, $x1);
        $y2 = self::getEllipseY($cx, $cy,$rx, $ry, $x2);
        $y1H = $y1[0];
        $y1L = $y1[1];
        if($y1[1] < $y1[0]){ $y1H = $y1[1]; $y1L = $y1[0]; }
        $y2H = $y2[0];
        $y2L = $y2[1];
        if($y2[1] < $y2[0]){ $y2H = $y2[1]; $y2L = $y2[0]; }


        $arrowLength = 3 * $inStrokeWidth;
        if($arrowLength > ($rx/2)) $arrowLength = $rx/3;

        // line top left
        $px1 = $x1 + 5;
        $py1 = self::getLinePointY($x1,$y1H,$cx,$cy, $px1);
        $px2 = $cx - 5;
        $py2 = self::getLinePointY($x1,$y1H,$cx,$cy, $px2);
        $doc = $doc."<path d='M $px1 $py1 L $px2 $py2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        // arrow top left
        $x0 = $px2-$arrowLength;
        $array = self::getPerpendicularLinePoints($px1,$py1,$px2,$py2,$x0,$arrowLength);
        $px_1 = $array[0];
        $py_1 = $array[1];
        $px_2 = $array[2];
        $py_2 = $array[3];
        $doc = $doc."<path d='M $px_1 $py_1 L $px2 $py2 L $px_2 $py_2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //line bottom left
        $px1 = $x1 + 5;
        $py1 = self::getLinePointY($x1,$y1L,$cx,$cy, $px1);
        $px2 = $cx - 5;
        $py2 = self::getLinePointY($x1,$y1L,$cx,$cy, $px2);
        $doc = $doc."<path d='M $px1 $py1 L $px2 $py2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //arrows bottom left
        $x0 = $px1+$arrowLength;
        $array = self::getPerpendicularLinePoints($px1,$py1,$px2,$py2,$x0,$arrowLength);
        $px_1 = $array[0];
        $py_1 = $array[1];
        $px_2 = $array[2];
        $py_2 = $array[3];
        $doc = $doc."<path d='M $px_1 $py_1 L $px1 $py1 L $px_2 $py_2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";


        // line top right
        $px1 = $x2 - 5;
        $py1 = self::getLinePointY($x2,$y2H,$cx,$cy, $px1);
        $px2 = $cx + 5;
        $py2 = self::getLinePointY($x2,$y2H,$cx,$cy, $px2);
        $doc = $doc."<path d='M $px1 $py1 L $px2 $py2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //top right arrow
        $x0 = $px1-$arrowLength;
        $array = self::getPerpendicularLinePoints($px1,$py1,$px2,$py2,$x0,$arrowLength);
        $px_1 = $array[0];
        $py_1 = $array[1];
        $px_2 = $array[2];
        $py_2 = $array[3];
        $doc = $doc."<path d='M $px_1 $py_1 L $px1 $py1 L $px_2 $py_2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        // bottom right arrow
        $px1 = $x2 - 5;
        $py1 = self::getLinePointY($x2,$y2L,$cx,$cy, $px1);
        $px2 = $cx + 5;
        $py2 = self::getLinePointY($x2,$y2L,$cx,$cy, $px2);
        $doc = $doc."<path d='M $px1 $py1 L $px2 $py2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //bottom right arrow
        $x0 = $px2+$arrowLength;
        $array = self::getPerpendicularLinePoints($px1,$py1,$px2,$py2,$x0,$arrowLength);
        $px_1 = $array[0];
        $py_1 = $array[1];
        $px_2 = $array[2];
        $py_2 = $array[3];
        $doc = $doc."<path d='M $px_1 $py_1 L $px2 $py2 L $px_2 $py_2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function switchL2($id, $title, $width, $height,$stroke, $inStroke, $strokeWidth,$inStrokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "سوییچ لایه ۲";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $points = "0,0 $width,0 $width,$height 0,$height";
        $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $w2 = $width/2;
        $hDelta = $height / 5;
        $arrowLength = 3 * $strokeWidth;
        if($arrowLength > ($w2/5)) $arrowLength = $w2/5;
        //arrow top 1
        $x1 = $w2 - $w2/4; $y1 = $hDelta;
        $x2 = $width - 5; $y2 = $y1;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2 ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        $x = $x2 - $arrowLength;
        $yH = $y2 - $arrowLength;
        $yL = $y2 + $arrowLength;
        $doc = $doc."<path d='M $x $yH L $x2 $y2 L $x $yL ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //arrow 2
        $x1 = 5; $y1 = 2*$hDelta;
        $x2 = $w2 + $w2/4; $y2 = $y1;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2 ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        $x = $x1 + $arrowLength;
        $yH = $y1 - $arrowLength;
        $yL = $y1 + $arrowLength;
        $doc = $doc."<path d='M $x $yH L $x1 $y1 L $x $yL ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //arrow 3
        $x1 = $w2 - $w2/4; $y1 = 3*$hDelta;
        $x2 = $width - 5; $y2 = $y1;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2 ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        $x = $x2 - $arrowLength;
        $yH = $y2 - $arrowLength;
        $yL = $y2 + $arrowLength;
        $doc = $doc."<path d='M $x $yH L $x2 $y2 L $x $yL ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //arrow 4
        $x1 = 5; $y1 = 4*$hDelta;
        $x2 = $w2 + $w2/4; $y2 = $y1;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2 ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        $x = $x1 + $arrowLength;
        $yH = $y1 - $arrowLength;
        $yL = $y1 + $arrowLength;
        $doc = $doc."<path d='M $x $yH L $x1 $y1 L $x $yL ' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function switchL3($id, $title, $width, $height,$stroke, $inStroke, $strokeWidth,$inStrokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "سوییچ لایه ۳";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $points = "0,0 $width,0 $width,$height 0,$height";
        $doc = $doc . "<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'/>";

        $arrowLength = 3 * $strokeWidth;
        if($arrowLength > ($width/6)) $arrowLength = $width/6;

        $cx = $width / 2;
        $cy = $height / 2;
        $r = $width / 8;
        if($r < 5) $r = 5;
        $doc = $doc."<ellipse cx='$cx' cy='$cy' rx='$r' ry='$r' fill='$inStroke' stroke='$inStroke' stroke-width='$inStrokeWidth' />";

        // line vertical
        $x1 = $cx; $y1 = 5;
        $x2 = $cx; $y2 = $height - 5;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //arrow top
        $ax1 = $cx - $arrowLength; $ay1 = $y1 + $arrowLength;
        $ax2 = $cx + $arrowLength; $ay2 = $ay1;
        $doc = $doc."<path d='M $ax1 $ay1 L $x1 $y1 L $ax2 $ay2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //arrow bottom
        $ax1 = $cx - $arrowLength; $ay1 = $y2 - $arrowLength;
        $ax2 = $cx + $arrowLength; $ay2 = $ay1;
        $doc = $doc."<path d='M $ax1 $ay1 L $x2 $y2 L $ax2 $ay2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //line Horizontal
        $x1 = 5; $y1 = $cy;
        $x2 = $width - 5; $y2 = $cy;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //arrow left
        $ax1 = $x1 + $arrowLength; $ay1 = $y1 - $arrowLength;
        $ax2 = $ax1; $ay2 = $y1 + $arrowLength;
        $doc = $doc."<path d='M $ax1 $ay1 L $x1 $y1 L $ax2 $ay2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        //arrow right
        $ax1 = $x2 - $arrowLength; $ay1 = $y2 - $arrowLength;
        $ax2 = $ax1; $ay2 = $y2 + $arrowLength;
        $doc = $doc."<path d='M $ax1 $ay1 L $x2 $y2 L $ax2 $ay2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //line slash
        $x1 = $width - 10; $y1 = 10;
        $x2 = 10; $y2 = $height - 10;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        // arrow top
        $x0 = $x1 - $arrowLength / sqrt(2);
        $ap = self::getPerpendicularLinePoints($x1,$y1,$x2,$y2,$x0,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x1 $y1 L $ap[2] $ap[3]' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        // arrow bottom
        $x0 = $x2 + $arrowLength / sqrt(2);
        $ap = self::getPerpendicularLinePoints($x1,$y1,$x2,$y2,$x0,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x2 $y2 L $ap[2] $ap[3]' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";

        //line backslash
        $x1 = 10; $y1 = 10;
        $x2 = $width - 10; $y2 = $height - 10;
        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        // arrow top
        $x0 = $x1 + $arrowLength / sqrt(2);
        $ap = self::getPerpendicularLinePoints($x1,$y1,$x2,$y2,$x0,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x1 $y1 L $ap[2] $ap[3]' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";
        // arrow bottom
        $x0 = $x2 - $arrowLength / sqrt(2);
        $ap = self::getPerpendicularLinePoints($x1,$y1,$x2,$y2,$x0,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x2 $y2 L $ap[2] $ap[3]' fill='none' stroke='$inStroke' stroke-width='$inStrokeWidth'  />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function link($id, $x1,$y1,$x2,$y2,$stroke, $strokeWidth)
    {
        $r =  $strokeWidth;

        if($x1 > $x2)
        {
            $temp = $x1;
            $x1 = $x2;
            $x2 = $temp;
            $temp = $y1;
            $y1 = $y2;
            $y2 = $temp;
        }
        if($y1 > $y2)
        {
            $temp = $x1;
            $x1 = $x2;
            $x2 = $temp;
            $temp = $y1;
            $y1 = $y2;
            $y2 = $temp;
        }
        $top = $y1 - $r - $r/2;
        $left = $x1 - $r- $r/2;
        if($x1 > $x2) $left = $x2 - $r - $r/2;

        $height = $y2 - $y1 +3*$r;
        $width = $x2 - $x1  + 3*$r;
        if($width < 0) $width = -1 * $width;


        $x1 = $x1 - $left - $r/2; $x2 = $x2 - $left - $r/2;
        $y1 = $y1 - $top - $r/2; $y2 = $y2 - $top - $r/2;

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", "لینک", $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -$r/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", 0, $doc);

        $doc = $doc."<ellipse cx='$x1' cy='$y1' rx='$r' ry='$r' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<ellipse cx='$x2' cy='$y2' rx='$r' ry='$r' fill='$stroke' stroke='$stroke' stroke-width='$strokeWidth' />";

        $doc = $doc."<path d='M $x1 $y1 L $x2 $y2' fill='none' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($top + $height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($left + $width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($top + $height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($left + $width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($top + $height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($left + $width/2), $doc);
        return $doc;
    }
    public static function cloud($id, $title, $width, $height,$stroke, $strokeWidth, $fill,$text,$inStroke,$fontSize, $top, $left, $rotation)
    {
        if(empty($title)) $title = "ابر";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $w8 = $width / 8;
        $w28 = $width / 4;
        $w38 = 3*$width / 8;
        $w48 = $width / 2;
        $w58 = 5*$width / 8;
        $w68 = 6*$width / 8;
        $w78 = 7*$width / 8;

        $h6 = $height / 6;
        $h26 = $height / 3;
        $h36 = $height / 2;
        $h46 = 4*$height / 6;
        $h56 = 5*$height / 6;

        $points = "M $w8 $h6 Q $w28 0 $w38 $h6 Q $w48 0 $w58 $h6 Q $w68 0 $w78 $h6 Q $width $h26 $w78 $h36 Q $width $h46 $w78 $h56 Q $w68 $height $w58 $h56 Q $w48 $height $w38 $h56 Q $w28 $height $w8 $h56 Q 0 $h46 $w8 $h36 Q 0 $h26 $w8 $h6";
        $doc = $doc."<path d='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        if(!str_ends_with($fontSize,"px")) $fontSize = $fontSize."px";

        $top = $top + $height/2;
        $topText = $top.'px';
        $left = $left + $width /2;
        $leftText = $left."px";
        $doc = $doc."<span style='position:absolute; top:$topText; left: $leftText;  -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); font-size: $fontSize; color:$inStroke;'>$text</span>";

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($top - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($left - 8), $doc);
        return $doc;
    }
    public static function server($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "سرور";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $height = $height - 3*5;//gap
        $dh = $height/5;
        $y0 = 0;
        $y1 = $dh + 5;
        $y2 = 2*$dh + 10;
        $y3 = 3*$dh + 15;
        $y4 = 4*$dh + 15;

        $doc = $doc."<rect x='0' y='$y0' width='$width' height='$dh' rx='5' ry='5' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<rect x='0' y='$y1' width='$width' height='$dh' rx='5' ry='5' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<rect x='0' y='$y2' width='$width' height='$dh' rx='5' ry='5' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";
        $doc = $doc."<rect x='0' y='$y3' width='$width' height='$dh' rx='5' ry='5' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth' />";

        $w2 = $width/2;
        $dh2 = $dh /2;

        $px0 = $w2 - 5; $py0 = $y4;
        $px1 = $px0; $py1 = $py0 + $dh2;
        $px2 = 0; $py2 = $py1;
        $px3 = 0; $py3 = $py1 + $dh2;
        $px4 = $width; $py4 = $py3;
        $px5 = $width; $py5 = $py1;
        $px6 = $w2 + 5; $py6 = $py1;
        $px7 = $px6; $py7 = $py0;

        $points = "$px0,$py0 $px1,$py1 $px2,$py2 $px3,$py3 $px4,$py4 $px5,$py5 $px6,$py6 $px7,$py7";
        $doc = $doc."<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function computer($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "کامپیوتر";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $w3 = $width /3;
        $w23 = $width * 2/3;
        $h23 = $height *2/3;

        $x0 = $w3; $y0 = 0;
        $x1 = $width; $y1 = 0;
        $x2 = $width; $y2 = $h23;
        $x3 = $w23; $y3 = $height;
        $x4 = 0; $y4 = $height;
        $x5 = $w3; $y5 = $h23;

        $points = "$x0,$y0 $x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5";
        $doc = $doc."<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";
        $doc = $doc."<path d='M $w3 $h23 L $width $h23' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $dh = $height / 12;
        $gap = $w23/8;

        $y0 = $h23 + $dh; $x0 = self::getLinePointX($w3,$h23,0,$height,$y0)+$gap;
        $y1 = $h23 + $dh; $x1 = self::getLinePointX($width,$h23,$w23,$height,$y1)-$gap;
        $doc = $doc."<path d='M $x0 $y0 L $x1 $y1' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $y0 = $h23 + 2*$dh; $x0 = self::getLinePointX($w3,$h23,0,$height,$y0)+$gap;
        $y1 = $h23 + 2*$dh; $x1 = self::getLinePointX($width,$h23,$w23,$height,$y1)-$gap;
        $doc = $doc."<path d='M $x0 $y0 L $x1 $y1' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $y0 = $h23 + 3*$dh; $x0 = self::getLinePointX($w3,$h23,0,$height,$y0)+$gap;
        $y1 = $h23 + 3*$dh; $x1 = self::getLinePointX($width,$h23,$w23,$height,$y1)-$gap;
        $doc = $doc."<path d='M $x0 $y0 L $x1 $y1' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function dslam($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "DSLAM";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $w4 = $width /4;
        $w34 = $width * 3/4;
        $h3 = $height /3;
        $h23 = $height *2/3;


        $x0 = 0; $y0 = 0;
        $x1 = $w4; $y1 = 0;
        $x2 = $w34; $y2 = $h3;
        $x3 = $width; $y3 = $h3;
        $x4 = $width; $y4 = $h23;
        $x5 = $w34; $y5 = $h23;
        $x6 = $w4; $y6 = $height;
        $x7 = 0; $y7 = $height;

        $points = "$x0,$y0 $x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7";
        $doc = $doc."<polygon points='$points' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $dh = $height / 4;
        $h34 = $h3/4;
        $arrowLength = 2*$strokeWidth;
        if($arrowLength > 10) $arrowLength = 10;
        //arrows
        $x0 = $strokeWidth + 5;$y0 = $dh;
        $x00 = $w4; $y00 = $y0;
        $x000 = $w34; $y000 = $h3+$h34;
        $doc = $doc."<path d='M $x0 $y0 L $x00 $y00 L $x000 $y000' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";
        $ap = self::getPerpendicularLinePoints($x00,$y00,$x000,$y000,$x000-$arrowLength,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x000 $y000 L $ap[2] $ap[3]' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";


        $x1 = $x0; $y1 = 2*$dh;
        $x11 = $w34; $y11 = $y1;
        $doc = $doc."<path d='M $x1 $y1 L $x11 $y11' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";

        $x2 = $x0; $y2 = 3*$dh;
        $x22 = $w4; $y22 = $y2;
        $x222 = $w34; $y222 = $h23-$h34;
        $doc = $doc."<path d='M $x2 $y2 L $x22 $y22 L $x222 $y222' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";
        $ap = self::getPerpendicularLinePoints($x22,$y22,$x222,$y222,$x222-$arrowLength,$arrowLength);
        $doc = $doc."<path d='M $ap[0] $ap[1] L $x222 $y222 L $ap[2] $ap[3]' fill='$fill' stroke='$stroke' stroke-width='$strokeWidth'  />";



        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function wifi($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "WIFI";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;


        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }
    public static function spliter($id, $title, $width, $height,$stroke, $strokeWidth, $fill, $top, $left, $rotation)
    {
        if(empty($title)) $title = "Splitter";

        $doc = self::TOPHEADER;
        $doc = str_replace("ID_PARAM", $id, $doc);
        $doc = str_replace("OBJECT_TITLE", $title, $doc);
        $doc = str_replace("BCOLOR", "none", $doc);
        $doc = str_replace("WIDTH_PARAM", $width, $doc);
        $doc = str_replace("HEIGHT_PARAM", $height, $doc);
        $doc = str_replace("VIEW_START", -1*$strokeWidth/2, $doc);
        $doc = str_replace("VIEW_WIDTH", $width-$strokeWidth, $doc);
        $doc = str_replace("VIEW_HEIGHT", $height-$strokeWidth, $doc);
        $doc = str_replace("TOP_PARAM", $top, $doc);
        $doc = str_replace("LEFT_PARAM", $left, $doc);
        $doc = str_replace("DEGREE_PARAM", $rotation, $doc);

        $width = $width - 2*$strokeWidth;
        $height = $height - 2*$strokeWidth;

        $doc = $doc.self::BOTTOMTRAILER;
        $doc = str_replace("MOVE_TOP_PARAM", ($height/2 - 8), $doc);
        $doc = str_replace("MOVE_LEFT_PARAM", ($width/2 - 8), $doc);
        $doc = str_replace("RESIZE_H_TOP_PARAM", ($height/2), $doc);
        $doc = str_replace("RESIZE_H_LEFT_PARAM", ($width), $doc);
        $doc = str_replace("RESIZE_V_TOP_PARAM", ($height), $doc);
        $doc = str_replace("RESIZE_V_LEFT_PARAM", ($width/2), $doc);

        return $doc;
    }

}
