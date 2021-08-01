<div class="container p-5">
    <h3 class="card-title">Katalog <b><?= $key ?></b></h3>
    <hr>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">

            <?php foreach ($datajenis as $row) { ?>

                <div class="col">
                    <a href="<?= base_url() ?>/User/datafilter/<?= $row->id_produk; ?>" style="text-decoration:none">
                        <div class="card h-100 rounded shadow border-0">
                            <img src="<?= base_url() ?>./assets/images/gambar/<?= $row->gambar; ?>" style="heigth:100px;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text fs-6 text-muted"><?= $row->nama_produk; ?></p>
                                <p class="card-text fw-bolder fs-7" style="color: #9B72AA;"><i class="mdi mdi-tag-multiple "></i> Rp. <?= number_format($row->harga_produk, 2, ',', '.'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            <?php }; ?>
        </div>
    </div>
</div>