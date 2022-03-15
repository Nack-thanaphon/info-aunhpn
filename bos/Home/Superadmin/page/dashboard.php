<?php
include "../../../bos/Function/function.php"
?>
<div class="row">
    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-primary">
            <div class="panel-heading"><strong>จำนวนผู้เข้าชมเว็บไซต์</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo web_count_static($conn); ?> </h1>

            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././webstatic.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-warning">
            <div class="panel-heading "><strong>จำนวนเอกสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo  count_total_file($conn) ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././file.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-success">
            <div class="panel-heading "><strong>ผู้ดูแลระบบ</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_user($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././user.php" class="small-box-footer py-3  text-white opacity-50"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3   text-white">
        <div class="panel panel-default text-center shadow-sm bg-info">
            <div class="panel-heading"><strong>จำนวนข่าวสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_news($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././news.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 py-3">

        <h4>จำนวนผู้เข้าชมเว็บไซต์</h4>
    </div>


    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">จำนวนผู้เข้าชม(รายสัปดาห์)</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="web_stat_daily" style="display: block; width: 668px; height: 320px;" width="668"
                        height="320" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">จำนวนผู้เข้าชม(ตามสถานที่)</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="web_stat_nation" width="301" height="245"
                        style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>





</div>



<script>
$(document).ready(function() {
    web_stat_nation();
});

function web_stat_nation() {


    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/Web_static/create.php",
        data: {},
    }).done(function(data) {

        console.log(data)
        let name = [];
        let total = [];
        for (var i = 0; i < data.length; i++) {
            name.push(data[i].name);
            total.push(data[i].total);
        }


        var ctx = document.getElementById("web_stat_nation");
        let myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: name,
                datasets: [{
                    data: total,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#96b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });

}
</script>
<script>
$(document).ready(function() {
    web_stat_nation();
});

function web_stat_nation() {


    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/Web_static/create.php",
        data: {},
    }).done(function(data) {

        console.log(data)
        let name = [];
        let total = [];
        for (var i = 0; i < data.length; i++) {
            name.push(data[i].name);
            total.push(data[i].total);
        }

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        var ctx = document.getElementById("web_stat_daily");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: name,
                datasets: [{
                    label: name,
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: total,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 15000,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });
    });
</script>