<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Barang</a></li>
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
                        <a href="<?= base_url('product/product_add'); ?>" class="btn btn-soft-primary"><i class="ri-add-circle-line align-middle me-1"></i> Tambah <?= $header; ?></a>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Varian Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Brand Produk</th>
                                    <th>Tipe Produk</th>
                                    <th>Gambar Produk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt_product as $product) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $product['product_code']; ?></td>
                                        <td><?= $product['product_name']; ?></td>
                                        <td><?= $product['product_variant']; ?></td>
                                        <td><?= number_to_currency($product['product_price'], 'IDR', 'Rp'); ?></td>
                                        <td><?= $product['suplier_brand']; ?></td>
                                        <td><?= $product['product_type']; ?></td>
                                        <td>
                                            <img src="<?= base_url('product/product_image?idx=' . $product['product_idx']); ?>" class="img-fluid" alt="Product image">
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="<?= base_url('product/product_edit/' . $product['product_idx']); ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn sweet_warning_custom" data-url="<?= site_url('product/product_delete/' . $product['product_idx']); ?>"> <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus </a>
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