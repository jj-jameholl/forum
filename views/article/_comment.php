<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/8
 * Time: 下午9:16
 */
use yii\widgets\ListView;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
$this->registerJs('
    $(".reply").click(function(){
    $(".comment-form").removeClass("hidden");
    $(".comment-form").appendTo($(this).parent());
    $(".comment-form").find("input").filter(".input1").val("");
	$(".comment-form").find("input").filter(".input2").val("");
	$(".comment-form").find("input").filter(".input1").val($(this).parent().attr("class").split(" ")[1]);
    $(".comment-form").find("input").filter(".input2").val($(this).parent().attr("class").split(" ")[0]);
   $(".comment-form").find("input").filter(".input3").val($("#ar_id").val());	
    });
	
   //点赞
    $(".thumb-up").click(function(){
      var mythis = $(this);
        $.ajax({
        url:"'.Url::toRoute(["/comment/thumbup"]).'",
        data:{"user_id":'.Yii::$app->user->identity->id.',"comment_id":$(this).parent().parent().attr("class")},
//       beforeSend:function(){
//	        $(".loading").removeClass("hidden");
// 	      $(".loading").appendTo(mythis);
//	},
//	complete:function(){
//	        $(".loading").addClass("hidden");
//	},
	 success:function(data){
        if(data=="done"){
        mythis.find("em").text(Number(mythis.find("em").text())+1);
        mythis.css("color","red");
        mythis.find("em").css("color","red"); 
        }else if(data =="short"){
        layer.msg("别急!等一会再来赞!");
        }else{
        alert(data);
        }
        }
        });
    });
    
    //点踩
        $(".thumb-down").click(function(){
        var mythis = $(this);
        $.ajax({
        url:"'.Url::toRoute(["/comment/thumbdown"]).'",
        data:{"user_id":'.Yii::$app->user->identity->id.',"comment_id":$(this).parent().parent().attr("class")},
  //             beforeSend:function(){
  //      $(".loading").removeClass("hidden");
  //      $(".loading").appendTo(mythis);
  //      },
  //      complete:function(){
  //      $(".loading").addClass("hidden");
  //      },
	 success:function(data){
        if(data=="done"){
        mythis.find("em").text(Number(mythis.find("em").text())+1);
        mythis.css("color","red");
        mythis.find("em").css("color","red"); 
        }else if(data =="short"){
        layer.msg("踩过了还要踩?! 一会踩吧...");
        }else{
        alert(data);
        }
        }
        });
    });	
');

$dataprovider_son = $model->search_son($model->id);
?>
<head>
    <script src="/font/dist/js/rotate.js"></script>
    <style>
    a{
    color:#337ab7;
    }
    .jubao{
        float:right;
    }
    .media-heading{
        color:#999
    }
    .hint{
        color:#999;
        font-size: 12px;
    }
    em{
        color:red;
    }
        .hr2{
            margin-top: 2px;
        }
        .up_down{
            float:right;
            color:#999;
            font-size:12px;
        }
	        .thumb-up-num,.thumb-down-num{
            color:#999;
        }
        .thumb-up,.thumb-down{
            cursor: pointer;
        }
	hr{
	margin-top:5px;
	margin-bottom:10px;
}
    </style>

    </head>
<div class="media">
<a class="media-left" href="<?=Url::toRoute(['/info/look','id'=>$model->user_id])?>">
<img src="/uploads/avatar/<?=$model->user_id?>/<?=$model->img?>" class="img_comment" title=<?=User::findrolebyid($model->user_id)?>&nbsp;: data-toggle="popover" data-trigger="hover" data-placement="right" data-content=<?=User::findsignbyid($model->user_id)?>>
</a>
    <div class="media-body">
        <div class="media-heading">
            <a href="<?=Url::toRoute(['/info/look','id'=>$model->user_id])?>"><?=User::findnamebyid($model->user_id)?></a>&nbsp;&nbsp;&nbsp;评论于<?=date('Y-m-d H:i',$model->createdTime)?><a class="jubao" href=""><span class="glyphicon glyphicon-envelope"></span>举报</a>
        </div>
            <p><?=yii\helpers\Markdown::process($model->content)?></p>
        <?php if($dataprovider_son->getTotalCount()!=0){?>
            <div class="hint">共&nbsp;<em><?=$dataprovider_son->getTotalCount()?></em>&nbsp;条回复</div>
        <?=ListView::widget([
            'id'=>$model->id,
            'dataProvider'=>$dataprovider_son,
            'itemView'=>'_comment_son',
            'layout'=>'{items}{pager}',
            'pager'=>[
                'maxButtonCount'=>8,
            ],
        ]);?>
        <?php }?>
        <div class="<?=$model->id?> <?=\app\models\Comment::findwriterbyid($model->id)?>">
    <a href="javascript:;" class="reply"><span class="glyphicon glyphicon-share-alt"></span>回复</a><div class="up_down"><div class="thumb-up"style="float:left"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<em class="thumb-up-num"><?=$model->up?></em></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="thumb-down"style="float:right"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<em class="thumb-down-num"><?=$model->down?></em></div></div>
    </div>
        </div>
    <script>
        $(function (){
            $("[data-toggle='popover']").popover();
        });
    </script>
</div>
<hr class="hr2">
<script>
    $("document").ready(function(){
        $('.img_comment_son').rotate({
            duration:1000,
            bind : {
                mouseover : function(){
                    $(this).rotate({animateTo: 360});
                }, mouseout : function(){
                    $(this).rotate({animateTo: 0});
                }
            }
        });
        $('.img_comment').rotate({
            duration:1000,
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


