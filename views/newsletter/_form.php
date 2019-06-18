<?php

use app\models\forms\NewsletterForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model NewsletterForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="one-form">
    <div class="row">
        <?php Pjax::begin(); ?>
        <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'to')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea(['rows' => '6', 'id' => 'textarea']) ?>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <?php Pjax::end(); ?>
    </div>
</div>