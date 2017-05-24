<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/5
 * Time: 下午7:00
 */
use app\components\TagWidgets;
use app\models\Tags;
use yii\widgets\ListView;
use yii\Helpers\Html;
use app\models\Note;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\User;
$this->title = 'Love Story';
 $this->registerJs(
    '$("document").ready(function(){
//        $("#commentone").on("pjax:end", function() {
//             //$.pjax.reload({container:"#comments"});  //Reload GridView
//        });
           // $("#try").click(function(){
           // $.pjax.reload("#notess");

         //   });
            $("#note-go").click(function(){
	  // alert("dsad");
var data1 = {"kind":"note","id":"'.Yii::$app->user->identity->id.'","content":$("#note-id").val(),"photo":"'.User::findimgbyid(Yii::$app->user->identity->id).'"};
         //  $.pjax.reload({container:"#notes"});
	 ws.send(JSON.stringify(data1));
            $.ajax({
                url:"'.Url::toRoute(["/article/note"]).'",
                data:{"content":$("#note-id").val()},
                success:function(data){
                    if(data==1){
		   $("#note-id").val("");
                    $.pjax.reload({container:"#notess",timeout:8000});
                    }
                    else{
                    alert("error");
                    }
                }
            });
            });
    });'

);
?>
<head>
<script src="/font/dist/js/rotate.js"></script>
</head>
<style>
   .note{
       border:1px #eee solid;
       box-shadow:#eee 0px 0px 5px ;
       height:400px;
	border-radius:8px;
   }
    .note-body{
        height:72%;
        overflow: auto;
        padding-top: 0px;
    }
    .panel-default{
        height:100%;
    }
    .input-group-note{
        padding-top: 5px;
        width:100%;
    }
    .input-hr{
        margin-bottom: 0px;
        margin-top: 8px;
    }
    .form-control{
        padding-left: 10px;
    }
    .btn-note{
	width:23%;
        float:left;
	border-radius:0px;
	border-top-right-radius:3px;
	border-bottom-right-radius:3px;
    }
	    .tags{
        margin-top: 50px;
        height:400px;
	border:#eee 1px solid;
	box-shadow:#eee 0px 0px 5px;
	border-radius:8px;
    }
	    .view_tag:hover{
        text-decoration:none;
    }
</style>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <ol class="breadcrumb">
            <li><a href="<?=Url::toRoute(['/article/index'])?>">首页</a></li>
            	<li><a href="<?=Url::toRoute(['/article/index'])?>">文章列表</a></li>
		 </ol>
 <?=ListView::widget([
                'id'=>'ArticleList',
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                'layout'=>'{items}{pager}',
                'pager'=>[
                    'maxButtonCount'=>6,
                ]
            ]);?>
        </div>
        <div class="col-md-3 col-sm-3 col-md-offset-1 col-sm-offset-1">
       <div class="row note">
	 <div class="panel panel-default">
        <div class="panel-heading">
            <p>来了就留下两句呗&nbsp;&nbsp;<i class="glyphicon glyphicon-send"></i></p>
        </div>
           <!--<?php $form = ActiveForm::begin([
                'options'=>['data-pjax'=>'true'],
            ]);?>-->
            <div class="input-group input-note input-group-note">
            <input type="text" class="form-control" id="note-id" placeholder="写什么呢..."  name="note" style="width:73%;margin-left:2%;font-size:12px">
                <span><input type="button" class="btn btn-primary btn-note" id="note-go" value="留言"></span>
            </div>
           <!-- <?php ActiveForm::end()?>-->
            <br>
		<div class="panel-body note-body">
		 <?php 
            $dependency = [
                'class'=>'yii\caching\DbDependency',
                'sql'=>'select max(createdtime) from Note',
            ];
            if($this->beginCache('note',['dependency'=>$dependency])) {
	Pjax::begin(['id'=>'notess','enablePushState' => false,'options'=>['data-pjax'=>true],'linkSelector'=>false])?>
      		<?=ListView::widget([
                    'id'=>'note',
                    'dataProvider'=>Note::findnote(),
                    'itemView'=>'/note/_note',
                    'layout'=>'{items}',
                ]);
   ?>
		<script>
    $(function (){
        $("[data-toggle='popover']").popover();
	        $("document").ready(function(){
            $('.img_note').rotate({
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
 });
</script>
            <?php Pjax::end();
	            $this->endCache();}
?>
	</div>
        </div>
	</div>
	            <div class="row tags">
                <div class="panel panel-default">
                <div class="panel-heading">
                <p><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;热门标签</p>
                </div>
                    <div class="panel-body">
                    <?=TagWidgets::widget(['tags'=>Tags::findtags()])?>
                </div>
                    </div>
                </div>
        </div>
    </div>
<div class="loading hidden"><img src="/1.gif"></div>
