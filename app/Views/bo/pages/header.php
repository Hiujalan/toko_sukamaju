<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/bo/images/favicon.ico'); ?>" />

    <!-- jsvectormap css -->
    <link href="<?= base_url('assets/bo/libs/jsvectormap/jsvectormap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="<?= base_url('assets/bo/libs/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/bo/js/layout.js'); ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/bo/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/bo/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/bo/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/bo/css/custom.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/bo/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/bo/js/datatables/1.11.5/css/dataTables.bootstrap5.min.css'); ?>" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="<?= base_url('assets/bo/js/datatables/responsive/2.2.9/css/responsive.bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/bo/js/datatables/buttons/2.2.2/css/buttons.dataTables.min.css'); ?>" />
    <link href="<?= base_url('assets/bo/js/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/bo/libs/quill/quill.core.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/bo/libs/quill/quill.bubble.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/bo/libs/quill/quill.snow.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/bo/libs/filepond/filepond.min.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/bo/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'); ?>" />

    <!-- Vector map-->
    <script src="<?= base_url('assets/bo/libs/jsvectormap/jsvectormap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/jsvectormap/maps/world-merc.js'); ?>"></script>

    <!--Swiper slider js-->
    <script src="<?= base_url('assets/bo/libs/swiper/swiper-bundle.min.js'); ?>"></script>

    <!-- Dashboard init -->
    <script src="<?= base_url('assets/bo/js/pages/dashboard-ecommerce.init.js'); ?>"></script>


    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/bo/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/node-waves/waves.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/pages/plugins/lord-icon-2.1.0.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/1.11.5/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/1.11.5/js/dataTables.bootstrap5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/responsive/2.2.9/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/buttons/2.2.2/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/buttons/2.2.2/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/datatables/buttons/2.2.2/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/select2/dist/js/select2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/filepond/filepond.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js'); ?>"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>

    <!-- ckeditor -->
    <script src="<?= base_url('assets/bo/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js'); ?>"></script>

    <!-- quill js -->
    <script src="<?= base_url('assets/bo/libs/quill/quill.min.js'); ?>"></script>

    <!-- apexcharts -->
    <script src="<?= base_url('assets/bo/libs/apexcharts/apexcharts.min.js'); ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/bo/js/custom.js'); ?>"></script>

    <!-- PHOSPOR ICONS -->
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

</head>

<?php
$admin = session()->get('auth_access') == 1;
$employees = session()->get('auth_access') == 2;
?>

<body>

    <?php if (session()->getFlashdata('success') !== null) { ?>
        <div id="sweet_success_custom" data-message="<?= session()->getFlashdata('success'); ?>"></div>
    <?php } elseif (session()->getFlashdata('error')) { ?>
        <div id="sweet_error_custom" data-message='<?= session()->getFlashdata('error') ?>'></div>
    <?php } ?>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <!-- <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/bo/images/logo-sm.png'); ?>" alt="" height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/bo/images/logo-dark.png'); ?>" alt="" height="17" />
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/bo/images/logo-sm.png'); ?>" alt="" height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/bo/images/logo-light.png'); ?>" alt="" height="17" />
                                </span>
                            </a>
                        </div> -->

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen fs-22"></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class="bx bx-moon fs-22"></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('user/user_image?idx=' . session()->get('auth_idx')); ?>" alt="Header Avatar" />
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= session()->get('auth_name'); ?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= session()->get('auth_access_name'); ?></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Selamat Datang <?= session()->get('auth_name'); ?></h6>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width: 100px; height: 100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <!-- <a href="<?= base_url('dashboard'); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/bo/images/logo-sm.png'); ?>" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/bo/images/logo-dark.png'); ?>" alt="" height="17" />
                    </span>
                </a>
                <a href="<?= base_url('dashboard'); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/bo/images/logo-sm.png'); ?>" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/bo/images/logo-light.png'); ?>" alt="" height="17" />
                    </span>
                </a> -->
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                        <?php if ($admin || $employees) { ?>

                            <li class="nav-item">
                                <a class="nav-link menu-link <?= (isset($active_dashboard) ? $active_dashboard : ''); ?>" href="<?= base_url('dashboard'); ?>"> <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span> </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link menu-link <?= (isset($active_menu_transaction) ? $active_menu_transaction : ''); ?>" href="#transactionDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="transactionDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Transaksi</span>
                                </a>
                                <div class="collapse menu-dropdown <?= (isset($show_transaction) ? $show_transaction : ''); ?>" id="transactionDashboards">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link menu-link <?= (isset($active_transaction) ? $active_transaction : ''); ?>" href="<?= base_url('transaction'); ?>"> <span data-key="t-widgets">Transaksi</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link menu-link <?= (isset($active_add_transaction) ? $active_add_transaction : ''); ?>" href="<?= base_url('transaction/transaction_create'); ?>"> <span data-key="t-widgets">Buat Transaksi</span> </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        <?php } ?>

                        <?php if ($admin) { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?= (isset($active_product) ? $active_product : ''); ?>" href="<?= base_url('product'); ?>"> <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Barang</span> </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link <?= (isset($active_user) ? $active_user : ''); ?>" href="#userDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">User</span>
                                </a>
                                <div class="collapse menu-dropdown <?= (isset($show_user) ? $show_user : ''); ?>" id="userDashboards">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= base_url('user/admin'); ?>" class="nav-link <?= (isset($active_admin) ? $active_admin : ''); ?>" data-key="t-analytics"> Admin </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('user/employees'); ?>" class="nav-link <?= (isset($active_employees) ? $active_employees : ''); ?>" data-key="t-analytics"> Karyawan </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?= (isset($active_master) ? $active_master : ''); ?>" href="#masterDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="masterDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Master</span>
                                </a>
                                <div class="collapse menu-dropdown <?= (isset($show_master) ? $show_master : ''); ?>" id="masterDashboards">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= base_url('master/suplier'); ?>" class="nav-link <?= (isset($active_suplier) ? $active_suplier : ''); ?>" data-key="t-analytics"> Suplier </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('master/type'); ?>" class="nav-link <?= (isset($active_type) ? $active_type : ''); ?>" data-key="t-analytics"> Tipe Produk </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">