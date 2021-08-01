<div class="container py-5">
    <h2 class="card-text">Checkout</h2>
    <div class="row mt-3">
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
                        <div class="col-lg-2 col-md-3">
                            <p class="fw-bold fs-7"><?= $items['name'] ?></p>
                            <p class="text-muted"><small>Rp. <?= number_format($items['price'], 2, ',', '.') ?></small> </p>
                        </div>
                        <div class="col-lg-3 col-md-3 text-center">
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
            <form action="<?= base_url() ?>/User/tambahPesanan" method="post">
                <!-- ekspedisi -->
                <div class="card p-4">
                    <h5 class="card-head">Pilih Jasa Pegiriman</h5>
                    <select class="form-control" name="ekspedisi" id="ekspedisi" required>
                        <small class="text-danger"><?= form_error('ekspedisi') ?></small>
                        <option value="" selected>Pilih Jasa Pengiriman</option>
                        <?php foreach ($ekspedisi as $e) { ?>
                            <option value="<?= $e->id_ekspedisi ?>">
                                <p class="d-inline"><?= $e->nama_ekspedisi ?></p>
                                <p class="d-inline"> (Biaya ongkir Rp. <?= $e->ongkir ?>)</p>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!-- cara bayar -->
                <div class="card mt-4 p-4">
                    <h5 class="card-head">Pilih Cara Bayar</h5>
                    <select class="form-control" name="carabayar" id="carabayar" required>
                        <small class="text-danger"><?= form_error('carabayar') ?></small>
                        <option value="" selected>Pilih Cara Bayar</option>
                        <?php foreach ($carabayar as $c) { ?>
                            <option value="<?= $c->id ?>">
                                <p class="d-inline"><?= $c->caraBayar ?></p>
                                <p class="d-inline"> (Biaya Penanganan Rp.<?= $c->potongan ?>)</p>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="card mt-5 p-4">
                    <h5 class="card-head">Detail Pembelian</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td>Total Pembelian(<?= $this->cart->total_items(); ?>)</td>
                            <td class="fw-bolder">Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td style="color: #8A2BE2;">
                                <p class="fs-5 fw-bolder"> Total</p>
                            </td>
                            <td style="color: #8A2BE2;">
                                <p class="fs-5 fw-bolder"> Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?></p>
                            </td>
                        </tr>
                    </table>
                    <!-- hidden input -->
                    <input type="hidden" name="total_harga" value="<?= $this->cart->total() ?>">
                    <input type="hidden" name="total_item" value="<?= $this->cart->total_items(); ?>">
                    <button type="submit" class="btn btn-dark border-0 form-control fw-bolder" style="background-color:#8A2BE2;">BAYAR</button>
                </div>

            </form>
        </div>
    </div>
</div>