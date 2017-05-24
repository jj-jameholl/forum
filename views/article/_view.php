<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/5
 * Time: 下午7:36
 */
use app\models\User;
use app\models\Comment;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<head>
<style>
.info{
color:#999;
}
</style>
    <link rel="stylesheet" href="/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
    <!--    <script type="text/javascript" src="/basic/webuploader-0.1.5/webuploader.js"></script>-->
    </head>
<div class="Article">
<div class="Title">
    <h4><a href="<?=$model->url;?>"><?=Html::encode($model->article);?></a></h4>
    <div class="info">
    <span class="glyphicon glyphicon-user" ></span>&nbsp;<em><?=Html::encode(User::findnamebyid($model->user_id));?></em>&nbsp;&nbsp;|&nbsp;
    <span class="glyphicon glyphicon-time" ></span>&nbsp;<em><?=date('Y-m-d H:i',$model->created);?></em>&nbsp;&nbsp;|&nbsp;
    <span class="glyphicon glyphicon-pencil" ></span><em><?='评论:'.count($model->comment)?></em>&nbsp;&nbsp;|&nbsp;
    <span class="glyphicon glyphicon-heart" ></span>&nbsp;<em><?=$model->loves?></em>&nbsp;&nbsp;
    </div>
    </div>
    <br>
    <div class="content">
     <?=mb_substr(strip_tags($model->content),0,140,'utf-8')?>
     <?=mb_strlen(strip_tags($model->content))>140?'.......':'';?>
</div>
    <br>
    <div class="nav">
	<?php foreach(explode(" ",$model->tag) as $tag=>$value){?>
	<a class="view_tag" href="<?=Url::toRoute(['/article/search','find'=>$value])?>">
	<span class="label label-<?php echo array_rand(['my4'=>'','my1'=>'','my2'=>'','my3'=>'','info'=>'','success'=>'','warning'=>'','primary'=>'','default'=>'','danger'=>''],1)?>">
        <i class="glyphicon glyphicon-tag" aria-hidden="true"></i>
        <?= $value; ?>
	</span>
</a>&nbsp;
	<?php }?>
        </div>
</div>
<hr>
