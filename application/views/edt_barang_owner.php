<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: auto;}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);}
</style>

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
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
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
                <?php echo form_open_multipart('admin/Edt_Barang/upload'); ?>
                <?php foreach($res as $rest) { ?>
                    <div class="col-md-4">
                        <div class="card">                                    
                            <!-- <input type="file" name="userfile"> -->
                            <!-- <textarea name="ket" placeholder="Keterangan (Optional)"></textarea> -->   
                            <div class="image" style="height: 100%;">
                                <img name="gambar" src="http://cimols.com/user/cimols_trial/Gambar/<?php echo $rest->gambar; ?>">
                            </div><br>
                            <!-- div class="content">

                            <button type="submit" class="btn btn-success btn-fill pull-left" name="upload">Edit Gambar</button>
                            <button type="submit" class="fileUpload btn btn-info btn-fill pull-right" name="userfile">Ubah Gambar</button>
                            <div class="clearfix"></div>
                            </div> -->

                            <div class="content">
                                <div class="fileUpload btn btn-success btn-fill pull-right">
                                    <input type="hidden" name="gambar" value="<?php echo $rest->gambar; ?>">
                                    <input type="File" name="userfile" size="20" class="upload"/> Ubah Gambar
                                </div>
                                    
                                <div>
                                    <button type="submit" class="btn btn-info btn-fill pull-left">Simpan</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        
                        </div>
                    </div>   

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Detail Barang</h4>
                            </div>
                            <div class="content">
                            <!-- <form></form> -->
                                <form novalidate>

                                 
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="item form-group">
                                                <label>Nama</label>
                                                <input type="hidden" class="form-control" placeholder="ID Barang" name="id" value="<?php echo $id->id; ?>">
                                                <input type="text" class="form-control" placeholder="Nama Barang" name="name" value="<?php echo $rest->name; ?>" required="required" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label>Harga</label>
                                                <input type="text" class="form-control" placeholder="Harga Barang" name="harbar" value="<?php echo $rest->harga_barang; ?>" required="required" maxlength="11">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="item form-group">
                                                <label>Berat</label>
                                                <input type="text" class="form-control"  placeholder="Berat Barang" name="berat" value="<?php echo $rest->berat; ?>" required="required" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="item form-group">
                                                <label>Stok</label>
                                                <input type="text" class="form-control" placeholder="Stok Barang" name="stok" value="<?php echo $rest->stok; ?>" required="required" maxlength="11">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label>Diskon</label>
                                                <input type="text" class="form-control" placeholder="Diskon Barang %" name="diskon" value="<?php echo $rest->diskon; ?>" required="required" maxlength="11">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="item form-group">
                                                <label>Kategori</label>
                                                <select class='form-control' id="kategori" name="kategori" required="required">
                                                        <!-- <option value="<?php echo $res->id_category ?>"><?php echo $res->category ?>                                            
                                                        </option> -->
                                                        <?php 
                                                            foreach ($category as $cat) {
                                                                echo '
                                                                <option value="'.$cat->id_category.'">'.$cat->category.'</option>
                                                                ';
                                                            }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label>Deskripsi</label>
                                                <textarea rows="3" class="form-control" name="deskripsi" required="required" maxlength="200" ><?php echo $rest->deskripsi; ?></textarea>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php } ?>     
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php echo form_close();?>
        
	
		<!-- <script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script> -->
                <!-- </div>
            </div>
        </div> -->
