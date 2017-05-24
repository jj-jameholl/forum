<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class TagWidgets extends Widget
{
    public $tags;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $tagString='';
        //fontstyle 用来显示不同Tag的颜色，比如<h6>用"danger"的底色
        $fontStyle=array("10"=>"my4","9"=>"danger","8"=>"info","7"=>"warning","6"=>"primary","2"=>"success","5"=>"my1","3"=>"my3","4"=>"my2");

        foreach($this->tags as $tag=>$weight)
        {
            $tagString.='<a class="view_tag" href="'.Url::toRoute(['/article/search','find'=>$tag]).'">'.
                ' <h'.$weight.' style="display: inline-block;"><span class="label label-'.$fontStyle[rand(2,10)].'">'.$tag.'</span></h'.$weight.'></a>';
        }
        return $tagString;
    }
}
