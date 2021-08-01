<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report Admin akun</title>
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
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>No id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telphone</th>
                    <th>level</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $row) { ?>
                    <tr>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->username; ?></td>
                        <td><?= $row->gender; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->no_telp; ?></td>
                        <td><?= $row->level; ?></td>
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