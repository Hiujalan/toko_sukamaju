<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
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
                        <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="ri-add-circle-line align-middle me-1"></i> Tambah Suplier</button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Suplier</th>
                                    <th>Nama Suplier</th>
                                    <th>Nomor Telephone</th>
                                    <th>Email</th>
                                    <th>Nama Brand</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt_suplier as $suplier) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $suplier['suplier_code']; ?></td>
                                        <td><?= $suplier['suplier_name']; ?></td>
                                        <td><?= $suplier['suplier_telp']; ?></td>
                                        <td><?= $suplier['suplier_email']; ?></td>
                                        <td><?= $suplier['suplier_brand']; ?></td>
                                        <td>
                                            <?php if ($suplier['is_active'] == 1) { ?>
                                                <span class="badge bg-success-subtle text-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger-subtle text-danger">Aktif</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item edit-item-btn" data-bs-toggle="modal" href="#modalEdit-<?= $suplier['suplier_idx']; ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn sweet_warning_custom" data-url="<?= site_url('master/suplier_delete/' . $suplier['suplier_idx']); ?>"> <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus </a>
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
                <h5 class="modal-title" id="modalAdd">Tambah Suplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('master/suplier_add'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="suplier_code" class="form-label">Kode Suplier</label>
                                <input type="text" class="form-control" name="suplier_code" id="suplier_code" placeholder="Masukkan kode suplier" max="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="suplier_name" class="form-label">Nama Suplier</label>
                                <input type="text" class="form-control" name="suplier_name" id="suplier_name" placeholder="Masukkan nama suplier">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="suplier_telp" class="form-label">Nomor Telephone</label>
                                <input type="number" class="form-control" name="suplier_telp" id="suplier_telp" placeholder="Masukkan nomor telephone">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="suplier_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="suplier_email" id="suplier_email" placeholder="Masukkan email suplier">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="suplier_brand" class="form-label">Nama Brand</label>
                                <input type="text" class="form-control" name="suplier_brand" id="suplier_brand" placeholder="Masukkan nama brand suplier">
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

<?php foreach ($dt_suplier as $suplier) { ?>
    <div class="modal fade" id="modalEdit-<?= $suplier['suplier_idx']; ?>" tabindex="-1" aria-labelledby="modalEdit" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdd">Edit Suplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/suplier_edit'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="suplier_idx" value="<?= $suplier['suplier_idx']; ?>">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="suplier_code" class="form-label">Kode Suplier</label>
                                    <input type="text" class="form-control" name="suplier_code" value="<?= $suplier['suplier_code']; ?>" id="suplier_code" placeholder="Masukkan kode suplier" max="10" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="suplier_name" class="form-label">Nama Suplier</label>
                                    <input type="text" class="form-control" name="suplier_name" value="<?= $suplier['suplier_name']; ?>" id="suplier_name" placeholder="Masukkan nama suplier" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="suplier_telp" class="form-label">Nomor Telephone</label>
                                    <input type="number" class="form-control" name="suplier_telp" value="<?= $suplier['suplier_telp']; ?>" id="suplier_telp" placeholder="Masukkan nomor telephone" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="suplier_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="suplier_email" value="<?= $suplier['suplier_email']; ?>" id="suplier_email" placeholder="Masukkan email suplier" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="suplier_brand" class="form-label">Nama Brand</label>
                                    <input type="text" class="form-control" name="suplier_brand" value="<?= $suplier['suplier_brand']; ?>" id="suplier_brand" placeholder="Masukkan nama brand suplier" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="is_active" class="form-label">Aktif</label>
                                    <select class="form-select mb-3" name="is_active" aria-label="select is_active">
                                        <option value="1" <?= ($suplier['is_active'] == 1) ? 'selected' : ''; ?>>Ya</option>
                                        <option value="0" <?= ($suplier['is_active'] == 0) ? 'selected' : ''; ?>>Tidak</option>
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