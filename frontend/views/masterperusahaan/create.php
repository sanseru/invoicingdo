<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Masterperusahaan */

$this->title = 'Input Master Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Masterperusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterperusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
