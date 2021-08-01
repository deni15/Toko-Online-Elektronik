<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Cetak session   
                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }
                        ?>
                        <div class="row mt-2 pr-4">
                            <div class="col-lg-7">
                                <h2 class="card-title">Hasil Pencarian Dengan kata kunci <b class="font-italic"><?= $key ?></b></h>
                            </div>
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-3">
                                <form action="<?= base_url('DataAdmin/search') ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search by data details" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>No id</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Jenis Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($produk)) {
                                    ?>
                                        <div class="alert alert-warning" role="alert">
                                            Kata kunci pencarian <?= $key ?> tidak tersedia!
                                        </div>
                                    <?php } ?>
                                    <?php foreach ($produk as $row) { ?>
                                        <tr>
                                            <td><?= $row->id_produk; ?></td>
                                            <td><img src="<?= base_url() ?>./assets/images/gambar/<?= $row->gambar; ?>" class="mb-2 rounded" style="height: auto; width:70px" alt="image"></td>
                                            <td><?= $row->nama_produk; ?></td>
                                            <td><?= $row->jenis_produk; ?></td>
                                            <td>Rp. <?= number_format($row->harga_produk, 2, ',', '.'); ?></td>
                                            <td><?= $row->stok; ?></td>
                                            <td><?= date('d F Y', $row->date_created); ?></td>
                                            <td>
                                                <a href="" class="btn btn-gradient-primary"><i class="mdi mdi-magnify-plus  menu-icon"></i></a>
                                                <a href="<?php echo base_url(); ?>Produk/edit/<?= $row->id_produk; ?>" class="btn btn-gradient-warning"><i class="mdi mdi-pencil menu-icon"></i></a>
                                                <a href="<?php echo base_url(); ?>Produk/delete/<?= $row->id_produk; ?>" class="btn btn-gradient-danger"><i class="mdi mdi-delete  menu-icon"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->