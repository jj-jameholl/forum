<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/25
 * Time: 下午10:17
 */
use app\models\User;
use yii\helpers\Url;
?>
<style>
.img_note{
    width:35px;
    height:35px;
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
        margin-top: 3px;
        margin-bottom: 3px;
    }
    .media{
        margin-top: 6px;
    }
    .media-body{
        width:100%;
    }
</style>
<div class="media">
<div class="media-left">
    <img src="/lovestory/web/uploads/avatar/<?=$model->user_id?>/<?=User::findimgbyid($model->user_id)?>" class="img_note">
</div>
    <div class="media-body">
    <div class="media-heading note-font">
        <a href="<?=Url::toRoute(['info/look','id'=>$model->user_id])?>"><?=User::findnamebyid($model->user_id)?>&nbsp;:</a>&nbsp;<?=$model->content?>
    </div>
        <div class="up_down"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<?=$model->up?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<?=$model->down?></div>
    </div>
</div>
<hr class="note-hr">

