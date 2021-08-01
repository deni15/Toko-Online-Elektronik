<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/linearicons/style.css">
    <title>
        <?= $title; ?>
    </title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow p-4">
            <h2>Reset Password</h2>
            <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>
            <?php echo form_open('lupa_password/reset_password/token/' . $token); ?>
            <p>Password Baru:</p>
            <p>
                <input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>" />
            </p>
            <p class="text-danger"> <?php echo form_error('password'); ?> </p>
            <p>Konfirmasi Password:</p>
            <p>
                <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" />
            </p>
            <p class="text-danger"><small class="text-danger"> <?php echo form_error('passconf'); ?> </small></p>
            <p>
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Reset" />
            </p>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>