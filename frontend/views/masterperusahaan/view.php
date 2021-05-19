<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Masterperusahaan */

$this->title = $model->nama_perusahaan;
$this->params['breadcrumbs'][] = ['label' => 'Masterperusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="masterperusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_perusahaan',
            'alamat:ntext',
            'kontak:ntext',
            [
                'attribute' => 'logo',
                'value' => $model->logo,
                'format' => ['image', ['width' => '400px', 'height' => '200']]
            ],
            'createdBy',
            'createdTime',
        ],
    ]) ?>

</div>
