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
    <div class="container p-5 mt-4">
        <div class="card p-5">
            <div class="text-center">
                <div class="alert alert-success" role="alert">
                    <h3 class="card-text">Pesanan Berhasil Dibuat!</h3>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card p-5">
                        <p class="card-text" style="color: #8A2BE2;"><i class="mdi mdi-layers"></i> Purple Shop </p>
                        <?php
                        $no = 1;
                        foreach ($this->cart->contents() as $items) {
                        ?>
                            <div class="row  py-3">
                                <div class="col-lg-1 col-md-1">
                                    <?= $no++ ?>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <img src="<?= base_url() ?>./assets/images/gambar/<?= $items['gambar'] ?>" style="width: 100px;height:auto" alt="">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p class="fw-bold fs-7"><?= $items['name'] ?></p>
                                    <p class="text-muted"><small>Rp. <?= number_format($items['price'], 2, ',', '.') ?></small> </p>
                                </div>
                                <div class="col-lg-2 col-md-2 text-center">
                                    <p class="fw-bold fs-5 d-inline"><?= $items['qty'] ?></p>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p class="fw-bolder text-primary"> Rp. <?= number_format($items['subtotal'], 2, ',', '.') ?></p>
                                </div>
                            </div>
                            <hr>
                        <?php }; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card p-3">
                        <p class="fw-bolder fs-5"> Detail Pembelian</p>
                        <table class="table table-borderless">
                            <tr>
                                <td>Total Item</td>
                                <td class="fw-bolder">x<?= $this->cart->total_items(); ?></td>
                            </tr>
                            <tr>
                                <td>Expedisi</td>
                                <td class="fw-bolder"><?= $pengiriman->nama_ekspedisi ?></td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td class="">Rp. <?= number_format($pengiriman->ongkir, 2, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td>Cara bayar</td>
                                <td class="fw-bolder"><?= $bayar->caraBayar ?></td>
                            </tr>
                            <tr>
                                <td>Biaya penanganan</td>
                                <td class="">Rp. <?= number_format($bayar->potongan, 2, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td style="color: #8A2BE2;">
                                    <p class="fs-5 fw-bolder"> Total</p>
                                </td>
                                <td style="color: #8A2BE2;">
                                    <p class="fs-5 fw-bolder"> Rp. <?= number_format($totalbayar, 2, ',', '.') ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <a href="<?= base_url() ?>/User/backorder" class="btn btn-dark fw-bolder mt-4 form-control border-0" style="background-color: #8A2BE2;">SELESAI</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>./assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>