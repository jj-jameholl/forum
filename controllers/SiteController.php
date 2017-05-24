<?php

namespace app\controllers;

use Yii;
use yii\debug\models\search\Log;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Html;
use yii\web\IdentityInterface;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
	    if (!empty($_POST)&&$_POST['username']!=null) {
                $model = new LoginForm();
                $model->username = $_POST['username'];
		$model->password = $_POST['password'];
                $model->rememberMe = $_POST['rememberMe'];
		 if(!$model->login()){
            Yii::$app->getSession()->setFlash('error','用户名或密码错误!!!');
        }
else{
return $this->redirect(['article/index']);
}
}
             return $this->render('login');
    
}
    /**
     * Login action.
     *
     * @return str     */


    public function actionCity($pid,$typeid=0){
        $model = new LoginForm();
        $model = $model->getCityList($pid);

        if($typeid == 1){$aa="--请选择市--";}else if($typeid == 2 && $model){$aa="--请选择区--";}

        echo Html::tag('option',$aa, ['value'=>'empty']) ;

        foreach($model as $value=>$name)
        {
            echo Html::tag('option',Html::encode($name),array('value'=>$value));
        }
    }

/*    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
         else if($model->load(Yii::$app->request->post())){
             Yii::$app->getSession()->setFlash('error','用户名或密码错误!!');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return Action
     */
    public function actionLogin()
    {
        if (!empty($_POST)&&$_POST['username']!=null) {
		$model = new LoginForm();
		$model->username = $_POST['username'];
		$model->password = $_POST['password'];
		$model->rememberMe = $_POST['rememberMe'];
		if(!$model->login()){
            Yii::$app->getSession()->setFlash('error','用户名或密码错误!!!');
        }
	else{
	return $this->redirect(['/article/index']);
}
}
	return $this->render('login');
      

    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = new LoginForm();
        return $this->render('about',[
            'model'=>$model,
        ]);
    }
}
