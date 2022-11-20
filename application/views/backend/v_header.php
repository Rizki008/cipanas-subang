<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-solid fa-bath"></i>CIPANAS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?= base_url() ?>backend/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="<?= base_url('tiket') ?>" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Tiket</a>
                    <a href="<?= base_url('user') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>User</a>
                    <a href="<?= base_url('promo') ?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Promo</a>
                    <!-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pemesanan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= base_url('transaksi/masuk')?>" class="dropdown-item">Booking Masuk</a>
                            <a href="<?= base_url('transaksi/proses')?>" class="dropdown-item">Booking Proses</a>
                            <a href="<?= base_url('transaksi/selesai')?>" class="dropdown-item">Booking Selesai</a>
                            <a href="<?= base_url('transaksi/batal')?>" class="dropdown-item">Booking Batal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->