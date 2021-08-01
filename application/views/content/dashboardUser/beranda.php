<!-- Awal Carousel -->
<section class="karosel">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url() ?>./assets/images/banner/minjem1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() ?>./assets/images/banner/minjem2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() ?>./assets/images/banner/minjem3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Akhir Carousel -->

<!-- Awal Kategori -->
<section class="mt-5 container">
    <center>
        <a href="<?= base_url() ?>./user/katalog/<?= $jenis_produk = 'Televisi'; ?>" class="menu-kategori me-2"><i class="fas fa-desktop"></i><span class="ps-3">Komputer</span></a>
        <a href="<?= base_url() ?>./user/katalog/<?= $jenis_produk = 'Smartphone'; ?>" class="menu-kategori me-2"><i class="fas fa-mobile-alt"></i><span class="ps-3">Smartphone</span></a>
        <a href="<?= base_url() ?>./user/katalog/<?= $jenis_produk = 'Kamera'; ?>" class="menu-kategori me-2"><i class="fas fa-camera"></i><span class="ps-3">Kamera</span></a>
        <a href="<?= base_url() ?>./user/katalog/<?= $jenis_produk = 'Aksesoris'; ?>" class="menu-kategori me-2"><i class="fas fa-headphones"></i><span class="ps-3">Aksesoris</span></a>
    </center>
</section>
<!-- Akhir Kategori -->

<!-- Awal Produk Pilihan -->
<section class="container mt-5">
    <small>Top Rekomendasi <i style="font-size: 11px; color: #9B72AA;" class="fas fa-star"></i></small>
    <h4>Produk Rekomendasi</h4>
    <hr>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">

            <?php foreach ($data->result() as $row) { ?>

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
        <div class="mt-3">
            <?php echo $pagination; ?>
        </div>
    </div>
</section>