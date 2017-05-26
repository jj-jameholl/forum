<?php
/**
 * Created by PhpStorm.
 * User: zhan
 * Date: 2017/5/26
 * Time: 下午4:36
 */
?>
<style>
    .profile{
        width:220px;
        height:200px;
        float:left;

    }
    .profile_img{
        width:65%;
        height:63%;
        border:1px solid #eee;
        padding:2px;
        border-radius:10px;
        text-align:center;
    }
    .profile_up{
        float:left;
        height:40%;
        width:100%;
        border-bottom: 1px #16a085 dashed;;
    }
    .profile_up > .right, .profile_up > .left{
        float:left;
    }
    .profile_up > .left{
        width:35%;
        height:100%
    }
    .profile_up > .right{
        width:65%;
    }
    .profile_down{
        float:left;
        height:28%;
        width:100%;
        border-bottom: 1px #16a085 dashed;;
    }
    .profile_sign{
        float:left;
        height:13%;
        width:100%;
        border-bottom: 1px #16a085 dashed;;
    }
    .profile_down_left{
        width:49%;
        height:100%;
        float: left;
        border-right:1px #eee solid;
    }
    .profile_down_right{
        width:49%;
        height:100%;
        float: left;
    }
    .font{
        color:red;
        margin-top: -30px;
        line-height:0px;
    }
    .profile_btn > a{
        text-decoration:none;
    }
    .profile_btn{
        float:left;
        padding-top: 8px;
    }
    </style>
<div class="profile">
    <div class="profile_up">
        <div class="left">
<img class="profile_img" src="/uploads/avatar/<?=$user->id?>/<?=$user->photo?>">
            <br>
            <span class="label label-my2"><?=$user->role?></span>
            </div>
        <div class="right">
            用户名:<span><?=$user->username?></span>
            <br>
            所在地:<span><?=$user->city?></span>
            <br>
            注册日期:<span><?=date('Y-m-d',$user->createdtime)?></span>
            </div>

        </div>
    <div class="profile_sign">
        <marquee scrollamount="4"><?=$user->sign?></marquee>
    </div>
    <div class="profile_down">
    <div class="profile_down_left">
        <center><h5>魅力值</h5></center>
        <center><p3 class="font">999</p3></center>
        </div>
        <div class="profile_down_right">
            <center><h5>等级</h5></center>
            <center><p3 class="font">99</p3></center>
            </div>
    </div>
    <div class="profile_btn">
        <a href="http://www.baidu.com"><span class="label label-my1">关注</span></a>
        <a href="http://www.baidu.com"><span class="label label-my3">私信</span></a>
        </div>
    </div>
