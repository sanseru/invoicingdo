<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MasterperusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masterperusahaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterperusahaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_perusahaan',
            'alamat:ntext',
            'kontak:ntext',
            [
                'attribute' => 'logo',
                'value'=> function ($model) {
                    return  $model->logo;
                },
                'format' => ['image', ['width' => '200px', 'height' => '100px']]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
