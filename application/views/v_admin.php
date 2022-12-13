<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Jumlah Wisatawan</p>
                    <h6 class="mb-0"><?= $tot_wisatawan ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Jumlah Tiket Dipesan</p>
                    <h6 class="mb-0"><?= $tot_tiket ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Pendapatan</p>
                    <h6 class="mb-0"><?= $tot_uang ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total_booking</p>
                    <h6 class="mb-0"><?= $tot_boking ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Analisis Penjualan Tiket</h6>
                    <!-- <a href="">Show All</a> -->
                </div>
                <?php
                foreach ($grafik as $key => $value) {
                    $nama_tiket[] = $value->nama_tiket;
                    $qty[] = $value->qty;
                }
                ?>
                <canvas id="myChart"></canvas>
                <script>
                    var ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: <?= json_encode($nama_tiket) ?>,
                            datasets: [{
                                label: 'Grafik Tiket',
                                data: <?= json_encode($qty) ?>,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.80)',
                                    'rgba(54, 162, 235, 0.80)',
                                    'rgba(255, 206, 86, 0.80)',
                                    'rgba(75, 192, 192, 0.80)',
                                    'rgba(153, 102, 255, 0.80)',
                                    'rgba(255, 159, 64, 0.80)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)',
                                    'rgba(255, 99, 132, 0.80)',
                                    'rgba(54, 162, 235, 0.80)',
                                    'rgba(255, 206, 86, 0.80)',
                                    'rgba(75, 192, 192, 0.80)',
                                    'rgba(153, 102, 255, 0.80)',
                                    'rgba(255, 159, 64, 0.80)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)'
                                ],
                                fill: false,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Analisis Jenis Kelamin</h6>
                    <!-- <a href="">Show All</a> -->
                </div>
                <?php
                foreach ($grafik_kelamin as $key => $value) {
                    $jk[] = $value->jk;
                    $hasil[] = $value->hasil;
                }
                ?>
                <canvas id="myJK"></canvas>
                <script>
                    var ctx = document.getElementById('myJK');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?= json_encode($jk) ?>,
                            datasets: [{
                                label: 'Analisis Jenis Kelamin',
                                data: <?= json_encode($hasil) ?>,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.80)',
                                    'rgba(54, 162, 235, 0.80)',
                                    'rgba(255, 206, 86, 0.80)',
                                    'rgba(75, 192, 192, 0.80)',
                                    'rgba(153, 102, 255, 0.80)',
                                    'rgba(255, 159, 64, 0.80)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)',
                                    'rgba(255, 99, 132, 0.80)',
                                    'rgba(54, 162, 235, 0.80)',
                                    'rgba(255, 206, 86, 0.80)',
                                    'rgba(75, 192, 192, 0.80)',
                                    'rgba(153, 102, 255, 0.80)',
                                    'rgba(255, 159, 64, 0.80)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(201, 76, 76, 0.3)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(0, 140, 162, 1)',
                                    'rgba(158, 109, 8, 1)',
                                    'rgba(201, 76, 76, 0.8)',
                                    'rgba(0, 129, 212, 1)',
                                    'rgba(201, 77, 201, 1)',
                                    'rgba(255, 207, 207, 1)',
                                    'rgba(201, 77, 77, 1)',
                                    'rgba(128, 98, 98, 1)',
                                    'rgba(0, 0, 0, 1)',
                                    'rgba(128, 128, 128, 1)'
                                ],
                                fill: false,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Salse & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div> -->
    </div>
</div>
<!-- Sales Chart End -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <!-- <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Salse & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div> -->
    </div>
</div>
<!-- Sales Chart End -->