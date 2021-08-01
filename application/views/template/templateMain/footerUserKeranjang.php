<!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="jumbotron p-5 shadow mt-5 fixed-bottom bg-white">
    <div class="row">
        <div class="col-lg-8 col-md-8"></div>
        <div class="col-lg-2 col-md-2 text-end align-end">
            <p class="fw-bolder"><small>Total Bayar (<?= $this->cart->total_items(); ?>)</small></p>
            <p class="fw-bolder">
            <p class="fw-bolder text-primary"> Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?></p>
            </p>
        </div>
        <?php
        if (empty($this->cart->total_items())) { ?>
            <div class="col-lg-2 col-md-2"><button onclick="" id="clik" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">BELI SEKARANG</button></div>
        <?php } else { ?>
            <div class="col-lg-2 col-md-2"><a href="<?= base_url(); ?>/User/beliSekarang" class="btn btn-primary">BELI SEKARANG</a></div>
        <?php } ?>
    </div>
    <div class="container mt-2">
        <h5 class="fw-bolder">Toko Online Petama & Terpercaya di Indonesia</h5>
        <p class="card-text">sebagai toko online terpercaya di indonesia. Purple Shope yang berdiri sejak tahun 2001 hingga saat ini di 2021 sebagai toko electronik terpercaya terlengkap, termurah, berbagai produk tersedia
            untuk menunjang berbagai aktivitas harian mu, peralatan dapur, dan rumah tangga, bisnis bahkan kebutuhan profesional dalam perusahaan. beragam keperluan IT, dan telekominikasi perangkat elektronik
        </p>
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
                <div class="alert alert-warning mb-0" role="alert">
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

<script src="<?= base_url() ?>./assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>