<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="ico-card-grid">
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Invoice<span class="ico-card-category">Open</span> </h4>
                    <h5 class="ico-card-eta"><?= date('d-M-Y H:i:s'); ?></h5>
                </div>
                <h4 class="ico-card-rating">9.1</h4>
            </div>
            <progress max="100" value="100"></progress>
        </div>
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Invoice<span class="ico-card-category">Close</span> </h4>
                    <h5 class="ico-card-eta"><?= date('d-M-Y H:i:s'); ?></h5>
                </div>
                <h2 class="ico-card-rating">7.1</h2>
            </div>
            <progress max="100" value="100"></progress>
        </div>
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Master Items<span class="ico-card-category"></span> </h4>
                    <h5 class="ico-card-eta"><?= date('d-M-Y H:i:s'); ?></h5>
                </div>
                <h2 class="ico-card-rating">5.1</h2>
            </div>
            <progress max="100" value="100"></progress>
        </div>
    </div>


</div>