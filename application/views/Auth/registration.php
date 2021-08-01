<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="<?= base_url(); ?>./assets/images/logo.svg">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light mb-3">Signing up is easy. It only takes a few steps</h6>

                        <div class="row">

                            <div class="col-lg-6">
                                <form class="pt-3" action="<?= base_url('Auth/register') ?>" method="POST">
                                    <div class="form-group">
                                        <input name="nama" type="text" class="form-control form-control-md" value="<?= set_value('nama') ?>" id="exampleInputFullname1" placeholder="Fullname">
                                        <small class="text-danger"><?= form_error('nama') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input name="username" type="text" class="form-control form-control-md" value="<?= set_value('username') ?>" id="exampleInputUsername1" placeholder="Username">
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control form-control-md" value="<?= set_value('email') ?>" id="exampleInputEmail1" placeholder="Email">
                                        <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="alamat" id="alamat" class="form-control form-control-md" cols="7" value="<?= set_value('alamat') ?>" rows="5" placeholder="Masukan Alamat Sekarang..."></textarea>
                                        <small class="text-danger"><?= form_error('alamat') ?></small>
                                    </div>

                            </div> <!-- col form 1 end -->
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <select name="gender" class="form-control form-control-md" value="<?= set_value('gender') ?>" id="exampleFormControlSelect2">
                                        <option value="" selected>-- Choose Gender --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="perumpuan">Perumpuan</option>
                                    </select>
                                    <small class="text-danger"><?= form_error('gender') ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="level" value="user" type="text" class="form-control form-control-md" id="exampleInputUsername1" placeholder="Nomer Telphone">
                                </div>
                                <div class="form-group">
                                    <input name="no_telp" type="text" class="form-control  form-control-md" value="<?= set_value('no_telp') ?>" id="exampleInputUsername1" placeholder="Nomer Telphone">
                                    <small class="text-danger"><?= form_error('no_telp') ?></small>
                                </div>
                                <div class="row mt-2">
                                    <!-- row password -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Input wajib huruf besar, kecil, angka dan simbol!')" name="password" type="password" class="form-control form-control-md" id="exampleInputPassword1" placeholder="Password">
                                            <small class="text-danger"><?= form_error('password') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="confPassword" type="password" class="form-control form-control-md" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Input wajib huruf besar, kecil, angka dan simbol!')" id="exampleInputPassword1" placeholder="Konfirm Password">
                                            <small class="text-danger"><?= form_error('confPassword') ?></small>
                                        </div>
                                    </div>
                                </div><!-- end row password -->

                                <div class="mt-2">
                                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= site_url() ?>.Auth/" class="text-primary">Login</a>
                                </div>
                                </form>
                            </div><!-- col form 2 end -->
                        </div> <!-- tutup row -->

                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->