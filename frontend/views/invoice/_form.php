<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Masterperusahaan;
use frontend\models\BisnisPartner;

use frontend\models\Items;
use yii\helpers\ArrayHelper;

$this->registerJs("
$(document).ready(function() {
    $('.select2').select2();
    $('.select2tags').select2({
        tags: 'true',
    });
});

  $('.dynamicform_wrapper').on('afterInsert', function(e, item) {
    $('.select2tags').select2({
        tags: 'true',
    
    });

    $('.form-options-body select.form-control').on('change',function(e) {
        e.preventDefault();
        //Untuk Pricenya
        var name = $(this).attr(\"name\");
        var res = name.replace('item', 'total');
        var name2 = $(this).attr(\"name\");
        var valname = $('[name=\"'+name+'\"]').val();
        $.post('invoice/unitprice',{
            name:valname
        },
        function(data, status){
            $('[name=\"'+res+'\"]').val(data.data.unitPrice);
        });  
        //Untuk Pricenya
        
        
    });

    $('.form-options-body input.form-control').on('keyup', function(e) {
        var name = $(this).attr(\"name\");
        if (name.indexOf('gw') >= 0){
            var res = name.replace('gw', 'jb');
            var nw = name.replace('gw', 'nw');
            var valgw = $('[name=\"'+name+'\"]').val();
            var valjb = $('[name=\"'+res+'\"]').val();
        }else if(name.indexOf('jb') >= 0){
            var res = name.replace('jb', 'gw');
            var nw = name.replace('jb', 'nw');
            var valjb = $('[name=\"'+name+'\"]').val();
            var valgw = $('[name=\"'+res+'\"]').val();
        }
        var jumlah = valgw - valjb;
            $('[name=\"'+nw+'\"]').val(jumlah);
    });
    
    
});

$('.form-options-body select.form-control').on('change',function(e) {
    e.preventDefault();
    //Untuk Pricenya
    var name = $(this).attr(\"name\");
    var res = name.replace('item', 'total');
    var name2 = $(this).attr(\"name\");
    var valname = $('[name=\"'+name+'\"]').val();
    $.post('invoice/unitprice',{
        name:valname
    },
    function(data, status){
        $('[name=\"'+res+'\"]').val(data.data.unitPrice);
    });
    //Untuk Pricenya

});

$('.penerimainvoice').on('change',function(e) {
    e.preventDefault();

    var val = $('.penerimainvoice').val();
    $.post('bisnis-partner/caribisnis',{
        id:val
    },
    function(data, status){
        console.log(data.data.CardName);
        $('#namaperusaahanx').val(data.data.CardName);
        $('#attnx').val(data.data.attention);
        $('#addressx').val(data.data.alamat);

    });

});


$('.form-options-body input.form-control').on('keyup', function(e) {
    var name = $(this).attr(\"name\");
    if (name.indexOf('gw') >= 0){
        var res = name.replace('gw', 'jb');
        var nw = name.replace('gw', 'nw');
        var valgw = $('[name=\"'+name+'\"]').val();
        var valjb = $('[name=\"'+res+'\"]').val();
    }else if(name.indexOf('jb') >= 0){
        var res = name.replace('jb', 'gw');
        var nw = name.replace('jb', 'nw');
        var valjb = $('[name=\"'+name+'\"]').val();
        var valgw = $('[name=\"'+res+'\"]').val();
    }
    var jumlah = valgw - valjb;
        $('[name=\"'+nw+'\"]').val(jumlah);
});


");

?>

<div class="customer-form">

    <?php $form = \yii\widgets\ActiveForm::begin([
        'id' => 'dynamic-form',
    ]); ?>

    <?php echo $form->errorSummary($items);?>
    
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'invoice_number')->textInput(['maxlength' => true,'placeholder'=>'No Invoice'])->label('No Invoice') ?>
    <?php
            echo $form->field($model, 'due_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Due date'],
                'removeButton' => false,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('Due Date Invoice');
            ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'idheadcompany', ['options' => ['tag' => 'false']])-> dropDownList(
                    ArrayHelper::map(Masterperusahaan::find()->all(),'id','nama_perusahaan'),
                    ['prompt'=>'- Select Master Perusahaan-','class'=>'form-control select2 m-b-1','style' => 'width: 100%'])->label('Master Perusahaan'); ?>
    </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h3>Penerima</h3>
            
            <?= $form->field($model, 'perusahaan', ['options' => ['tag' => 'false']])-> dropDownList(
                    ArrayHelper::map(Bisnispartner::find()->all(),'id','CardName'),
                    ['prompt'=>'- Select Bisnis Partner-','class'=>'form-control select2 m-b-1 penerimainvoice','style' => 'width: 100%'])->label('Bisnis Partner'); ?>
            
            <?= $form->field($model, 'name')->hiddenInput(['maxlength' => true,'id'=>'namaperusaahanx'])->label(false) ?>
            <?= $form->field($model, 'attn')->textInput(['maxlength' => true,'placeholder'=>'ATTN','id'=>'attnx'])->label('Attention') ?>
            <?= $form->field($model, 'address')->textarea(['rows' => 9,'placeholder'=>'Address','id'=>'addressx'])->label('Alamat') ?>
        </div>
        <div class="col-md-7">
            <h3>Vessel</h3>
            <?= $form->field($model, 'portof_loading')->textInput(['maxlength' => true,'placeholder'=>'Port of Loading'])->label('Port of Loading') ?>
            <?= $form->field($model, 'portof_discharge')->textInput(['maxlength' => true,'placeholder'=>'Port of Discharge'])->label('Port of Discharge') ?>
            <?= $form->field($model, 'vessel_name')->textInput(['maxlength' => true,'placeholder'=>'Vessel Name'])->label('Vessel Name') ?>
            <?= $form->field($model, 'no_container')->textInput(['maxlength' => true,'placeholder'=>'No. Container'])->label('No. Container') ?>
            <?= $form->field($model, 'no_seal')->textInput(['maxlength' => true,'placeholder'=>'No. Seal'])->label('No. Seal') ?>


        </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.form-options-body', // required: css class
        'limit' => 999, // the maximum times, an element can be added (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $items[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'jb',
            'gw',
            'nw',
            'total',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-briefcase"></i> Items
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
                <?php foreach ($items as $i => $m): ?>
                    <div class="item"><!-- widgetItem -->
                        <div class="rows">
                            <?php
                            // necessary for update action.
                            if (! $m->isNewRecord) {
                                echo Html::activeHiddenInput($m, "[{$i}]id");
                            }
                            ?>
                            <table >
                            <thead>
                                <tr>
                                    <th style=" text-align: center"></th>
                                    <th style="text-align: center" class="required">Name</th>
                                    <th style=" text-align: center">Bruto</th>
                                    <th style="text-align: center">Terra</th>
                                    <th style=" text-align: center">Netto</th>
                                    <th style=" text-align: center">Price</th>
                                </tr>
                            </thead>
                            <tbody class="form-options-body">
                                <tr>
                                    <td valign="top" width="5%"><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></td>
                                    <td width="40%">
                                    <?= $form->field($m, "[{$i}]item", ['options' => ['tag' => 'false']])-> dropDownList(
                                        ArrayHelper::map(Items::find()->all(),'name','name'),
                                            ['prompt'=>'- Select Items-','class'=>'form-control select2tags', 'id'=>'itemstags','style' => 'width: 100%'])->label(false); ?>
                                    
                                    </td>
                                    <td style="padding:10px" width="10%">
                                        <?php echo $form->field($m, "[{$i}]gw")->textInput(['placeholder'=>'Kg'])->label(false);?>
                                    </td>
                                    <td style="padding:10px" width="20%">
                                        <?php echo $form->field($m, "[{$i}]jb")->textInput(['placeholder'=>'Kg'])->label(false);?>
                                    </td>
                                    <td style="padding:10px" width="10%">
                                        <?php echo $form->field($m, "[{$i}]nw")->textInput(['placeholder'=>'Kg'])->label(false);?>
                                    </td>
                                    <td style="padding:10px" width="30%">
                                        <?php echo $form->field($m, "[{$i}]total")->textInput(['placeholder'=>'Total'])->label(false);?>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div><!-- .row -->
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>

        </div>
    </div><!-- .panel -->
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($m->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>
</div>


