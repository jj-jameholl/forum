<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$this->title = 'Love Story';
AppAsset::register($this);
AppAsset::addCss($this,'/Flat/dist/css/flat-ui.css');
AppAsset::addCss($this,'/font/dist/css/bootstrap.min.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon">
	 <title><?= Html::encode($this->title) ?></title>
	  <?php $this->head() ?>
	<!-- <script src="/Flat/dist/js/vendor/html5shiv.js"></script>
    <script src="/Flat/dist/js/vendor/respond.min.js"></script>-->
    <script src="/Flat/dist/js/vendor/jquery.min.js"></script>
   <!-- <script src="/Flat/dist/js/vendor/video.js"></script>-->
    <script src="/Flat/dist/js/flat-ui.min.js"></script>
   <!-- <script src="/Flat/docs/assets/js/application.js"></script>-->
	<script src="/layer-v2.4/layer/layer.js"></script>
<style type="text/css">
.image{
height:38px;
width:38px;
border:1px solid;
border-color:white;
margin-top:5px;
margin-left:10px;
border-radius:25px;
}
.pagination > li > a, .pagination > li:first-child > span, .pagination > li:last-child > a, .pagination > li:last-child > span, .pagination > li:first-child > a{
        margin-left: 8px;
        border-radius: 20px;
        background-color:#eee ;
        padding:4px 10px;
        border-color:#eee ;
	color:#555;
    }
    .pagination >.active > a {
        background-color: #1cd388;
        border-color:#f5f5f5;
    }
    .pagination > .active > a:hover{
        background-color: #1abc9c;
    }
    .pagination > li > a:hover{
        background-color: #f5f5f5;
    }
    .layui-layer-lan{
        border-radius: 5px;
       // padding: 5px;
//	border:1px #bdc3c7 solid;
    }
    .dropdown:hover > .dropdown-menu{
	display:block;
	}
    .push{
        font-size: 12px;
        color:#48c9b0;
    }
   .layui-layer-content{
	padding:5px;
}
    .test{
        width:220px;
        height:190px;
    }
</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<div class="row demo-row">
        <div class="col-xs-12">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="<?=Yii::$app->homeUrl?>">Love Story</a>
                </div>
                <div id="navbar-collapse-01">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=Url::toRoute(['/article/index'])?>">主页<span class="badge">3</span></a></li>
			<?php if(Yii::$app->user->isGuest){?>
			<li><a href="#fakelink">关于我们</a></li>
			<li><a href="<?=Url::toRoute(['/site/login'])?>">登录</a></li>
			<?php }else{?>
			<li><a href="<?=Url::toRoute(['/article/create'])?>">发布美文</a></li>
                        <li class="dropdown">
				<img class="image" src="/uploads/avatar/<?=Yii::$app->user->identity->id?>/<?php 
					if(Yii::$app->user->identity->photo==null){
					echo "20161120033225_big.jpg";
					}else{
					echo Yii::$app->user->identity->photo;}
					?>"><b class="caret"></b></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="dropdown-menu">
                                <li><a href="<?=Url::toRoute(['/info/index'])?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;个人信息</a></li>
                              	 <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;我的文章</a></li>
				 <li><a href="#"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;&nbsp;我的收藏</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;&nbsp;我的相册</a></li>
                                <li class="divider"></li>
                        	<li class="logout"><a href="<?=Url::toRoute(['/site/logout'])?>" data-method="post"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;退出登录</a></li>
			     <!--  <li><?php
                                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']);
					 echo Html::submitButton(
                                        '<span class="glyphicon glyphicon-off"></span>&nbsp;退出',
                                        ['class'=>'btn btn-danger btn-block']
                                    );
                                    echo Html::endForm()
                                    ?>
                                </li>-->
                            </ul>
                        </li>
			  
			<?php }?>
                    </ul>
                    <form class="navbar-form navbar-right" action="<?=Url::toRoute(['/article/search'])?>" role="search" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="find" id="navbarInput-01" type="search" placeholder="Search">
                                <span class="input-group-btn">
                      <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                            </div>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
           </nav><!-- /navbar -->
        </div>
</div>
<script type="text/javascript">
    $(function () {
	$(".btn-tooltip").tooltip();
	$(".logout").tooltip({
	   title:'退出登录',
	   placement:'left',
	});
	        $(document).on('mouseenter', '[rel=author]', function() {
            var _this = this;
                    $(_this).popover({
                        container:'body',
                        html: true,
			animation:true,
                        placement: 'auto right',
                        content: '<div class="test"><img src="load.gif" style="padding-left:100px;padding-top:70px"></div>'
                    }).popover('show');
                    $('.popover-content').load($(_this).attr('href'));
                    $('.popover').on('mouseleave', function() {
                        $(_this).popover('destroy');
                    });
        }).on('mouseleave', '[rel=author]', function() {
            var _this = this;
            setTimeout(function() {
                if (!$(".popover:hover").length) {
                    $(_this).popover('destroy');
                    //alert(JSON.stringify($(".popover:hover")));
                }
            }, 100);
        });
    });
</script>
    <div class="container"style="padding-left:0px;padding-right:0px">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; jj-jameholl <?= date('Y') ?></p>

        <p class="pull-right">Designed For My lover</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php if(isset(Yii::$app->user->identity->id)) {?>
<script>
    $("document").ready(function(){
        ws = new WebSocket("ws://23.106.137.241:1234");
               ws.onopen = function(){
            var data = {"kind":"id","id":<?=Yii::$app->user->identity->id?>};
            ws.send(JSON.stringify(data));
        }
	 ws.onmessage = function(e) {
            var message = JSON.parse(e.data);
	if(message.kind == "note"){
            layer.open({
                type:1,
                time:10000,
                skin:'layui-layer-lan',
                offset:["60px","80%"],
                area:["18%","50px"],
                title:false,
                shade:0,
                closeBtn:0,
                shift:6,
                content:"<img src='/uploads/avatar/"+message.id+"/"+message.photo+"' style='width:40px;height:40px;border-radius: 5px'>&nbsp;"+"<em class='push'>"+message.content+"</em>"
            });
}else if(message.kind == "reponse"){
	                layer.open({
                    type: 1,
                    time: 10000,
                    skin: 'layui-layer-lan',
                    offset: ["60px", "80%"],
                    area: ["18%", "50px"],
                    title: false,
                    shade: 0,
                    closeBtn: 0,
                    shift: 4,
                    content:"<a href='../../article/"+message.article_id+"'><img src='/uploads/avatar/"+message.user_id+"/"+message.photo+"' style='width:40px;height:40px;border-radius: 5px'>&nbsp;"+"<em class='push'>评论了您的文章《"+message.article+"》</em></a>"
                });
}
        }
    });
</script>
<?php }?>
