<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BisnisPartner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bisnis-partner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CardName')->textInput(['maxlength' => true])->label('Nama Bisnis Partner / Client'); ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attention')->textInput()->label('Attention / Recipient '); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
