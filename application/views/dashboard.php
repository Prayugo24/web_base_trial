<style type="text/css">
    #lineChart {
         width: 400;
         height: 100;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

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
                    <a class="navbar-brand" href="#">Dashboard</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">CIMOLS</h4>
                                <p class="category">Cafe Imers Mobile Online Shop</p>
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                    <div class="font-icon-list col-xs-2">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/index'); ?>">
                                                <i class="pe-7s-graph"></i>
                                                <input type="text" value="Beranda">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/Profile/daftar'); ?>">
                                                <i class="pe-7s-user"></i>
                                                <input type="text" value="Profile">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail" >
                                            <a href="<?php echo base_url('admin/barang'); ?>">
                                                <i class="pe-7s-shopbag"></i>
                                                <input type="text" value="Barang">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/barang'); ?>">
                                                <i class="pe-7s-edit"></i>
                                                <input type="text" value="Edit Barang">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/resi') ?>">
                                                <i class="pe-7s-drawer"></i>
                                                <input type="text" value="Order Masuk">
                                            </a>
                                        </div>
                                    </div><div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/kategori/index'); ?>">
                                                <i class="pe-7s-photo-gallery"></i>
                                                 <input type="text" value="Kategori">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                        <div class="font-icon-detail">
                                            <a href="<?php echo base_url('admin/rekap'); ?>">
                                                <i class="pe-7s-date"></i>
                                                 <input type="text" value="Rekap Data">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Trafik Penjualan</h4>
                                <p class="category">Rentang 1 Tahun</p>
                            </div>
                            <div class="chart-container">
                                <canvas id="barChart" width="400" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $.ajax({
                    url: "http://cimols.com/user/cimols_trial/admin/Dashboard/view",
                    method: "GET",
                    success: function(data) {
                        console.log(data);
                        var bulan = [];
                        var total = [];

                        for(var i in data) {
                            bulan.push("Bulan " + data[i].bulan);
                            total.push(data[i].total);
                        }

                        var chartdata = {
                            labels: bulan,
                            datasets : [
                                {
                                    label: "Data Pertahun",
                                    fill: false,
                                    lineTension: 0.1,
                                    backgroundColor: "rgb(255, 132, 136)",
                                    borderColor: "rgb(228, 35, 43)",
                                    borderCapStyle: 'butt',
                                    borderDash: [],
                                    borderDashOffset: 0.0,
                                    borderJoinStyle: 'miter',
                                    pointBorderColor: "rgb(228, 35, 43)",
                                    pointBackgroundColor: "#fff",
                                    pointBorderWidth: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                    pointHoverBorderColor: "rgba(220,220,220,1)",
                                    pointHoverBorderWidth: 2,
                                    pointRadius: 1,
                                    pointHitRadius: 10,
                                    data: total
                                }
                            ]
                        };

                        var ctx = $("#barChart");

                        var barGraph = new Chart(ctx, {
                            type: 'line',
                            data: chartdata
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        </script>