<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url('login/logout'); ?>">
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
                <div id="fileupload">
                    <form id="upload-media-form" class="dropzone" method="POST" action="<?php echo base_url('admin/barang/upload_masal') ?>" enctype="multipart/form-data">
                        <h3 class="dz-message" data-dz-message>Seret file gambar atau ketuk disini untuk upload.</h3>
                    </form>
                </div>
                <br>
                <div id="dropzone-previews" class="col-md-12"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Nama Barang</h4>
                        </div>
                        <div class="content">
                            <form id="data-tambahan">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="item form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" required="required" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Barang" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Berat</label>
                                            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat Barang" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok Barang" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <input type="text" class="form-control" name="diskon" id="diskon" placeholder="Diskon Barang %" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class='form-control' id="kategori" name="kategori" required="required">
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
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea rows="3" class="form-control" name="default-deskripsi" id="default-deskripsi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="tekan btn btn-success btn-fill pull-right">Tambah Barang</button>
                                <div class="clearfix"></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

    Dropzone.options.uploadMediaForm = {
    acceptedFiles: 'image/*',
    paramName: 'media',
    maxFileSize: 20, //Megabyte
    thumbnailWidth: '128',
    autoProcessQueue: false,
    previewsContainer: '#dropzone-previews',
    previewTemplate: '<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete col-md-6" style="margin-bottom: 1em">' +
        '<div class="dz-image" style="display: flex"><img style="margin: 0 auto;" data-dz-thumbnail /></div>' +
        '<div class="dz-details">' +
        '    <div class="dz-size"><span data-dz-size></span></div>' +
        '    <div class="dz-filename"><span data-dz-name></span></div>' +
        '</div>' +
        '<div class="dz-error-message"><span data-dz-errormessage></span></div>' +
        '<form id="tambahan">' +
        '<textarea id="deskripsi" name="deskripsi" class="form-control deskripsi" placeholder="Deskripsi Detail Barang"></textarea>' +
        '</form>' +
        '<div class="dz-progress"><span class="dz-upload" style="display: block; background-color: red; height: 10px; width: 0%;" data-dz-uploadprogress></span></div>' +
        '</div>',

    accept: function (media, done) {
        done();
    },
    init: function() {
        var submitButton = document.querySelector('.tekan');
        var myDropzone = this;

        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        myDropzone.on('processing', function() {
            this.options.autoProcessQueue = true;
        });

        myDropzone.on('sending', function(media, xhr, formData) {
            var previewForm = media.previewElement.querySelector('form');
            var formData2 = new FormData(previewForm);

            if (formData2.get('deskripsi').trim() == '') {
                formData.append('deskrip', document.getElementById('default-deskripsi').value);
            } else {
                formData.append('deskrip', formData2.get('deskripsi'));
            }

            var additionalData = document.getElementById('data-tambahan');
            var additionalForm = new FormData(additionalData);

            formData.append('nama', additionalForm.get('nama'));
            formData.append('harga', additionalForm.get('harga'));
            formData.append('berat', additionalForm.get('berat'));
            formData.append('stok', additionalForm.get('stok'));
            formData.append('diskon', additionalForm.get('diskon'));
            formData.append('kategori', additionalForm.get('kategori'));
        });

        myDropzone.on('queuecomplete', function(file) {
              setTimeout(function() {
                  // window.location.href(base_url('admin/Barang'));
                  window.location.reload();
              }, 2200);
          });

    }
};

</script>