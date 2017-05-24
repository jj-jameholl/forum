<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Archives */
/* @var $form yii\widgets\ActiveForm */
?>
<head xmlns="http://www.w3.org/1999/html">
        <meta charset="UTF-8">
        <title>Love Story</title>
        <link rel="stylesheet" href="/lovestory/font/Font-Awesome-3.2.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="/lovestory/font/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/lovestory/markdown/css/bootstrap-markdown.min.css">
        <script src="/lovestory/markdown/js/bootstrap-markdown.js"></script>
        <script src="/lovestory/markdown/locale/bootstrap-markdown.zh.js"></script>
    <script src="/lovestory/font/dist/js/bootstrap.js"></script>
    </head>
<?php $form= ActiveForm::begin();?>
<?= $form->field($model, 'username')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions'=>[
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['redactor/upload/image'],
        'fileUpload' => ['redactor/upload/file'],
        'lang' => 'zh_cn',
        'height'=>'500px',
        'plugins' => ['clips', 'fontcolor','imagemanager','fontsize','fontfamily','video','table','textexpander','textdirection','fullscreen'],
    ]
]) ?>
<?php ActiveForm::end()?>
<div id="mark"></div>

