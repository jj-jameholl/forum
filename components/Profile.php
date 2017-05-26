<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/5/26
 * Time: 下午4:10
 */
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;

class Profile extends Widget{
    public $userid;
    public function init(){
        parent::init();
    }

    public function run(){
        $user = User::findOne(['id'=>$this->userid]);
            return $this->render('@app/views/site/_profile',['user'=>$user]);
    }
}
