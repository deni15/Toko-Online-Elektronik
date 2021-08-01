<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="<?= base_url() ?>./assets/images/logo.svg">
                        </div>
                        <?php
                        // Cetak session   
                        if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                        }
                        if ($this->session->flashdata('sukses')) {
                            echo $this->session->flashdata('sukses');
                        }
                        ?>
                        <h4 class="mt-4">Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>

                        <form class="pt-3" action="<?= base_url('Auth/') ?>" method="POST">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control form-control-lg" value="<?= set_value('username') ?>" id="exampleInputEmail1" placeholder="Username">
                                <small class="text-danger"><?= form_error('username') ?></small>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Input wajib huruf besar, kecil, angka dan simbol!')" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                <small class="text-danger"><?= form_error('password') ?></small>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <p>
                                    <?php
                                    echo anchor(site_url() . '/lupa_password', 'Lupa Password');
                                    ?>
                                </p>
                            </div>

                            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?= site_url('Auth/register') ?>" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->