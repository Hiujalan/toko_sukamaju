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
                        <div style="width: 30%;">
                            <select class="form-control mb-3 select-search" name="product_query" aria-label="select" multiple autofocus>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('transaction/transaction_add_process'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <table id="table-produk" class="table datatable-init table-bordered dt-responsive nowrap table-striped align-middle" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-end">Total Keseluruhan</th>
                                        <th><input type="text" id="grand-total" class="form-control" readonly value="0"></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="d-flex flex-row-reverse mt-3">
                                <button type="submit" class="btn btn-soft-primary"><i class="ri-add-circle-line align-middle me-1"></i> Buat Transaksi</button>
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
    $(document).ready(function() {
        let table = $('#table-produk').DataTable();
        let counter = 1;

        $('.select-search').select2({
            placeholder: 'Cari produk...',
            minimumInputLength: 2,
            ajax: {
                url: '<?= base_url('product/search'); ?>',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.product_idx,
                                text: item.product_code + ' - ' + item.product_name + ' ' + item.product_variant + ' ' + item.product_series,
                                price: item.product_price,
                            };
                        })
                    };
                },
                cache: true
            }
        });

        $('.select-search').on('select2:select', function(e) {
            const data = e.params.data;
            const formattedPrice = formatRibuan(data.price);

            const row = `
                <tr>
                    <td>${counter}<input type="hidden" name="product_idx[]" value="${data.id}"></td>
                    <td>${data.text}</td>
                    <td><input type="text" class="form-control harga" name="product_price[]" value="${formattedPrice}" readonly></td>
                    <td><input type="number" class="form-control jumlah" name="transaction_qty[]" value="1" min="1"></td>
                    <td><input type="text" class="form-control total" name="transaction_total[]" value="${formattedPrice}" readonly></td>
                </tr>
            `;

            table.row.add($(row)).draw();
            updateGrandTotal();

            counter++;

            // Kosongkan kembali select
            $('.select-search').val(null).trigger('change');
        });

        $('#table-produk tbody').on('input', '.jumlah', function() {
            const row = $(this).closest('tr');
            const harga = parseRibuan(row.find('.harga').val());
            const jumlah = parseInt($(this).val()) || 0;
            const total = harga * jumlah;

            row.find('.total').val(formatRibuan(total));
            updateGrandTotal();
        });

    });

    function updateGrandTotal() {
        let grandTotal = 0;

        $('#table-produk tbody .total').each(function() {
            grandTotal += parseRibuan($(this).val());
        });

        $('#grand-total').val(formatRibuan(grandTotal));
    }


    function formatRibuan(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    function parseRibuan(text) {
        return parseInt(text.replace(/\./g, '')) || 0;
    }
</script>