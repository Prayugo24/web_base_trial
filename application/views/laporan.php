<style type="text/css">
    .alnright {text-align: right;}
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
                    <div class="col-md-5 col-md-offset-2">
                        <div class="card">
                            <div class="content" >         
                            <form action="<?php echo base_url('admin/rekap/cetak'); ?>" method="post" novalidate>
                                <div class="row"><h5 class="title" align="center">Cetak Laporan berdasar Tanggal</h5>   </div> </div>                    
                                <div class="container" >

                                    <div class="row">                                    
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <div class='input-group date' >
                                                    <input type="text" id="datetimepicker1" name="datetimepicker1" class="form-control" data-date-format="yyyy-mm-dd" required="required" />
                                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <div class='input-group date'>
                                                    <input type="text" id="datetimepicker2" name="datetimepicker2" class="form-control" data-date-format="yyyy-mm-dd" required="required"  />
                                                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" id="submit-btn" class="btn btn-success btn-fill pull-right">Cetak</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                               
                            </div>

                    </div>

                     
                
        

                <!-- <div class="row">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="fixed-table-toolbar">
                                <div class="bars pull-left">
                                    <p style="font-weight: bold;">No.</p> <br>
                                    <p style="font-size: 12px; font-weight: bold;">AN. Samsudin</p>
                                </div>
                                <div class="bars pull-right" style="padding-right: 50px; padding-top: 50px;">
                                    <p style="font-size: 12px; font-weight: bold;">Tanggal </p>
                                    <p style="font-size: 12px; font-weight: bold;">Via : JNE</p>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form action="<?php echo base_url('admin/rekap/cetak'); ?>" method="post">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 250px;">Nama Barang</th>
                                        <th class="text-center">QTY</th>
                                        <th>Harga Jual</th>
                                        <th class="text-center">Diskon</th>
                                        <th class="text-center">Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dakota Rice</td>
                                            <td class="text-center">8</td>
                                            <td>Rp 2000</td>
                                            <td class="text-center">10%</td>
                                            <td class="text-center">Rp 131313</td>
                                        </tr>
                                        <tr>
                                            <td>Dakota Rice</td>
                                            <td class="text-center">8</td>
                                            <td>Rp 2000</td>
                                            <td class="text-center">10%</td>
                                            <td class="text-center">Rp 131313</td>
                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                                <table class="content table table-responsive table-full-width" >
                                    <tr bgcolor="#f5f5f5">
                                        <th colspan="4" class="text-right" style="text-transform: uppercase; padding-right: 50px" >Biaya Pengiriman :</th>
                                        <th class="text-center" style=" padding-right: 20px">daw</th>
                                    </tr>
                                    <tr bgcolor="#f5f5f5">
                                        <th colspan="4" class="text-right" style="text-transform: uppercase; padding-right: 50px" >Total Transaksi :</th>
                                        <th class="text-center" style=" padding-right: 20px">daw</th>
                                    </tr>   
                                </table><br>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
          <script>
  $( function() {
    $( "#datetimepicker1" ).datepicker({dateFormat:'yy-mm-dd'});
      $('#datetimepicker1').on('change', function() {
        alert($('#datetimepicker1').val());
        });
    $( "#datetimepicker2" ).datepicker({dateFormat:'yy-mm-dd'});
      $('#datetimepicker2').on('change', function() {
        alert($('#datetimepicker2').val());
        });
  } );
  </script>