<?php
use app\assets\AppAsset;
use yii\bootstrap\Alert;
$this->title = 'Love Story';
?>
<html>
<head>
    <meta charset="UTF-8">
	 <link rel="stylesheet" href="/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
    <style type="text/css">
body{
    background: url(/font/3.jpg);
    background-size:cover;
    margin:0px auto;
}
.u_user {
    width: 25px;
    height: 25px;
    background: url(/font/7.png);
    background-position: -125px 0;
    position: absolute;
    margin: 5px 70px;
}
.pw {
    width: 25px;
    height: 25px;
    background-image: url(/font/7.png);
    background-position: -125px -34px;
    position: absolute;
    margin: 5px 70px;
}
.login{
    position: absolute;
    top: 30%; left: 2%; bottom: 0; right: 0;
}
.bt{
position:relative;    
width:200px;
}
.input-group-mine{
    width:200px;
    height:45px;
}
.input-group-mine1{
	width:200px;
	height:auto;	
}
.iii{
    width:50px;
    height:50px;
    border-radius:200px;
}
.try{
    width:290px;
    height:260px;
    border-radius:5px;
    background-color: rgba(0,0,0,0.48);
//    box-shadow: 3.5px 3.5px 0px  #000;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: #f00;
}

::-moz-placeholder { /* Mozilla Firefox 19+ */
    color: #f00;
}

input:-ms-input-placeholder,
textarea:-ms-input-placeholder {
    color: #f00;
}

input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
    color: #f00;
}
.alert{
    width:200px;
}
.alert1{
	width:200px;
	height:2px;
}
.remember{
margin-top:10px;
}
#ai{
}
.input-validation-error { border: 1px solid #ff0000 }
.input-validation-valid  { border: 1px solid #00ff00 }
.field-validation-error { color: #ff0000;padding-right:130px;}
.field-validation-valid { display: none }
.validation-summary-errors { font-weight: bold; color: #ff0000 }
.validation-summary-valid { display: none }
/*.alert{*/
    /*width:200px;*/
    /*height:50px;*/
/*}*/

/*.pkq{*/
    /*width: 261px;*/
    /*height: 394px;*/
    /*background: url(1.png);*/
    /*background-position: -0px -0px;*/
    /*position: absolute;*/
    /*margin: 200px 1000px;*/
/*}*/
    /*input{*/
        /*height:30px;*/
        /*width:200px;*/
        /*vertical-align:middle;*/
        /*line-height:30px;*/
        /**/
        /*outline:none;*/
    /*}*/
</style>
    <script src="/font/dist/js/jquery-3.1.1.js"></script>
	<script src="/font/dist/js/jquery-migrate-1.2.1.js"></script>
	<script src="/font/dist/js/jquery.validate.js"></script>
	<script src="/font/dist/js/jquery.validate.unobtrusive.js"></script>
</head>
<body>
<!-- Button trigger modal -->
<br>
<br>
<!--<form>-->
   <!--<center> <div class="input-prepend">-->
        <!--<span class="add-on"><i class="icon-envelope"></i></span>-->
        <!--<input class="span2" type="text" style="background-color:transparent;" placeholder="Email address">-->
    <!--</div>-->
       <!--<br>-->
    <!--<div class="input-prepend">-->
        <!--<span class="add-on"><i class="icon-key icon-white"></i></span>-->
        <!--<input class="span2" type="password" style="background-color:transparent;" placeholder="Password">-->
    <!--</div>-->
       <!--</center>-->
<!--</form>-->
<div class = "login">
<center>
    <?php
    if(Yii::$app->getSession()->hasFlash('error')) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-danger',
            ],
            'body' => Yii::$app->getSession()->getFlash('error'),
        ]);
    }
    ?>
    <form class="try" method="post" action="">
        <br>
        <p>Love Story</p>
	<div>
        <center><div class="input-group-mine">
    <span class="u_user"></span>
    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>-->
    <input type="text" class="form-control"style="background-color:transparent" placeholder="Username" name="username" data-val="true" data-val-required="用户名不能为空!"/>
	<div data-valmsg-for="username"><ul><center></center></ul></div>
</div>
</center>
<br>
<center><div class="input-group-mine1">
    <span class="pw"></span>
    <!--<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>-->
    <input type="password" class="form-control"style="background-color:transparent" placeholder="Password" name="password" data-val="true" data-val-length=密码至少4个字符! data-val-length-min="4"/>
	<div data-valmsg-for="password" id="ai"><ul><center></center></ul></div>
</div>
<div class="remember">
     <label>
        <input type="hidden" name="rememberMe" value="0">
        <input type="checkbox" name="rememberMe" value="1">记住登录
</label>
</div>
</center>
    <center><div class="bt">
    <center><button type="submit" id="submit" class="btn btn-primary btn-block">登录</button></center>
    </div>
        </center></div>
        </form></center>
</div>

<!--<center><input style="background-color:transparent; border-radius: 20px;"></center>-->



<!--<div class="form-group">-->
    <!--<div class="input-group col-md-5">-->
        <!--<span class="input-group-addon"><i class="icon-user"></i></span>-->
        <!--<input type="password" class="form-control" style="background-color:transparent" name="password">-->
    <!--</div>-->
<!--</div>-->
</body>
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
   小猪仔点一下有惊喜！
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">惊喜就是</h4>
            </div>
            <div class="modal-body">
                I Love You ! 我的小超仔！
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</html>
