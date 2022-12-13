<!doctype html>
<html lang="en">

<head>
    <title>Daftar Akun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Daftar Pelanggan</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(<?= base_url() ?>login/images/background.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Daftar Akun</h3>
                                </div>
                                <div class="w-100">
                                    <!-- <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p> -->
                                </div>
                            </div>
                            <?php
                            echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses</h5>';
                                echo $this->session->flashdata('pesan');
                                echo '</div>';
                            } ?>
                            <form action="<?= base_url('pelanggan/register') ?>" method="POST" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" name="nama_wisatawan" class="form-control" value="<?= set_value('nama_wisatawan') ?>" required>
                                    <label class="form-control-placeholder" for="username">Nama Lengkap</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="ttl" value="<?= set_value('ttl') ?>" required>
                                    <label class="form-control-placeholder" for="username">Tempat, Tanggal Lahir</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="jk" value="<?= set_value('jk') ?>" required>
                                    <label class="form-control-placeholder" for="username">Jenis Kelamin</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>" required>
                                    <label class="form-control-placeholder" for="username">No Hp</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="provinsi" value="<?= set_value('provinsi') ?>" required>
                                    <label class="form-control-placeholder" for="username">Provinsi</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="kab_kota" value="<?= set_value('kab_kota') ?>" required>
                                    <label class="form-control-placeholder" for="username">Kabupaten / Kota</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="alamat_detail" value="<?= set_value('alamat_detail') ?>" required>
                                    <label class="form-control-placeholder" for="username">Alamat Lengkap</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" value="<?= set_value('username') ?>" name="username" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="password" value="<?= set_value('password') ?>" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Ulangi Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
                                </div>
                                <!-- <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div> -->
                            </form>
                            <p class="text-center">Sudah Punya akun? <a href="<?= base_url('pelanggan/login') ?>">Masuk</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url() ?>login/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>login/js/popper.js"></script>
    <script src="<?= base_url() ?>login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>login/js/main.js"></script>

</body>

</html>