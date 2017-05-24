<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2016/11/19
 * Time: 下午11:29
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\Url;
?>
<style>
    .leff{
        border:1px #eee solid;
        box-shadow: #eee 0px 0px 5px;
        height:300px;
	border-radius:5px;
    }
	.left-down{
        border:1px #eee solid;
        box-shadow: #eee 0px 0px 5px;
        height:auto;
	border-radius:5px;
    }
	    .panel-default{
        height:100%;
	margin-bottom:0px;
    }
    ul{
        padding-left: 0px;
    }
    .profile{
        margin-bottom: 10px;
        margin-top: 10px;
    }
    label{
        margin-right: 0px;
    }
    .form-group{
        margin-left: 0px;
    }
    .righh{
        margin-left: 20px;
        height:auto;
    }
    .head-photo{
        height:60%;
        width:100%;
        padding-left:1px;
    }
    .level{
        height:14%;
        width:100%;
        padding-top: 10px;
        /*border:1px #eee solid;*/
    }
    .fen{
        margin-top: 0px;
        margin-bottom: 0px;
        width:90%;
        border-top: #ddd 1px solid;
    }
    .down-left{
        width:49%;
        height:100%;
        float: left;
        border-right:1px #eee solid;
    }
    .down-right{
        width:49%;
        height:100%;
        float: left;
    }
    .down{
    height:20%;
    }
    .font{
        font-size: 150%;
        font-family: 'Droid Sans Mono', 'CPMono_v07 Bold', 'Droid Sans';
        color: red;
    }
	.tab-pane{
padding-left:10px;
}
	.img{
        height:100%;
        width:100%;
        padding:1px;
	border:1px #eee solid;
        border-radius: 5px;
    }
    .register-div{
        width: 100%;
        height: 100%;
        border: 1px #16a085 dashed;
        border-radius: 5px;
        margin-top: 20px;
	padding:10px;
    }
    .basic-div{
        width: 100%;
        height: 100%;
        border: 1px #16a085 dashed;
        border-radius: 5px;
        margin-top: 20px;
        padding:10px;
    }
	.lefttwo{
margin-left:20px;
}
    </style>
<div class="container">
<div class="col-sm-2">
<div class="row leff">
 <?php if($user->id == Yii::$app->user->identity->id){?>
    <div class="head-photo" id="head-photo">
        <?= \hyii2\avatar\AvatarWidget::widget(['imageUrl'=>'/uploads/avatar/'.$user->id.'/'.$user->photo]); ?>
    </div>
        <?php }else{?>
    <div class="head-photo">
    <img class="img" src="/uploads/avatar/<?=$user->id?>/<?=$user->photo?>">
        </div>
            <?php }?>
    <div class="level">

        <center><marquee scrollamount="4" width="100%" height="30"><?=$user->sign?></marquee></center> </div>
    <hr class="fen">
    <div class="down">
    <div class="down-left">
        <center><h4>魅力值</h4></center>
        <center><p3 class="font">999</p3></center>
        </div>
    <div class="down-right">
        <center><h4>等级</h4></center>
        <center><p3 class="font">99</p3></center>
    </div>
        </div>
</div>
    <hr>
    <div class="row left-down">
	    <div class="panel panel-default">
    <div class="panel-heading">
    <center>个人信息</center>
    </div>
        <div class="panel-body">
        <ul style="list-style-type:none">
            <li><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?=$user->username?><li>
            <hr class="profile">
            <li><i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?=date('Y-m-d H:i',$user->createdtime)?></li>
            <hr class="profile">
            <li><i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;&nbsp;&nbsp;999</li>
            <hr class="profile">
            <li><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?=$user->city?></li>
            <hr class="profile">
            <li><i class="glyphicon glyphicon glyphicon-flag"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?=$user->role?></li>
            </ul>
        </div>
    </div>       
</div>
</div>
    &nbsp;
    <div class="col-md-7 righh">
    <div class="row">
            <ul class="nav nav-tabs" role="tablist">
           <?php if($user->id == Yii::$app->user->identity->id){?>
	    <li role="presentation" class="active"><a href="#done" data-toggle="tab">我的动态</a></li>
		            <?php }else{?>
                <li role="presentation" class="active"><a href="#done" data-toggle="tab">他的动态</a></li>
            <?php }?>
            <li role="presentation"><a href="#basic" data-toggle="tab">基本信息</a></li>
                      <?php if($user->id == Yii::$app->user->identity->id){?>
            <li role="presentation"><a href="#like" data-toggle="tab">我的收藏</a></li>
            <li role="presentation"><a href="#register" data-toggle="tab">帮助注册</a></li>
	     <?php }else{?>
            <li role="presentation"><a href="#article" data-toggle="tab">他的文章</a></li>
            <?php }?>
        </ul>
        <div id="mytabs" class="tab-content">
            <div id="done" class="tab-pane fade in active">
                <?=ListView::widget([
                    'id'=>'log',
                    'dataProvider'=>$user->log,
                    'itemView'=>'/info/_log',
                    //'layout'=>'{items}',
                    'summary'=>false,
                ])?>           
 </div>
            <div class="tab-pane fade" id="basic" style="padding-left:0px">
		<div class="basic-div" style="padding-top:0px;background-color:#f0f8ff">          
          <?php $form=ActiveForm::begin([
                'id'=>'info',
                'options'=>['class'=>'form-horizontal'],
                'fieldConfig'=>[
                    'template'=>"<div class='col-sm-2'>{label}</div><div class='col-sm-6'>{input}</div><div class='col-sm-2 lefttwo'>{error}</div>",
                ],
                'action'=>['/info/edit','user_id'=>$user->id],
                'method'=>'post',
            ])?>
            <br>
	     <?php if($user->id != Yii::$app->user->identity->id){?>
                <fieldset disabled>
                <?php }?>
            <?=$form->field($user,'username')->textInput()?>
            <?=$form->field($user,'sign')->textInput()?>
            <?=$form->field($user,'email')->textInput()?>
            <?=$form->field($user,'tel')->textInput()?>
            <?=$form->field($user,'city')->textInput()?>
            <?=$form->field($user,'newpass')->passwordInput()?>
            <?=$form->field($user,'repass')->passwordInput()?>

                <?=Html::submitButton('确认修改',['class'=>'btn btn-success'])?>
                           <?php if($user->id != Yii::$app->user->identity->id){?>
                   </fieldset>
                <?php }?> 
	    <?php ActiveForm::end()?>
		 </div>
</div>
            <div class="tab-pane fade" id="like">
            <h2>我收藏的文章</h2>
            </div>
	                <div class="tab-pane fade" id="article">
                <h2>该用户的所有文章</h2>
            </div>
            <div class="tab-pane fade" id="register" style="padding-left:0px;background-color:#f0f8ff">
            <div class="register-div">
                <?php $form=ActiveForm::begin([
                    'options'=>['class'=>'form-horizontal'],
                    'fieldConfig'=>[
                        'template'=>"<div class='col-sm-1'>{label}</div><div class='col-sm-6'>{input}</div><div class='col-sm-2 lefttwo'>{error}</div>",
                    ],
                    'action'=>['info/create'],
                    'method'=>'post',
                ])?>
                                <?=$form->field($user,'username')->textInput(['value'=>''])?>
                                <?=$form->field($user,'newpass')->passwordInput(['id'=>'password'])?>
                                <?=$form->field($user,'email')->textInput(['value'=>''])?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resure" id="passpass">确认注册</button>
                                    <div class="modal fade" id="resure" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"">确认密码</h4>
                                    </div>
                                        <div class="modal-body">
                                        <p>您输入的密码是:<h1 id="word" style="color:red"></h1></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">上一步</button>
                                            <?=Html::submitButton('确认',['class'=>'btn btn-success'])?>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                <?php ActiveForm::end()?>
            </div>           
 </div>
    </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    var tipsi;
    $("#head-photo").hover(function(){
        tipsi = layer.tips('点击修改头像',this,{tips:[1,'black'],time:0});
    },function(){
        layer.close(tipsi);
    });
    $("#passpass").click(function(){
        var ttt = $("#password").val();
        $("h1").html(ttt);
    });
</script>

