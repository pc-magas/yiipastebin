<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\Pastes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pastes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'who')->textInput(['maxlength' => 45]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]); ?>

    <?= $form->field($model, 'paste')->textarea(['rows' => 6]); ?>

    <?=$form->field($model, 'captcha')->widget(Captcha::className()); ?>    
    <div class="form-group">
        
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
