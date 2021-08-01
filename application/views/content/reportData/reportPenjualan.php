<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report penjualan</title>
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
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No pengiriman</th>
                    <th>Nama Pembeli</th>
                    <th>Jenis Expedisi</th>
                    <th>Alamat Pengiriman</th>
                    <th>Pembayaran</th>
                    <th>Total Item</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($order as $row) { ?>
                    <tr>
                        <td><?= $row->id_transaksi; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->nama_ekspedisi; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->caraBayar; ?></td>
                        <td><?= $row->total_item; ?></td>
                        <td>Rp. <?= number_format($total = $row->total_harga + $row->ongkir + $row->potongan, 2, ',', '.') ?></td>
                        <td><?= date('d F Y', $row->date_created); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print()
    </script>
    <script src="<?= base_url() ?>./assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>