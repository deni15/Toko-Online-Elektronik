<div class="container mt-5">
    <h2 class="card-title">Keranjang Belanja</h2>
    <div class=" ms-auto mb-2 d-flex justify-content-end">
        <?php
        if (empty($this->cart->total_items())) { ?>
            <a href="" id="clik" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger">Hapus Semua</a>
        <?php } else { ?>
            <a href="<?= base_url() ?>/User/hapusKeranjang" class="btn btn-outline-danger">Hapus Semua</a>
        <?php } ?>
    </div>
    <div class="card rounded p-5">
        <?php
        if (empty($this->cart->total_items())) { ?>
            <div class="alert alert-info" role="alert">
                Anda Belum memiliki item di keranjang!
            </div>
        <?php } ?>
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
                <div class="col-lg-2 col-md-3">
                    <p class="fw-bold fs-5"><?= $items['name'] ?></p>
                    <p class="text-muted"><small>Rp. <?= number_format($items['price'], 2, ',', '.') ?></small> </p>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <a href="<?= base_url() ?>/User/hapusItem/<?= $items['rowid'] ?>" class="text-danger "><i class="mdi mdi-delete fs-4"></i></a> &nbsp;&nbsp; | &nbsp;&nbsp;
                    <p class="fw-bold fs-5 d-inline"><?= $items['qty'] ?></p>
                </div>
                <div class="col-lg-2 col-md-2">
                    <p class="fw-bolder text-primary"> Rp. <?= number_format($items['subtotal'], 2, ',', '.') ?></p>
                </div>
            </div>
            <hr>
        <?php }; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="card-head">Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mb-0" role="alert">
                    Anda Belum memiliki item di keranjang!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <a href="<?= base_url() ?>/User" class="btn btn-success border-0" style="background-color:#8A2BE2;">Lanjut Belanja</a>
            </div>
        </div>
    </div>
</div>