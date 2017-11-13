const CHART = document.getElementById('lineChart');
console.log(CHART);
let barChart = new Chart(CHART, {
	type: 'line',
	data: {
		    labels: ["January", "February", "March", "April", "May", "June", "July"],
		    datasets: [
		        {
		            label: "My First dataset",
		            fill: true,
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
		            data: [65, 59, 80, 81, 56, 55, 40],
		            spanGaps: false,
		        }
		    ]
		}
	});

	$(document).ready(function(){
                $.ajax({
                    url: "<?php echo base_url('admin/data_rekap/view') ?>",
                    method: "GET",
                    success: function(data) {
                        console.log(data);
                        var bulan = [];
                        var total = [];

                        for(var i in data) {
                            bulan.push("Bulan " + data[i].bulanid);
                            total.push(data[i].total);
                        }

                        var chartdata = {
                            labels: bulan,
                            datasets : [
                                {
                                    label: 'Data Pertahun',
                                    backgroundColor: 'rgba(200, 200, 200, 0.75)',
                                    borderColor: 'rgba(200, 200, 200, 0.75)',
                                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                    data: total
                                }
                            ]
                        };

                        var ctx = $("#dataChart");

                        var barGraph = new Chart(ctx, {
                            type: 'bar',
                            data: chartdata
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });