<?php

/**
 * Created by PhpStorm.
 * User: Taufik
 * Date: 8/18/2021
 * Time: 9:49 AM
 */
?>
<?php $this->load->view('header'); ?>
<!-- content -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <!-- <a href="" class="btn btn-primary">This is action area</a> -->
        </div>
    </div>
</div>
<br>

<!-- testing -->
<?php if($role == "1") { ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<div class="row">

    <div class="col-lg-12 row wrapper ">

        <div class="ibox ">

            <div class="col-sm-12 white-bg ">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title"></h3>

                    </div>

                    <div class="box-body">
                    <div class="row">

                        <div class="col-lg-6 ">
                            <canvas id="graph" width="200px" height="100px"></canvas>
                        </div>
                        <div class="col-lg-6 ">
                            <canvas id="graph2" width="200px" height="100px"></canvas>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        

                        <div class="col-lg-6 ">
                            <canvas id="graph3" width="200px" height="100px"></canvas>
                        </div>

                        <div class="col-lg-6 col-sm-12" >
                            <hr>
                            <div class="row" style="padding-left: 10px; padding-top: 15px">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">Average /t</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['average'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">Today</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['today'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">Yesterday</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['yesterday'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">This Month</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['month'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">Last Month</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['lastmonth'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">This Year</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['year'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="numbers">
                                                        <p class="card-category">Last Year</p>
                                                        <h4 class="card-title">Rp. <?= number_format($transaction['lastyear'], 0, ',', '.') ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">User Role</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <?php
                                                        foreach ($cnt_user as $row) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $row->user_role ?></td>
                                                                <td class="text-right">
                                                                    <?= $row->cnt ?>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ml-auto mr-auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        
            

                    </div>

                </div>

                <!-- /.box -->

                <br><br><br><br>

            </div>

            <!-- EO : content  -->

            <!-- ...................................................................... -->

        </div>

    </div>

</div>
<br><div class="container-fluid">
    <div class="row">
        
    </div>
    <br>
    

</div>

<!-- end -->

<script>
    var topuser_nm = [];
    var topuser_amt = [];
    <?php
    $arrnm_topuser = json_encode($topuser['name']);
    echo "topuser_nm = ". $arrnm_topuser . ";\n";
    $arramt_topuser = json_encode($topuser['total']);
    echo "topuser_amt = ". $arramt_topuser . ";\n";
    ?>
    const ctx = document.getElementById('graph');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: topuser_nm,
            datasets: [{
                label: 'Top Base',
                data: topuser_amt,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var transhis_nm = [];
    var transhis_amt = [];
    <?php
    $arrnm_transhis = json_encode($transhis['name']);
    echo "transhis_nm = ". $arrnm_transhis . ";\n";
    $arramt_transhis = json_encode($transhis['total']);
    echo "transhis_amt = ". $arramt_transhis . ";\n";
    ?>
    const ctx2 = document.getElementById('graph2');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: transhis_nm,
            datasets: [{
                label: 'Weekly Transactions',
                data: transhis_amt,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });    var dtranshis_nm = [];
    var dtranshis_amt = [];
    <?php
    $arrnm_dtranshis = json_encode($dtranshis['name']);
    echo "dtranshis_nm = ". $arrnm_dtranshis . ";\n";
    $arramt_dtranshis = json_encode($dtranshis['total']);
    echo "dtranshis_amt = ". $arramt_dtranshis . ";\n";
    ?>
    const ctx3 = document.getElementById('graph3');
    const myChart3 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: dtranshis_nm,
            datasets: [{
                label: 'Daily Transactions',
                data: dtranshis_amt,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php } ?>
<!-- content -->
<?php $this->load->view('footer'); ?>