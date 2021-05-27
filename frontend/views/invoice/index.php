<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'invoice_number',
            'deliveryorder',
            'due_date',
            'name',
            'attn',
            // 'amount',
            //'transaction_date',
            //'transaction_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{delivery} {view} {update} {payment} {delete} ',
                'buttons'=>[
                    'payment'=> function($url,$model){
                        if($model->status==\frontend\models\ModelInvoice::STATUS_CREATED)
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>',\yii\helpers\Url::toRoute(['invoice/payment','id'=>$model->id]),['title'=>'paid']);
                    },
                    'delivery'=> function($url,$model){
                        if($model->status==\frontend\models\ModelInvoice::STATUS_CREATED)
                            return Html::a('<span class="glyphicon glyphicon-road"></span>',\yii\helpers\Url::toRoute(['invoice/delivery','id'=>$model->id]),['title'=>'Delivery']);
                    },
                ]

            ],
        ],
    ]); ?>


</div>
