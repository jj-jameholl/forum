<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/8
 * Time: 下午11:04
 */
use yii\helpers\Url;
use app\models\User;
$this->registerJs('
    $(".reply_two").click(function(){
    $(".comment-form").removeClass("hidden");
    $(".comment-form").appendTo($(this).parent().parent().parent());
	$(".comment-form").find("input").filter(".input1").val($(this).parent().attr("class"));
//    $(".comment-form").closest(".list-view").attr("id");
    $(".comment-form").find("input").filter(".input2").val($(this).closest(".list-view").attr("id"));
    });
');
?>
<head>
    <style>
        a{
            color:#337ab7;
        }
        .media-heading{
            color:#999;
            font-size: 50%;
        }
	.media{
	margin-top:5px;
}
        .hr1{
            margin-top: 2px;
	    margin-bottom:5px;
        }
        .reply_two{
            float:right;
        }
    </style>
</head>
<input class="yes" type="hidden" value="<?=$model->username?>">
<hr class="hr1">
<div class="media">
<div class="media-left">
   <a href="<?=Url::toRoute(['/info/look','id'=>$model->user_id])?>"><img href="" src="/uploads/avatar/<?=$model->user_id?>/<?=$model->img?>" class="img_comment_son" title=<?=User::findrolebyid($model->user_id)?>&nbsp;: data-toggle="popover" data-trigger="hover" data-placement="right" data-content=<?=User::findsignbyid($model->user_id)?>></a>
</div>
    <div class="media-body">
    <div class="media-heading">
        <div class="<?=$model->user_id?>">
        <a href="<?=Url::toRoute(['/info/look','id'=>$model->user_id])?>"><?=User::findnamebyid($model->user_id)?></a>&nbsp;&nbsp;&nbsp;评论于<?=date('Y-m-d H:i',($model->createdTime))?><a class="reply_two" href="javascript:;"><span class="glyphicon glyphicon-share-alt"></span>回复</a>
        </div>
        </div>
            <p>
                <?php if($model->towho != null) {?>
                        <a href="<?=Url::toRoute(['/info/look','id'=>$model->towho])?>">@<?=User::findnamebyid($model->towho)?></a>
                    <?php }?>
                <?=$model->content?>
            </p>
            </div>
</div>

