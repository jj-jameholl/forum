<?php
use yii\widgets\Pjax;
use yii\widgets\ListView;
use app\models\Comment;
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/11
 * Time: 下午7:06
 */
?>
<?php Pjax::begin(['id'=>'comments','enablePushState' => false,'options'=>['data-pjax'=>true],'linkSelector'=>false,])?>
<h4>共&nbsp;<em><?=Comment::count($id)?></em>&nbsp;条评论</h4>
<hr>
<?=ListView::widget([
    'id'=>'comment',
    'dataProvider'=>Comment::search($id),
    'itemView'=>'/article/_comment',
    'layout'=>'{items}{pager}',
    'pager'=>[
        'maxButtonCount'=>8,
    ],

]);?>
<div class="loading hidden"><img src="/1.gif"></div>
<div class="comment-form hidden">
    <?php
    $comment = new Comment();
    echo $this->render('/comment/_content',[
        'model'=>$comment,
        'id'=>$id,
    ]);
    ?>
</div>
<?php Pjax::end()?>


