<?php
use yii\helpers\Url;
?>
<style>
    .log{
        padding-top: 10px;
        padding-bottom: 10px;

    }
    .image1 {
        margin-top: -2px;
    }
    .pagination > li > a, .pagination > li:first-child > span, .pagination > li:last-child > a, .pagination > li:last-child > span, .pagination > li:first-child > a{
        margin-left: 8px;
        border-radius: 20px;
        background-color:#eee ;
    }
    .pagination >.active > a {
        background-color: #1cd388;
    }
    .pagination > .active > a:hover{
        background-color: #1abc9c;
    }
    .pagination > li > a:hover{
        background-color: #f5f5f5;
    }
   .basic-div > a {
	color:#34495e;
}	
</style>
<div class="basic-div">
    <?php if(empty($model->comment_id)){?>
    <a href="<?=Url::toRoute(['/info/look','id'=>$model->fuser->id])?>"><img class="image image1" src="/uploads/avatar/<?=$model->fuser->id?>/<?=$model->fuser->photo?>"></a> <a href="<?=Url::toRoute(['/article/detail','id'=>$model->article_id])?>"><?=$model->fuser->username.'评论您的文章《'.$model->article->article.'》: '.$model->content;?></a>
    <?php }else{?>
    <a href="<?=Url::toRoute(['/info/look','id'=>$model->fuser->id])?>"><img class="image image1" src="/uploads/avatar/<?=$model->fuser->id?>/<?=$model->fuser->photo?>"></a> <a href="<?=Url::toRoute(['/article/detail','id'=>$model->article_id])?>"><?=$model->fuser->username.'在《'.$model->article->article.'》回复您的评论: '.$model->content;?></a>
    <?php }?>
</div>
