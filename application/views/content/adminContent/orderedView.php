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
                            </div>
                            <div class="col-lg-2">
                                <a href="<?= site_url('Admin/print') ?>" class="btn btn-gradient-info btn-lg form-control"><i class="mdi mdi-printer menu-icon"></i></a>
                            </div>
                            <div class="col-lg-3">
                                <form action="<?= base_url('') ?>" method="post">
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
                        <div class="table-responsive">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->