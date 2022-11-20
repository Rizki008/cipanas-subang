<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <?php
            echo validation_errors(
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>',
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            echo form_open('user/edit/'.$user->id_admin) ?>
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?= $title ?> &nbsp; <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i>Edit User</button></h6>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_admin" value="<?= $user->nama_admin ?>" class="form-control" id="floatingInput" placeholder="Nama User">
                    <label for="floatingInput">Nama User</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username_admin" value="<?= $user->username_admin ?>" id="floatingPassword" placeholder="Username">
                    <label for="floatingPassword">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="level_admin" value="<?= $user->level_admin ?>" aria-label="Floating label select example">
                        <option selected value="<?= $user->id_admin ?>"><?= $user->level_admin ?></option>
                        <option value="1">Admin</option>
                        <option value="2">Pemilik</option>
                    </select>
                    <label for="floatingSelect">Pilih Level User</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_admin" value="<?= $user->password_admin ?>" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>