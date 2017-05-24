<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJs(
    '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {
            $.pjax.reload({container:"#comments"});  //Reload GridView
        });
    });'
);
?>
<?php Pjax::begin(['id'=>'new_comment','enablePushState' => false])?>
<?php $form = ActiveForm::begin([
    'action' => ['comment/create','id' => $id],
    'method'=>'post',
    'options'=>['data-pjax'=>true],
]); ?>
    <textarea name="content" data-provide="markdown" data-savable="false" data-language="zh" rows="8"></textarea>
<br>
<?= Html::submitButton('提交',['class'=>'btn btn-success'])?>
<hr>
<?php ActiveForm::end()?>
<?php Pjax::end()?>
