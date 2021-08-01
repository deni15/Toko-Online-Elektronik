<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Our CSS -->
    <link href="<?= base_url() ?>./assets/css/hd.css" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>./assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="<?= base_url() ?>./assets/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>./assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 sticky-top shadow">
        <div class="container">
            <a class="navbar-brand  fs-4 fw-bolder" style="color: #8A2BE2;" href="<?= site_url('User/') ?>"><i class="mdi mdi-layers"></i> Purple Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-5">
                        <a class="nav-link " style="color: #8A2BE2;" href="<?= site_url('User/') ?>"><i class="mdi mdi-home fs-5"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        $keranjang = $this->cart->total_items();
                        ?>
                        <a class="nav-link link-secondary position-relative ms-5" style="color: #8A2BE2;" href="<?= base_url() ?>/User/detailKeranjang"><i class="mdi mdi-cart fs-5">
                            </i> Keranjang
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $keranjang; ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ms-5">
                        <a class="nav-link  " href="#" id="navbarDropdown" style="color: #8A2BE2;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-account-settings fs-5"></i> <?= $user['nama']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color: #8A2BE2;" href="#"><i class="mdi mdi-account-card-details fs-5"></i> Detail Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" style="color: #8A2BE2;" href="<?= base_url('Auth/logout') ?>"> <i class=" mdi mdi-logout fs-5"></i> Signout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex ms-5" action="<?= base_url() ?>User/search" method="POST">
                    <input required class="form-control me-2" type="search" name="keyword" placeholder="Cari produk ..." aria-label="Search">
                    <button class="btn btn-outline-light" style="border: #8A2BE2;background-color: #8A2BE2;" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->