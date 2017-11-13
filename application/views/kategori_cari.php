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
                            <form action="<?php echo base_url('admin/kategori/pencarian_kategori'); ?>" method="post">
                                <input class="search" type="text" placeholder="Pencarian" >
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
                    <div class="col-md-8 col-md-offset-2">
                    <?php if ($this->session->flashdata('status') == 'failed') 
                        {
                            echo'<div class="row">
                                <div class="col-md-12">         
                                        <div class="alert alert-success" style="margin:10px; right:20px ;">
                                            <strong>Maaf!</strong> Data anda gagal diproses.
                                            <button type="button" class="close" data-dismiss="alert" style="padding:5px 10px 10px 5px;">×</button>
                                        </div>
                                    </div>
                            </div>';
                        }
                          if ($this->session->flashdata('status') == 'success') 
                        {
                            echo'<div class="row">
                                <div class="col-md-12">         
                                        <div class="alert alert-success" style="margin:10px; right:20px ;">
                                            <strong>Sukses!</strong> Data anda berhasil diproses.
                                            <button type="button" class="close" data-dismiss="alert" style="padding:5px 10px 10px 5px;">×</button>
                                        </div>
                                    </div>
                            </div>';
                        }
                    ?>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Kategori</h4>
                            </div>
                            <div class="content">
                                <form action="<?php echo base_url('admin/kategori/tambah')?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nama Kategori" name="category" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-success btn-fill pull-right" >Tambah Kategori</button> 
                                <div class="clearfix"></div>
                                </form>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                         <?php if (isset($result))
                                            foreach($results as $result) { ?>
                                                <tr>
                                                    <td><?php echo $result->id_category; ?></td>
                                                    <td><?php echo $result->category; ?></td>
                                                    <td>
                                                        <label class="checkbox">
                                                        <input type="checkbox" name="msg[]" value="" data-toggle="checkbox">
                                                        </label>
                                                    </td>
                                                    <!-- <td class="td-actions text-center">
                                                        <a href="<?php echo base_url('admin/Kategori/delete_multiple')?>" type="button" rel="tooltip" title="Hapus Kategori" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td> --> 
                                                </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <br>
                                <button type="submit" class="btn btn-danger btn-fill pull-right" href="<?php echo base_url('admin/Kategori/delete_multiple'); ?>">Hapus Kategori</button> 
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
