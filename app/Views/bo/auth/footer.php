<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mb-0 text-muted">&copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Hervalan. Crafted with <i class="mdi mdi-heart text-danger"></i> by Alan Herva Ikhsan Saputra
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<script>
    $(document).ready(function() {
        function initSelect2(modal) {
            $(".select-search", modal).select2({
                dropdownParent: $('#modalAdd .modal-content'),
                width: '100%',
            });
        }

        $("#modalAdd").on("shown.bs.modal", function() {
            initSelect2(this);
        });
    });
</script>


</body>

</html>