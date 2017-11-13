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

            

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Pemilik Toko</h4>
                            </div>
                            <div class="content">                            
                            	<form action="<?php echo base_url('admin/profile/update')?>" method="post" novalidate>
                        		<?php 
                            		foreach($results as $result) 
                            	{
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >ID Owner</label>
                                                <input type="hidden" value="<?php echo $result->id_owner ?>" name="id_owner" >
                                                <input type="text"  class="form-control" placeholder="ID Owner"   value="<?php echo $result->id_owner ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="item form-group">
                                                <label>Nama Toko</label>
                                                <input type="text" class="form-control" data-validate-length-range="5,30" data-validate-words="2" placeholder="ex: toko cafeimers" name="nama_toko" value="<?php echo $result->nama_toko; ?>" required="required" maxlength="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label>Nama Pemilik</label>
                                                <input type="text" data-validate-length-range="1,20" class="form-control" placeholder="Nama Lengkap" name="nama_pemilik" value="<?php echo $result->nama_owner; ?>" required="required" maxlength="20">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label>Alamat Email*</label>
                                                <input type="hidden" value="<?php echo $result->email_owner ?>" name="Email" >
                                                <input type="email"  class="form-control" placeholder="Email"   value="<?php echo $result->email_owner ?>" disabled required="required" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label>Telepon</label>
                                                <input type="text" class="form-control" placeholder="08xxxxxxx" name="telp" value="<?php echo $result->telp_owner; ?>" required="required" maxlength="15"></div>
                                        </div>
                                                <div class="col-md-4">
                                            <div class="item form-group">
                                                <label>BBm</label>
                                                <input type="text" class="form-control" placeholder="isiskan PIN BBm Anda" name="bbm" value="<?php echo $result->bbm; ?>"  maxlength="15"></div>
                                        </div>        
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label for='kabupaten'>Asal Kota*</label>
                                                   
                                                <input type="text"  class="form-control" placeholder="Asal Kota"  name="asal_kota" value="<?php echo $result->asal_kota ?>" disabled>
                                                    
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label>Alamat Tinggal </label>
                                                <input type="text" class="form-control" placeholder="Alamat" name="almt" value="<?php echo $result->alamat_owner; ?>" required="required" maxlength="100">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Rekening</label>
                                                <input type="text" class="form-control" placeholder="rekening" name="rekening" value="<?php echo $result->rekening; ?>">            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea rows="4" class="form-control" name="ket"><?php echo $result->keterangan; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                            	<?php  } ?>
                            	<p><i>*maaf untuk trial tidak dapat diubah</i></p>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ubah Password anda</h4>
                                <small>Silahkan masukan sandi baru anda!</small>
                            </div>
                            <div class="content">                                                        
                            	<form action="<?php echo base_url('admin/profile/update_password')?>" method="post" novalidate>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Ubah Password*</label>
                                                <input type="hidden" value="<?php echo $result->id_owner ?>" name="id_owner" >
                                                <input type="password"  class="form-control" placeholder="Password"  name="password" value="password" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
	                            	<button type="submit" class="btn btn-info btn-fill pull-right">Simpan Password</button>
	                                <div class="clearfix"></div>   
	                            </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>
      