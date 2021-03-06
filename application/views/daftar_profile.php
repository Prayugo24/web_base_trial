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
                            <form action="<?php echo base_url('admin/edt_barang/pencarian_barang'); ?>" method="post">
                            <input class="search" type="text" placeholder="Pencarian" name='id' >
                            </form>
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
                            <div class="header text-center">
                                <h4 class="title">Admin Toko Anda</h4>
                                <p class="category"></p>
                                <br>
                            </div>
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-bigboy">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center"><b>ID Admin</b></th>
                                        <th class="text-center"><b>Nama</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;
                                    foreach ($results as $result) { ?>
                                    <tr>
                                        <td class="td-name">
                                            <?php echo $result->id_owner;?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $result->nama_owner;?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/profile/view/'.$result->id_owner); ?>" type="button" rel="tooltip" title="Edit Barang" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/profile/hapus/'.$result->id_owner); ?>" type="button" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
