<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/25
 * Time: 下午10:17
 */
use app\models\User;
use yii\helpers\Url;
$this->registerJs('
$(".thumb-up").click(function(){
      var mythis = $(this);
        $.ajax({
        url:"'.Url::toRoute(["/article/thumbup"]).'",
        data:{"user_id":'.Yii::$app->user->identity->id.',"note_id":$(this).parent().parent().attr("class")},
       //         beforeSend:function(){
       // $(".loading").removeClass("hidden");
       // $(".loading").appendTo(mythis);
       // },
       // complete:function(){
       // $(".loading").addClass("hidden");
      //  },
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
        url:"'.Url::toRoute(["/article/thumbdown"]).'",
        data:{"user_id":'.Yii::$app->user->identity->id.',"note_id":$(this).parent().parent().attr("class")},
        //       beforeSend:function(){
       // $(".loading").removeClass("hidden");
       // $(".loading").appendTo(mythis);
       // },
      //  complete:function(){
      //  $(".loading").addClass("hidden");
      //  },
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
?>
<style>
.img_note{
    width:38px;
    height:38px;
    border:1px #eee solid;
    padding:1px;
    border-radius: 5px;
}
    .up_down{
        float:right;
        color:#999;
        font-size:12px;
    }
    .note-font{
        font-size:12px;
    }
    .note-hr{
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .media{
        margin-top: 6px;
    }
    .media-body{
        width:100%;
    }
.thumb-up-num,.thumb-down-num{
    color:#999;
}
.thumb-up,.thumb-down{
    cursor: pointer;
}
	.time{
	float:left;
	color:#999;
	font-size:12px;
}
</style>
<div class="media">
<div class="media-left">
   <a href="<?=Url::toRoute(['/info/look','id'=>$model->user_id])?>"><img src="/uploads/avatar/<?=$model->user_id?>/<?=User::findimgbyid($model->user_id)?>" class="img_note" title=<?=User::findnamebyid($model->user_id)?>&nbsp;: data-toggle="popover" data-trigger="hover" data-placement="left" data-content=<?=User::findsignbyid($model->user_id)?>></a>
</div>
    <div class="media-body">
    <div class="media-heading note-font">
        <a href="<?=Url::toRoute(['info/look','id'=>$model->user_id])?>"><?=User::findnamebyid($model->user_id)?>&nbsp;:</a>&nbsp;<?=$model->content?>
    </div>
      <div class="<?=$model->id?>"><div class='time'><?=date('Y-m-d H:i',$model->createdtime+8*3600)?></div> <div class="up_down"><div class="thumb-up" style="float:left"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<em class="thumb-up-num"><?=$model->up?></em></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="thumb-down" style="float:right"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<em class="thumb-down-num"><?=$model->down?></em></div></div>
    </div>
</div>
</div>
<hr class="note-hr">

