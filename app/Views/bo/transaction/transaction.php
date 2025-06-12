<?php
$admin = session()->get('auth_access') == 1;
$employees = session()->get('auth_access') == 2;
?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title; ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
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
                        <a href="<?= base_url('transaction/transaction_create'); ?>" class="btn btn-soft-primary"><i class="ri-add-circle-line align-middle me-1"></i> Tambah <?= $header; ?></a>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nama Produk</th>
                                    <th>Total Transaksi</th>
                                    <th>Jumlah Produk</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($dt_transaction as $transaction) {
                                    $dt_product = $boModel->getAllProductSold($transaction['transaction_idx']);
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $transaction['transaction_date']; ?></td>
                                        <td><?php foreach ($dt_product as $product) {
                                                echo $product['product_name'] . ' ' . $product['product_variant'] . ' ' . $product['product_series'] . ', ';
                                            }; ?></td>
                                        <td><?= number_to_currency($transaction['transaction_price'], 'IDR', 'Rp.'); ?></td>
                                        <td><?= $transaction['transaction_qty']; ?></td>
                                        <td><?= $transaction['auth_name']; ?></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <?php if ($admin) { ?>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn sweet_warning_custom" data-url="<?= site_url('transaction/transaction_delete/' . $transaction['transaction_idx']); ?>"> <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus </a>
                                                        </li>
                                                    <?php } ?>
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