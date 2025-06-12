<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title><?= isset($title) ? $title : 'Sign In | Velzon - Admin & Dashboard Template'; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/bo/ges/favicon.ico'); ?>">

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


    <!-- JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/bo/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/node-waves/waves.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/libs/feather-icons/feather.min.js'); ?>"></script>

    <script src="<?= base_url('assets/bo/js/pages/plugins/lord-icon-2.1.0.js'); ?>"></script>
    <script src="<?= base_url('assets/bo/js/plugins.js'); ?>"></script>

    <script src="<?= base_url('assets/bo/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>

    <script src="<?= base_url('assets/bo/js/custom.js'); ?>"></script>

    <!-- particles js -->
    <script src="<?= base_url('assets/bo/libs/particles.js/particles.js'); ?>"></script>
    <!-- particles app js -->
    <script src="<?= base_url('assets/bo/js/pages/particles.app.js'); ?>"></script>
    <!-- password-addon init -->
    <script src="<?= base_url('assets/bo/js/pages/password-addon.init.js'); ?>"></script>

</head>

<body>

    <?php if (session()->getFlashdata('success') !== null) { ?>
        <div id="sweet_success_custom" data-message="<?= session()->getFlashdata('success'); ?>"></div>
    <?php } elseif (session()->getFlashdata('error')) { ?>
        <div id="sweet_error_custom" data-message='<?= session()->getFlashdata('error') ?>'></div>
    <?php } ?>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>