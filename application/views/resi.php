<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                           <input class="search" type="text" placeholder="Pencarian">
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url('login/logout') ?>">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content table-responsive table-full-width">
                            <form action="<?php echo base_url('admin/resi/view/index')?>">
                                <table class="table table-hover table-striped">
                                    <thead><!--
                                        <th>No</th>-->
                                        <th style="width: 150px;">ID Transaksi</th>
                                        <th style="width: 50px;">Tanggal</th>
                                        <th class="text-right" style="width: 130px;">Total</th>
                                        <th class="text-center" style="width: 250px;">Resi</th>
                                        <th class="text-center" style="width: 70px;">Status</th>
                                        <th class="text-center" style="width: 70px;">Aksi</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach($results as $result) { ?>
                                        <tr>           
                                            <td style="width: 150px;"><?php echo $result->id_transaksi; ?></td>
                                            <td style="width: 50px;"><?php echo $result->tgl_transaksi; ?></td>
                                            <td class="text-right" style="width: 130px;"><?php echo number_format(($result->total),0,',','.') ?></td>
                                            <td class="text-center" style="width: 70px;"><?php echo $result->no_resi; ?></td>
                                            <td class="text-center" style="width: 70px;">
                                                <?php 
                                                if (($result->status==1)&&($result->konf_bay==1)&&($result->konfirmasi_barang=='belum'))  echo 'proses';
                                                elseif (($result->status==1)&&($result->konf_bay==0)&&($result->konfirmasi_barang=='belum')) echo 'order'; 
                                                elseif (($result->status==1)&&($result->konf_bay==1)&&($result->konfirmasi_barang=='sudah')) echo 'selesai';
                                                ?>
                                            </td>
                                            <td class="td-actions text-center">
                                                <a href="<?php echo base_url('admin/Resi/update_form/'.$result->id_transaksi);?>" type="button" rel="tooltip" title="Input Resi" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            </td> 
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                         
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>