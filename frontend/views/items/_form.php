<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label('Item Code') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Item Name') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Decription (Optional)') ?>

    <?= $form->field($model, 'unitPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
