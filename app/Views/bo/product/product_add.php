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
                        <a href="<?= base_url('product'); ?>" class="btn btn-soft-primary"><i class="ph ph-arrow-circle-left align-middle me-1"></i> Kembali </a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('product/product_add_proces'); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_name" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Masukkan nama produk" required>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_variant" class="form-label">Varian Produk</label>
                                        <input type="text" class="form-control" name="product_variant" id="product_variant" placeholder="Masukkan varian produk" required>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_series" class="form-label">Series Produk</label>
                                        <input type="text" class="form-control" name="product_series" id="product_series" placeholder="Masukkan series produk" required>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_price" class="form-label">Harga Produk</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                Rp.
                                            </div>
                                            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Masukkan harga produk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="suplier_idx" class="form-label">Suplier</label>
                                        <select class="form-control mb-3 select-search" name="suplier_idx" aria-label="select">
                                            <option>Silahkan Pilih</option>
                                            <?php foreach ($dt_suplier as $suplier) { ?>
                                                <option value="<?= $suplier['suplier_idx']; ?>"><?= $suplier['suplier_name']; ?> - <?= $suplier['suplier_brand']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_type" class="form-label">Tipe Produk</label>
                                        <select class="form-control mb-3 select-search" name="product_type" aria-label="select">
                                            <option>Silahkan Pilih</option>
                                            <?php foreach ($dt_type as $type) { ?>
                                                <option value="<?= $type['product_type_id']; ?>"><?= $type['product_type']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_spec" class="form-label">Spesifikasi Produk</label>
                                        <textarea name="product_spec" class="ckeditor-classic"></textarea>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div>
                                        <label for="product_image" class="form-label">Gambar Produk</label>
                                        <input type="file" class="filepond filepond-input-multiple" name="product_image" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1" data-accepted-file-types="image/jpeg, image/jpg, image/png">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </div>
    <!-- container-fluid -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("product_price");

        input.addEventListener("input", function(e) {
            const cursorPosition = input.selectionStart;
            const rawValue = input.value.replace(/[^\d]/g, "");
            if (!rawValue) {
                input.value = "";
                return;
            }

            const formatted = formatRupiah(rawValue);

            // Hitung selisih panjang sebelum dan sesudah format
            const lengthDiff = formatted.length - input.value.length;

            input.value = formatted;

            // Pulihkan posisi kursor setelah format
            input.setSelectionRange(cursorPosition + lengthDiff, cursorPosition + lengthDiff);
        });

        function formatRupiah(number) {
            return new Intl.NumberFormat("id-ID").format(number);
        }
    });
</script>