<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\grid\GridView;

$this->title = 'Payment Invoice: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Paid';
?>
<div class="row">
    <!--detail invoice-->
    <div class="col-md-7">
        <div class="well well-sm">
            <table>
                <tr>
                    <td>
                        <b>Invoiced To :</b><br>
                        <?= $model->name;?><br>
                        ATTN : <?= $model->attn;?><br>
                        <?= $model->address;?><br>
                    </td>
                    <td>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</td>
                    <td valign="top">
                        <b>Invoice : <?= $model->invoice_number;?></b><br>
                        Invoice Date : <?= $model->created_at;?><br>
                        Due Date : <?= $model->due_date;?><br>
                    </td>
                </tr>

            </table>
            <?php 
                $ix = 1;
                $jumlahss = 0 ;
            ?>
            <table width="100%" cellpadding="5" cellspacing="0" border="1">
                <tr bgcolor="#eee">
                    <th width="10%" align="center">Name</th>
                    <th width="30%" align="center">Name</th>
                    <th align="center">Nett Weight</th>
                    <th align="center">Price</th>
                    <th align="center">Total</th>


                </tr>
                <?php foreach($leadsCount as $m):?>
                <tr>
                    <td><?= $ix;?></td>
                    <td><?= $m['item'];?></td>
                    <td align="center"><?= $m['cnt'];?></td>
                    <td align="center">USD <?=  number_format($m['total'],0);?></td>
                    <td align="right">USD <?=   number_format($m['cnt']*$m['total'],0);?></td>
                </tr>


                <?php 
                    $ix++;
                    $jumlahss = $jumlahss +  $m['cnt']*$m['total'];
                    endforeach;
                    ?>

                <tr bgcolor="#eee">
                    <td colspan='4' align="center">
                        <b>Subtotal</b><br>
                    </td>
                    <td align="right">
                        <b>USD <?= number_format($jumlahss,0);?></b><br>

                    </td>
                </tr>
            </table>
        </div>
    </div>
        <!-- form pembayaran-->
        <div class="col-md-5">
        <?php $form = ActiveForm::begin(); ?>
        <?php
        echo $form->field($model, 'transaction_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => ''],
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>
        <?= $form->field($model, 'payment_method')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => true]) ?>
        <?php echo $form->field($model, 'payment')->textInput(['type'=>'number','value'=>$jumlahss]);?>

        <div class="form-group">
            <?= Html::submitButton('Paid', ['class' => 'btn btn-success pull-right']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
