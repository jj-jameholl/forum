<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/9
 * Time: 下午11:24
 */
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Comment;
use app\models\User;
use app\models\Updown;
error_reporting (E_ALL & ~E_NOTICE);
class CommentController extends Controller{
public $enableCsrfValidation = false;   
 public function behaviors()
    {
        return[];
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
    public function actionCreate(){
        $model = new Comment();
        $model->load(Yii::$app->request->post());
        $model->username = Yii::$app->user->identity->username;
        $model->user_id = Yii::$app->user->identity->id;
       $email = User::findemailbyid($_GET['author']);
	 $model->article_id = $_GET['id'];
        $model->createdTime = time()+8*3600;
	$model->send_email($model->username,$email);
 	if($model->save()){
            return $this->renderAjax('/comment/content',['model'=>$model,'id'=>$model->article_id]);
        }
    }
    public function actionCreateson(){
        $model = new Comment();
 //       $model->load(Yii::$app->request->post());
	   $model->content = $_GET['content'];
        $model->username = Yii::$app->user->identity->username;
        $model->user_id = Yii::$app->user->identity->id;
//        $model->parent_id = $_POST['id'];
        $model->parent_id = $_GET['id'];
        if(isset($_GET['towho'])){
            $model->towho = $_GET['towho'];
        }
        $model->createdTime = time()+8*3600;
        if($model->save()){
              //  echo "1232";
//            return $this->renderAjax('/comment/_content',['model'=>$model]);
//            return $this->renderAjax('commentlist',['id'=>$_GET['article_id']]);
            echo "1";

        }
        else{
            print_r($model);
        }
    }

       public function actionThumbup(){
        $comment_id = $_GET["comment_id"];
        $user_id = $_GET["user_id"];
        $new_updown = new Updown();
        $comment = Comment::find()->where(['id'=>$comment_id])->one();
        $updown = Updown::find()->where(['comment_id'=>$comment_id,'user_id'=>$user_id])->orderBy('createdtime DESC')->one();
        if($updown){
            if(time()+8*3600-$updown->createdtime > 60){
                $comment->up=$comment->up+1;
                $comment->save();
                $updown->type = 0;
                $updown->createdtime = time()+8*3600;
                if($updown->save()){
                    echo "done";
                    exit;
                }else{
                    echo "wrong";
                    exit;
                }
            }else{
                echo "short";
                exit;
            }

        }else {
            $comment->up=$comment->up+1;
            $comment->save();
            $new_updown->type = 0;
            $new_updown->user_id = $user_id;
            $new_updown->comment_id = $comment_id;
            $new_updown->createdtime = time()+8*3600;
            if($new_updown->save()){
                echo "done";
                exit;
            }else{
                echo $user_id.$comment_id;
                exit;
            }
        }
    }
    public function actionThumbdown(){
        $comment_id = $_GET["comment_id"];
        $user_id = $_GET["user_id"];
        $new_updown = new Updown();
        $comment = Comment::find()->where(['id'=>$comment_id])->one();
        $updown = Updown::find()->where(['comment_id'=>$comment_id,'user_id'=>$user_id])->orderBy('createdtime DESC')->one();
        if($updown){
            if(time()+8*3600-$updown->createdtime > 60){
                $comment->down=$comment->down+1;
                $comment->save();
                $updown->type = 1;
                $updown->createdtime = time()+8*3600;
                if($updown->save()){
                    echo "done";
                    exit;
                }else{
                    echo "wrong";
                    exit;
                }
            }else{
                echo "short";
                exit;
            }

        }else {
            $comment->down=$comment->down+1;
            $comment->save();
            $new_updown->type = 0;
            $new_updown->user_id = $user_id;
            $new_updown->comment_id = $comment_id;
            $new_updown->createdtime = time()+8*3600;
            if($new_updown->save()){
                echo "done";
                exit;
            }else{
                echo $user_id.$comment_id;
                exit;
            }
        }
    }
}

