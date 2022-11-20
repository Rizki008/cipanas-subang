<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Accented Table</h6><a href="<?= base_url('user/add') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah User</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Level User</th>
                            <th scope="col">Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->nama_admin ?></td>
                                <td><?= $value->username_admin ?></td>
                                <td><?= $value->password_admin ?></td>
                                <td><?= $value->level_admin ?></td>
                                <td>
                                    <a href="<?= base_url('user/edit/' . $value->id_admin) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('user/hapus/' . $value->id_admin) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>