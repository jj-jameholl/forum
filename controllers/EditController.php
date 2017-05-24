<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/10/30
 * Time: 上午11:13
 */
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\IdentityInterface;
use app\models\User;


use yii\web\Controller;

class EditController extends Controller{
    public $enableCsrfValidation = false;

    public function behaviors(){
        return [
//            'access'=>[
//                'class'=>AccessControl::className(),
//                'only'=>['index'],
//                'rules'=>[
//                    'actions' => ['index'],
//                    'allow' => true,
//                    'roles' => ['@'],
//                ],
//            ]
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex(){
        $model = new User();
        return $this->render('index',['model'=>$model]);
    }

}
