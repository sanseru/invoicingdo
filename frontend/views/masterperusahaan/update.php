<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Masterperusahaan */

$this->title = 'Update Masterperusahaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Masterperusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterperusahaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
