<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                            <li class="breadcrumb-item active"><?= $header; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0"><?= $header; ?></h5>
                        <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="ri-add-circle-line align-middle me-1"></i> Tambah <?= $header; ?></button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Nomor Telp</th>
                                    <th>Access</th>
                                    <th>Status</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt_admin as $admin) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $admin['auth_username']; ?></td>
                                        <td><?= $admin['auth_name']; ?></td>
                                        <td><?= $admin['auth_email']; ?></td>
                                        <td><?= $admin['auth_telp']; ?></td>
                                        <td><?= $admin['auth_access_name']; ?></td>
                                        <td>
                                            <?php if ($admin['is_active'] == 1) { ?>
                                                <span class="badge bg-success-subtle text-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger-subtle text-danger">Aktif</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <img src="<?= base_url('user/user_image?idx=' . $admin['auth_idx']); ?>" class="img-fluid" alt="User image">
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit-<?= $admin['auth_idx']; ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn sweet_warning_custom" data-url="<?= site_url('user/user_delete/' . $admin['auth_idx']); ?>"> <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </div>
    <!-- container-fluid -->
</div>


<!-- Grids in modals -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdd">Tambah <?= $header; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/user_add'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_name" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" name="auth_name" id="auth_name" placeholder="Masukkan nama pengguna" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_email" class="form-label">Email Pengguna</label>
                                <input type="text" class="form-control" name="auth_email" id="auth_email" placeholder="Masukkan email pengguna" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_telp" class="form-label">Nomor Telephone Pengguna</label>
                                <input type="text" class="form-control" name="auth_telp" id="auth_telp" placeholder="Masukkan nomor telephone pengguna" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_telp" class="form-label">Profile Pengguna</label>
                                <input type="file" class="filepond filepond-input-multiple" name="auth_image" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1" data-accepted-file-types="image/jpeg, image/jpg, image/png">
                            </div>
                        </div>

                        <hr>

                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="auth_username" id="auth_username" placeholder="Masukkan username pengguna" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_password" class="form-label">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input auth_password" name="auth_password" placeholder="Masukkan password" id="auth_password" required>
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon" onclick="showpassword()"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="auth_access" class="form-label">Hak Akses</label>
                                <select class="form-control mb-3" name="auth_access" aria-label="select">
                                    <option>Silahkan Pilih</option>
                                    <?php foreach ($dt_access as $access) { ?>
                                        <option value="<?= $access['auth_access_id']; ?>"><?= $access['auth_access']; ?> - <?= $access['auth_access_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($dt_admin as $admin) { ?>
    <div class="modal fade" id="modalEdit-<?= $admin['auth_idx']; ?>" tabindex="-1" aria-labelledby="modalEdit" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdd">Edit <?= $header; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/user_edit'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="auth_idx" value="<?= $admin['auth_idx']; ?>">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_name" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="auth_name" value="<?= $admin['auth_name']; ?>" id="auth_name" placeholder="Masukkan nama pengguna" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_email" class="form-label">Email Pengguna</label>
                                    <input type="text" class="form-control" name="auth_email" value="<?= $admin['auth_email']; ?>" id="auth_email" placeholder="Masukkan email pengguna" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_telp" class="form-label">Nomor Telephone Pengguna</label>
                                    <input type="text" class="form-control" name="auth_telp" value="<?= $admin['auth_telp']; ?>" id="auth_telp" placeholder="Masukkan nomor telephone pengguna" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="text-center">
                                    <img src="<?= base_url('user/user_image?idx=' . $admin['auth_idx']); ?>" class="img-fluid" alt="User image">
                                </div>
                                <div>
                                    <label for="auth_telp" class="form-label">Profile Pengguna</label>
                                    <input type="file" class="filepond filepond-input-multiple" name="auth_image" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1" data-accepted-file-types="image/jpeg, image/jpg, image/png">
                                    <div class="text-muted">Kosongkan jika tidak mengubah gambar</div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="auth_username" value="<?= $admin['auth_username']; ?>" id="auth_username" placeholder="Masukkan username pengguna" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_password" class="form-label">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input auth_password" name="auth_password" placeholder="Masukkan password" id="auth_password">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon" onclick="showpassword()"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <div class="text-muted">kosongkan jika tidak mengganti password</div>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="auth_access" class="form-label">Hak Akses</label>
                                    <select class="form-control mb-3" name="auth_access" aria-label="select">
                                        <option>Silahkan Pilih</option>
                                        <?php foreach ($dt_access as $access) {
                                            if ($admin['auth_access_id'] == $access['auth_access_id']) { ?>
                                                <option value="<?= $access['auth_access_id']; ?>" selected><?= $access['auth_access']; ?> - <?= $access['auth_access_name']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $access['auth_access_id']; ?>"><?= $access['auth_access']; ?> - <?= $access['auth_access_name']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="is_active" class="form-label">Aktif</label>
                                    <select class="form-select mb-3" name="is_active" aria-label="select is_active">
                                        <option value="1" <?= ($admin['is_active'] == 1) ? 'selected' : ''; ?>>Ya</option>
                                        <option value="0" <?= ($admin['is_active'] == 0) ? 'selected' : ''; ?>>Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function showpassword() {
        var elements = document.getElementsByClassName("auth_password");
        for (var i = 0; i < elements.length; i++) {
            if (elements[i].type === "password") {
                elements[i].type = "text";
            } else {
                elements[i].type = "password";
            }
        }
    }
</script>