<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-head">Form Tambah data Produk</h3>
                    <div class="row mt-3">
                        <div class="col-lg-7">
                            <!--  -->
                            <?php echo form_open_multipart('Produk/save'); ?>
                            <div class="form-group">
                                <label for="nama" class="card-text">Masukan Nama Produk :</label>
                                <input type="text" id="nama_produk" class="form-control form-control-lg" value="<?= set_value('nama_produk') ?>" name="nama_produk" placeholder="Fullname">
                                <small class="text-danger"><?= form_error('nama_produk') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2" class="card-text">Pilih Jenis Produk :</label>
                                <select name="jenis_produk" class="form-control form-control-lg" id="exampleFormControlSelect2">
                                    <option value="Televisi">Elektronik</option>
                                    <option value="Kamera">Kamera</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="<?= set_value('nama_produk') ?>" selected><?= set_value('nama_produk') ?></option>
                                </select>
                                <small class="text-danger"><?= form_error('jenis_produk') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="card-text">Masukan Gambar :</label>
                                <input type="file" id="gambar" name="gambar" value="<?= set_value('gambar') ?>" class="form-control form-control-lg">
                                <small class="text-danger"><?= form_error('gambar') ?></small>
                            </div>
                        </div> <!-- col form 1 end -->
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="harga" class="card-text">Masukan Harga :</label>
                                <input type="number" id="harga" name="harga_produk" value="<?= set_value('harga') ?>" class="form-control form-control-lg" placeholder="Harga">
                                <small class="text-danger"><?= form_error('harga_produk') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="stok" class="card-text">stok :</label>
                                <input id="stok" value="<?= set_value('stok') ?>" name="stok" type="number" class="form-control form-control-lg" placeholder="stok">
                                <small class="text-danger"><?= form_error('password') ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Add data</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div><!-- col form 2 end -->
                </div> <!-- tutup row -->
            </div>
        </div>
    </div>


    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->