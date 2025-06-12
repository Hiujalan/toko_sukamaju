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
                        <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="ri-add-circle-line align-middle me-1"></i> Tambah <?= $header; ?></button>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Tipe Produk</th>
                                    <th>Tipe Produk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt_type as $type) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $type['product_code']; ?></td>
                                        <td><?= $type['product_type']; ?></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item edit-item-btn" data-bs-toggle="modal" href="#modalEdit-<?= $type['product_type_id']; ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn sweet_warning_custom" data-url="<?= site_url('master/type_delete/' . $type['product_type_id']); ?>"> <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus </a>
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
                <form action="<?= base_url('master/type_add'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="product_code" class="form-label">Kode Tipe Produk</label>
                                <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Masukkan kode tipe produk" max="4" maxlength="4" required>
                                <div class="text-muted">Maksimal 4 huruf</div>
                            </div>
                            <div>
                                <label for="product_type" class="form-label">Tipe Produk</label>
                                <input type="text" class="form-control" name="product_type" id="product_type" placeholder="Masukkan tipe produk" required>
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

<?php foreach ($dt_type as $type) { ?>
    <div class="modal fade" id="modalEdit-<?= $type['product_type_id']; ?>" tabindex="-1" aria-labelledby="modalEdit" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdd">Edit <?= $header; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/type_edit'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="product_type_id" value="<?= $type['product_type_id']; ?>">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="product_code" class="form-label">Kode Tipe Produk</label>
                                    <input type="text" class="form-control" name="product_code" value="<?= $type['product_code']; ?>" id="product_code" placeholder="Masukkan kode tipe produk" max="4" maxlength="4" required>
                                </div>
                                <div>
                                    <label for="product_type" class="form-label">Tipe Produk</label>
                                    <input type="text" class="form-control" name="product_type" value="<?= $type['product_type']; ?>" id="product_type" placeholder="Masukkan tipe produk" required>
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