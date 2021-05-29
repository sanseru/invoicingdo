<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BisnisPartner */

$this->title = 'Create Bisnis Partner';
$this->params['breadcrumbs'][] = ['label' => 'Bisnis Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bisnis-partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
