<?php

/* @var $this yii\web\View */
$this->registerJs("

$(document).ready(function() {
    $.post('invoice/servicecount',
    function(data, status){

        console.log(data);
        if(data.created){
        $('.Opens').html(data.created.cnt);
        }
        if(data.created){
            $('.Paid').html(data.paid.cnt);
        }
        $('.items').html(data.items);

    });
});
");


$this->title = 'Home';
?>
<div class="site-index">

    <div class="ico-card-grid">
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Invoice<span class="ico-card-category">Open</span> </h4>
                    <h5 class="ico-card-eta">Invoice Yang Masih Open</h5>
                </div>
                <h4 class="ico-card-rating Opens">0</h4>
            </div>
            <progress max="100" value="100"></progress>
        </div>
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Invoice<span class="ico-card-category">Paid</span> </h4>
                    <h5 class="ico-card-eta">Invoce Yang Sudah Paid</h5>
                </div>
                <h2 class="ico-card-rating Paid">0</h2>
            </div>
            <progress max="100" value="100"></progress>
        </div>
        <div class="ico-card">
            <div class="ico-card-inner">
                <div class="ico-card-primary">
                    <h4 class="ico-card-title">Master Items<span class="ico-card-category"></span> </h4>
                    <h5 class="ico-card-eta">Jumlah Master Data</h5>
                </div>
                <h2 class="ico-card-rating items">0</h2>
            </div>
            <progress max="100" value="100"></progress>
        </div>
    </div>


</div>