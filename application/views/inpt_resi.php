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
                    <ul class="nav navbar-nav navbar-right"><li>
                            <a href="<?php echo base_url('login/logout') ?>">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content" style="padding-bottom: 0px;">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nomor Resi</h4>
                            </div>
                            <div class="content">
                                <form action="<?php echo base_url('admin/resi/update')?>" method="Post" novalidate>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <input type="hidden" class="form-control" placeholder="Nomor Resi" name="id_transaksi" id="id_transaksi" value="<?php echo $id->id_transaksi; ?>">
                                                <input type="text" class="form-control" placeholder="Nomor Resi" name="no_resi" id="no_resi" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Masukan Resi</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content table-responsive table-full-width">
                                <form>
                                <table class="table table-bigboy">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Image Produk</th>
                                            <th> Nama </th>
                                            <th class="th-description">Keterangan</th>
                                            <th class="text-center">QTY</th>
                                            <th class="text-center">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($result as $res) { ?>
                                        <tr>
                                            <td class="img-container">
                                                <img src="http://cimols.com/user/cimols_trial/Gambar/<?php echo $res->gambar; ?>">
                                            </td>
                                            <td><?php echo $res->name; ?></td>
                                            <td class="text-center"><?php echo $res->ket; ?></td>
                                            <td class="text-center"><?php echo $res->qty; ?></td>
                                            <td class="text-center"><?php echo $res->jumlah; ?></td>
                                            <!-- <td class="td-actions text-center">
                                                    <a href="<?php echo base_url('admin/Kategori/hapus/'.$result->id_category);?>" type="button" rel="tooltip" title="Hapus Kategori" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                    </a>
                                           </td>  -->
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" style="padding-top: 0px;">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Transaksi</h4>
                            </div>

                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID Transaksi</label>
                                                <input type="text" class="form-control"  placeholder="ID Transaksi" name="id_transaksi" value="<?php echo $res->id_transaksi; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control" disabled placeholder="Tanggal" value="<?php echo $res->tgl_transaksi; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No Resi</label>
                                                <input type="text" class="form-control" disabled placeholder="no_resi" value="<?php echo $res->no_resi; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Konfirmasi Pembayaran</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" disabled placeholder="Nama" name="nama" value="<?php echo $res->nama; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No. Rekening</label>
                                                <input type="text" class="form-control" disabled placeholder="Rekening" name="rekening" value="<?php echo $res->no_rek; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input type="text" class="form-control" disabled placeholder="Jumlah" name="jumlah" value="<?php echo $res->jumlah; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Penerima</h4>
                            </div>
                            
                            <div class="content">       
                                <form action="<?php echo base_url('admin/resi/update_form/'.$res->id_transaksi)?>"  method="Post">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Atas Nama</label>
                                                <input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" value="<?php echo $res->atas_nama; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="5" class="form-control" name="alamat" value=""><?php echo $res->alamat; ?></textarea> 
                                                <br>
                                                <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?php echo $res->kecamatan; ?>">
                                                <br>
                                                <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten" value="<?php echo $res->kab_kot; ?>">
                                                <br>
                                                <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" value="<?php echo $res->provinsi; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="text" class="form-control" placeholder="000000" name="telepon" value="<?php echo $res->telepon; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Sub Total</label>
                                                <input type="text" class="form-control" placeholder="000000" name="subtotal" value="<?php echo $res->total; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ongkir</label>
                                                <input type="text" class="form-control" placeholder="000000" name="ongkir" value="<?php echo $res->harga_ongkir; ?>">
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        