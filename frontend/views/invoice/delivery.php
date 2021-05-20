<?php
use yii\helpers\Html;
?>
<table border="0" width="100%" cellpadding="5" cellspacing="5">
    <tr>
        <!-- <td bgcolor="#a9a9a9" width="212px"> &nbsp;PT MAJU MUNDUR KENA</td> -->
        <td>         
        <?php  
        if(isset($company[0]['logo'])){
            Html::img($company[0]['logo'], [
                'alt' => 'Company',
                'width' => '200px',
                'height' => '120px'
                ]);
        }
        
        ?>
        </td>


        <td align="right">
           <b> <?= $company[0]['nama_perusahaan'] ?></b> <br>
            <?= $company[0]['kontak']?><br>
            <?= $company[0]['alamat']?>
        </td>
    </tr>
</table>
<br><br>
<table width="100%" cellpadding="2" cellspacing="0">
    <tr>
        <td>
            <!-- <br><br> -->
            <b>Consignee To :</b><br>
            <?= $model->name;?><br>
            ATTN : <?= $model->attn;?><br>
            <?= $model->address;?><br>
        </td>
    </tr>

    <tr>
        <td align="right" bgcolor="#eee">
            <b>Port of Loading  # <?= $model->portof_loading;?></b><br>
            Port of Discharge  # <?= $model->portof_discharge;?><br>
        </td>
    </tr>
    <tr>
        <td>
            VESSEL NAME # <?= $model->vessel_name;?><br>
            NO. CONTAINER # <?= $model->no_container;?><br>
            NO. SEAL # <?= $model->no_seal;?><br>

        </td>
    </tr>

    <tr>
        <td>
            <br><br>
            <table width="100%" cellpadding="5" cellspacing="0" border="1">
                <tr bgcolor="#eee">
                    <th width="5%" align="center">No</th>
                    <th width="60%" align="center">Name</th>
                    <th align="center">Jumbo Bags/Bar</th>
                    <th align="center">Gross Weight</th>
                    <th align="center">Nett Weight</th>

                </tr>
                <?php 
               
                $jb = 0;
                $gw = 0;
                $nw = 0;
                $ix = 1;
                ?>

                <?php foreach($items as $m):?>
                    <tr>
                        <td><?= $ix;?></td>
                        <td><?= $m->item;?></td>
                        <td align="center"><?= $m->jb;?></td>
                        <td align="center"><?= $m->gw;?></td>
                        <td align="center"><?= $m->nw;?></td>

                    </tr>

                <?php 
                $jb = $jb + $m['jb'];
                $gw = $gw + $m['gw'];
                $nw = $nw + $m['nw'];
                $ix++; 
                endforeach;
                ?>
                <tr bgcolor="#eee">
                    <td colspan='2' align="center">
                        <b>Total</b>
                    </td>
                    <td  align="center">
                        <b><?= number_format( $jb,0);?></b>
                    </td>
                    <td  align="center">
                        <b><?= number_format( $gw,0);?></b>
                    </td>
                    <td  align="center">
                        <b><?= number_format( $nw,0);?></b>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

<br>


<table border="0" width="100%" cellpadding="5" cellspacing="5">
<tr>
        <td bgcolor="#eee">
        <b>Delivery Order #</b> <?= $model->deliveryorder;?><br>
            <b>Invoice #</b> <?= $model->invoice_number;?><br>

        </td>
    </tr>
    <tr>
    <td align="left">
            Dibawa Oleh <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            (Tanda Tangan & CAP)
        </td>
        <td align="right">
            <p>Diterima Oleh</p> <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            (Tanda Tangan & CAP)
        </td>
    </tr>
</table>
