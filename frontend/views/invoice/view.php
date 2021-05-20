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
<table border="0" width="100%">
    <tr>
        <td align="center">
            <?php if($model->status==\frontend\models\ModelInvoice::STATUS_PAID):?>
            <?= Html::img('@web/img/paid.png', ['alt' => 'Company','width' => '100px','height' => '20px']);?>
            <?php else:?>
            <?= Html::img('@web/img/unpaid.jpg', ['alt' => 'Company','width' => '100px','height' => '20px']);?>
            <?php endif;?>
        </td>
    </tr>
</table>


<table width="100%" cellpadding="5" cellspacing="5">
    <tr>
        <td>
            <b>Invoiced To :</b><br>
            <?= $model->name;?><br>
            ATTN : <?= $model->attn;?><br>
            <?= $model->address;?><br>
        </td>
    </tr>
    <tr>
        <td>
            <br><br>
            <table width="100%" cellpadding="5" cellspacing="0" border="1">
                <tr bgcolor="#eee">
                    <th width="80%" align="center">Description</th>
                    <th align="center">Total</th>
                </tr>
                <?php foreach($items as $m):?>
                <tr>
                    <td><?= $m->item;?></td>
                    <td align="center">Rp.<?= number_format($m->total,0);?></td>
        </td>
    </tr>
    <?php endforeach;?>

    <tr bgcolor="#eee">
        <td align="right">
            <b>Subtotal</b><br>
        </td>
        <td align="center">
            <b>Rp.<?= number_format($model->amount,0);?></b><br>

        </td>
    </tr>
    <tr bgcolor="#eee">
        <td align="center">
            <b>Total</b>
        </td>
        <td align="center">
            <b>Rp.<?= number_format($model->amount,0);?></b>
        </td>
    </tr>

</table>
</td>
</tr>
</table>
<br>
<br>

<table border="0" width="100%" cellpadding="5" cellspacing="5">
    <tr>
        <td bgcolor="#eee">
            <b>Invoice # <?= $model->invoice_number;?></b><br>
            Invoice Date # <?= $model->created_at;?><br>
            Due Date # <?= $model->due_date;?><br>
           Delivery Order # <?= $model->deliveryorder;?><br>

        </td>
    </tr>
    <tr>
        <td align="right">
            Jakarta, <?= tanggal_indo(date("d m Y", strtotime($model->created_at)));?> <br>
            <br>
            <br>
            <br>
            <br>
            (..................................)
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