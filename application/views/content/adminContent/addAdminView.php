<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-head">Tambah data admin</h3>
                    <div class="row mt-3">
                        <div class="col-lg-7">
                            <form action="<?= site_url('Admin/save') ?>" method="post">
                                <div class="form-group">
                                    <label for="nama" class="card-text">Masukan Nama Lengkap :</label>
                                    <input type="text" id="nama" class="form-control form-control-lg" value="<?= set_value('nama') ?>" name="nama" placeholder="Fullname">
                                    <small class="text-danger"><?= form_error('nama') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="card-text">Masukan Username :</label>
                                    <input type="text" id="username" name="username" value="<?= set_value('username') ?>" class="form-control form-control-lg" placeholder="username">
                                    <small class="text-danger"><?= form_error('username') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="card-text">Masukan email :</label>
                                    <input type="text" id="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-lg" placeholder="email">
                                    <small class="text-danger"><?= form_error('email') ?></small>
                                </div>

                        </div> <!-- col form 1 end -->
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="Notelp" class="card-text">Masukan No telphone :</label>
                                <input type="text" id="Notelp" name="no_telp" value="<?= set_value('no_telp') ?>" class="form-control form-control-lg" placeholder="No telphone">
                                <small class="text-danger"><?= form_error('no_telp') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2" class="card-text">Pilih Jenis kelamin :</label>
                                <select name="gender" class="form-control form-control-lg" value="<?= set_value('gender') ?>" id="exampleFormControlSelect2">
                                    <option value="" selected>-- Choose Gender --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="perumpuan">Perumpuan</option>
                                </select>
                                <small class="text-danger"><?= form_error('gender') ?></small>
                            </div>
                            <div class="row mt-2">
                                <!-- row password -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password1" class="card-text">Password :</label>
                                        <input id="password1" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Input wajib huruf besar, kecil, angka dan simbol!')" name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                        <small class="text-danger"><?= form_error('password') ?></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password2" class="card-text">Konfirmasi Password :</label>
                                        <input id="password2" name="confPassword" type="password" class="form-control form-control-lg" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Input wajib huruf besar, kecil, angka dan simbol!')" id="exampleInputPassword1" placeholder="Konfirm Password">
                                        <small class="text-danger"><?= form_error('confPassword') ?></small>
                                    </div>
                                </div>
                            </div><!-- end row password -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Add admin</button>
                            </div>
                            </form>
                        </div><!-- col form 2 end -->
                    </div> <!-- tutup row -->
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->