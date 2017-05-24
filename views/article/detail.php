<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/6
 * Time: 下午12:23
 */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Comment;
use yii\widgets\Pjax;
$this->title = $article->article;

?>
<head>
<link rel="stylesheet" href="/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
<!--    <script type="text/javascript" src="/basic/webuploader-0.1.5/webuploader.js"></script>-->
<script src="/font/dist/js/rotate.js"></script>  
  <style>
        .img{
            height:43px;
            width:43px;
	    padding:1px;
            border-radius: 100px;
            border-collapse: separate;
            border:#eee 1px solid;

        }
        .img_comment{
            height:42px;
            width: 42px;
	    padding:1px;	
            border:#eee 1px solid;
            border-radius: 5px;
        }
        .img_comment_son{
            height:38px;
            width:38px;
            padding:1px;
            border:#eee 1px solid;
            border-radius: 5px;
        }
        .media-body{
            width:10000px;
        }
	.nothing{
	height:145px;
	margin-bottom:50px;
	border-bottom:#ccc 1px dashed;
}
	.btns{
	float:right;
	padding-top:100px;
}
	.tags{
	float:left;
	padding-top:75px;
	}
	.view_tag:hover{
        text-decoration:none;
	}
	.loading{
	text-align:center;
	}
	.info{
	color:#999;
	padding-top:20px;
	padding-bottom:20px;
	border-bottom:#ccc 1px dashed;
	}
	.content{
	margin-top:20px;
}
        </style>
</head>
<div class="container">
<div class="row">
    <div class="col-md-9">
        <ol class="breadcrumb">
        <li><a href="<?=Url::toRoute(['/article/index'])?>">首页</a></li>
        <li><a href="<?=Url::toRoute(['/article/index'])?>">文章列表</a></li>
        </ol>
        <div class="article">
        <div class="title">
        <h2><?=Html::encode($article->article)?></h2>
            <div class="info">
               <a href="<?=Url::toRoute(['/info/look','id'=>$user->id])?>"><img class="img" src="/uploads/avatar/<?=$user->id?>/<?=$user->photo?>" title=<?=$user->role?>&nbsp;: data-toggle="popover" data-trigger="hover" data-placement="right" data-content=<?=$user->sign?>></a>&nbsp;<?=$user->username?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-time"></span><?=date('Y-m-d H:i',$article->created)?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-pencil" ></span><?='评论:'.count($article->comment)?>&nbsp;&nbsp;
                <span class="glyphicon glyphicon-heart-empty" ></span>&nbsp;<?=$article->loves?>&nbsp;
            </div>
        </div>
            <div class="content">
            <?=HtmlPurifier::process($article->content);?>
            </div>
  	<div class="nothing">
	<div class="tags">
                <?php foreach(explode(" ",$article->tag) as $tag=>$value){?>
                <a class="view_tag" href="<?=Url::toRoute(['/article/search','find'=>$value]);?>">
        <span class="label label-<?php echo array_rand(['info'=>'','success'=>'','warning'=>'','primary'=>'','default'=>'','danger'=>'','my1'=>'','my2'=>'','my3'=>''],1)?>">
        <i class="glyphicon glyphicon-tag" aria-hidden="true"></i>
            <?= $value; ?>
            </span>
                </a>&nbsp;
                <?php }?>
                </div>
<?php if(Yii::$app->user->can('edit',['post'=>$article])){?>
<div class="btns">
	                    <button id="reedit" class="btn btn-info"  onclick="javascrtpt:window.location.href='<?=Url::toRoute(['/article/edit','article_id'=>$article->id])?>'"><span class="glyphicon glyphicon-repeat"></span>&nbsp;修改</button>
                    <button id="delete" class="btn btn-danger"  onclick="javascrtpt:window.location.href='<?=Url::toRoute(['/article/delete','article_id'=>$article->id])?>'"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</button>
</div>
<?php }?>
</div>

<!--        <div class="media">-->
<!--            <a class="pull-left" href="#">-->
<!--                <img class="media-object" data-src="../views/layouts/2.jpg/45x45">-->
<!--            </a>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">Media heading</h4>-->
<!--                ...-->
<!---->
<!--                <!-- Nested media object -->
<!--                <div class="media">-->
<!--                    ...-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <ul class="media-list">-->
<!--            <li class="media">-->
<!--                <a class="media-left" href="#">-->
<!--                    <img class="img" src="../views/layouts/2.jpg">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <a5 class="media-heading">小超仔</a5>-->
<!--                    <br>-->
<!---->
<!--                    <p>我最萌!</p>-->
<!---->
<!--                    <!-- Nested media object -->
<!--                    <div class="media">-->
<!--                        <a class="media-left" href="#">-->
<!--                            <img class="media-object" data-src="holder.js/40x40">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">詹詹</h4>-->
<!--                            <p>试一下效果怎么样</p>-->
<!--                </div>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                    <div class="media">-->
<!--                        <a class="media-left" href="#">-->
<!--                            <img class="media-object" data-src="holder.js/40x40">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">猪仔</h4>-->
<!--                            <p>爱你么么哒!</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                 </div>-->
<!--            </li>-->
<!--        </ul>-->
        <?php
        echo $this->render('/comment/commentlist',[
            'id'=>$article->id
        ]);
        ?>
        <br>
        <br>
        <h4>小猪仔快说话!</h4>
        <hr>
        <?php
        $comment = new Comment();
        echo $this->render('/comment/content',[
            'model'=>$comment,
            'id'=>$article->id,
            'user_id'=>$article->user_id,
            'title'=>$article->article,			
]);
        ?>
<!--        --><?php
//        $comment = new Comment();
//        echo $this->render('/comment/_content',[
//            'model'=>$comment,
//        ]);
//        ?>
<!--        <form action='index.php?r=comment/create&article_id=3' method="get">-->
<!--            <textarea name="content" data-provide="markdown" data-savable="false" data-language="zh" rows="8"></textarea>-->
<!--            <br><button id="mark" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;提交</button>-->
<!--        </form>-->
<!--        <hr>-->
    </div>
</div>
</div>
</div>
<script>
    $(function (){
        $("[data-toggle='popover']").popover();
    });
</script>
<script type="text/javascript">
    var tipsi;
    $("#reedit").hover(function(){
        tipsi = layer.tips('点击修改文章',this,{tips:[4,'black'],time:0});
    },function(){
        layer.close(tipsi);
    });
    $("#delete").hover(function(){
        tipsi = layer.tips('确认删除该文章?',this,{tips:[2,'black'],time:0});
    },function(){
        layer.close(tipsi);
    });
</script>
<script>
$("document").ready(function(){
        $('.img').rotate({
            duration:600,
            bind : {
                mouseover : function(){
                    $(this).rotate({animateTo: 360});
                }, mouseout : function(){
                    $(this).rotate({animateTo: 0});
                }
            }
        });
    });
</script>
