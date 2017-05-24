<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['enableClientValidation' => false]);?>
<?= $form->field($model,'province')->dropDownList($model->getCityList(0),
    [
        'prompt'=>'--请选择省--',
        'onchange'=>'
            $(".form-group.field-member-area").hide();
         $(".form-group.field-member-area").show();
            $.get(" '.yii::$app->urlManager->createUrl('site/city').'?typeid=2&pid="+$(this).val(),function(data){
                $("select#member-area").html(data);
            }); ',

    ]) ?>

<?= $form->field($model, 'city')->dropDownList($model->getCityList($model->province),
    [
        'prompt'=>'--请选择市--',
        'onchange'=>'
            $(".form-group.field-member-area").show();
            $.get("'.yii::$app->urlManager->createUrl('site/city').'?typeid=2&pid="+$(this).val(),function(data){
                $("select#member-area").html(data);
            });',
    ]) ?>
<?= $form->field($model, 'area')->dropDownList($model->getCityList($model->city),['prompt'=>'--请选择区--',]) ?>
<?php ActiveForm::end();?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

