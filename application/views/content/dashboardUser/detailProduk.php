<div class="container pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-5">
            <img src="<?= base_url() ?>./assets/images/gambar/<?= $datamodal->gambar ?>" style="width: 500px;" alt="">
        </div>
        <div class="col-lg-7 col-md-7 border-start ps-5">
            <h3 class="card-title "><?= $datamodal->nama_produk ?></h3>
            <table class="table mt-5">
                <tr>
                    <td>Jenis Produk</td>
                    <td>
                        <p class="card-title"><?= $datamodal->jenis_produk ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah stok</td>
                    <td>
                        <p class="card-title"><?= $datamodal->stok ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <p class="card-title"><i class="mdi mdi-tag-multiple "></i> Rp. <?= number_format($datamodal->harga_produk, 2, ',', '.'); ?></p>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url() ?>/User/addKeranjang/<?= $datamodal->id_produk ?>" class="btn btn-info text-white fs-5"><i class="mdi mdi-cart-plus"></i> Tambah ke keranjang</a>
        </div>
    </div>
</div>