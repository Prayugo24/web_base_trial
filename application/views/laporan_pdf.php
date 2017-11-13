<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Keuangan</title>
    <style type="text/css">
        h1 {text-align:center; font-size:18px;}
        h2 {font-size:14px;}
        .tengah {text-align:center;	}
        .kiri {padding-left:10px;}
        table.nilai {border-collapse: collapse;}
        table.nilai td {border: 1px solid #000000}
    </style>
</head>

<body>
<h1>Laporan Keuangan</h1>

<h5>Periode &nbsp; <?php echo $tgl ?> s.d. <?php echo $tgl2 ?> </h5>

<hr />
    <form action="<?php echo base_url('admin/rekap/cetak')?>" method="post">

                <table width="550" border="0" align="center" >                     
                    <tr  bgcolor="grey" heigh="50">
                        <td width="150" text-align="center"><b>Nama Barang</b> </td>
		                <td width="100" text-align="center"><b>Tanggal</b> </td>
                        <td width="50" text-align="center"><b>Qty</b> </td>     
                        <td width="10" text-align="right">&nbsp; </td>                   
                        <td width="100" text-align="center"><b>Harga</b> </td>               
                        <td width="70" text-align="center"><b>Diskon</b> </td>
                        <td width="10" text-align="right">&nbsp; </td>
		                <td width="100" text-align="center"><b>Total</b> </td>
                    </tr>
                    <?php 
                        foreach ($result as $res)
                            { 
                                ?>
                    <tr >	
                       
                        <td width="150" text-align="left"><?php echo $res->name  ?></td>
		                <td width="100" text-align="center"><?php echo $res->tgl_transaksi ?></td>
                        <td width="50" text-align="center"><?php echo $res->qty ?></td>
                        <td width="10" text-align="right">Rp </td>
                        <td width="100" text-align="right"><?php echo $res->harga_barang ?></td>
                        <td width="70" text-align="center"><?php echo $res->diskon.'%' ?></td>
                        <td width="10" text-align="right">Rp </td>
		                <td width="100" text-align="right"><?php echo number_format(($res->harbar),0,',','.') ?></td>
                    
                    </tr>
                    <?php 
                    } ?>
                </table>
                <hr />
                <table width="550" border="0" align="right" cellpadding='1' cellspacing='1'>   
                <?php 
                        foreach ($ret as $hasil)
                            { 
                                ?>
                    <tr>
                        <td width="100" text-align="left">Total Penjualan</td>
                        <td width="10" text-align="left">:</td>
                        <td width="10" text-align="right">Rp </td>
                        <td width="100" text-align="right"><?php echo number_format(($hasil->jumlah),0,',','.') ?></td>
                    </tr>
                    <tr>
                        <td width="100" text-align="left">Rata-rata</td>
                        <td width="10" text-align="left">:</td>
                        <td width="10" text-align="right">Rp </td>
                        <td width="100" text-align="right"><?php echo number_format(($hasil->rata),0,',','.') ?></td>
                    </tr>

                    <?php 
                    } ?>
                </table>
    </form>
<p>&nbsp;</p>
</body>
</html>