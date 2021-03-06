<?php
use yii\helpers\Html;
?>
<table border="0" width="100%">
    <tr>
        <td>
        <?php  
            if(strlen($company[0]['logo']) > 0){
                echo Html::img($company[0]['logo'], [
                    'alt' => 'Company',
                    'width' => '100px',
                    'height' => '80px'
                    ]);
            }
        ?>
        </td>
        <td align="right">
            <?= $company[0]['nama_perusahaan'] ?> <br>
            <?= $company[0]['kontak']?><br>
            <?= $company[0]['alamat']?>
        </td>
    </tr>
</table>
<br><br>
<table border="0" width="100%">
    <tr>
        <td align="center">
        <h3>INVOICE</h3>
        </td>
    </tr>

</table>
<!-- <table border="0" width="100%">
    <tr>
        <td align="center">
            <?php if($model->status==\frontend\models\ModelInvoice::STATUS_PAID):?>
            <?= Html::img('@web/img/paid.png', ['alt' => 'Company','width' => '100px','height' => '20px']);?>
            <?php else:?>
            <?= Html::img('@web/img/unpaid.jpg', ['alt' => 'Company','width' => '100px','height' => '20px']);?>
            <?php endif;?>
        </td>
    </tr>
</table> -->


<table width="100%" cellpadding="5" cellspacing="5">
    <tr>
        <td>
            <b>Invoiced To :</b><br>
            <?= $model->name;?><br>
            ATTN : <?= $model->attn;?><br>
            <?= $model->address;?><br>
        </td>
    </tr>

</table>

<br>

<?php 
    

    $ix = 1;
    $jumlahss = 0 ;
    
    ?>
<table width="100%" cellpadding="5" cellspacing="0" border="1">
    <tr bgcolor="#eee">
        <th width="10%" align="center">Name</th>
        <th width="30%" align="center">Name</th>
        <th  align="center">Nett Weight</th>
        <th  align="center">Price</th>
        <th  align="center">Total</th>


    </tr>
    <?php 
    ?>
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

<table border="0" width="100%" cellpadding="5" cellspacing="5">
    <tr style="background-color:#eee">
        <td bgcolor="#eee">
            <b>Invoice  : <?= $model->invoice_number;?></b><br>
            Invoice Date : <?= date("d-m-Y", strtotime($model->created_at));?><br>
            Due Date : <?= $model->due_date;?><br>
        </td>
        <td bgcolor="#eee" align="right">
            Vessel Name  : <?= $model->vessel_name;?><br>
            No.Container  : <?= $model->no_container;?><br>
            N0. Seal  : <?= $model->no_seal;?><br>

        </td>
    </tr>
    <tr>
        <td align="left">
            Jakarta, <?= tanggal_indo(date("d m Y", strtotime($model->created_at)));?> <br>
            <br>
            <br>
            <?php 
                    if(strlen($company[0]['stamp']) > 0){
                        echo Html::img($company[0]['stamp'], [
                            'alt' => 'Company',
                            'width' => '200px',
                            'height' => '100px'
                            ]);
                    }
            ?> <br><br>
        </td>
    </tr>
</table>

<?php 
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode(' ', $tanggal);
	return $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2];
}
?>