<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH . '/vendor/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH . '/vendor/pnotify.custom.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH . '/pages/login/index.css')?>">


    <script src="<?php echo base_url(JS_PATH . '/vendor/jquery.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/jquery.validation.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/jquery.validation.additional.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/pnotify.custom.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/common/functions.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/common/flash-message.js')?>"></script>

    <script>
        $(function () {
            var user_login = new UserLogin(<?php echo empty($loginError) ? 0 : 1; ?>);
            user_login.init();
        });
    </script>
    <script src="<?php echo base_url(JS_PATH . '/pages/login/index.js')?>"></script>
</head>
<body>
<div class="container">

    <?php  echo form_open('', ['class' => 'form-signin']); ?>

    <h2 class="form-signin-heading">Please Login</h2>
    <div class="form-group">
        <label for="login-email">Email</label>
        <?php echo form_input([
            'type' => 'email',
            'id' => 'login-email',
            'name' => 'email',
            'class' => 'form-control',
        ])?>
    </div>
    <div class="form-group">
        <label for="login-password">Password</label>
        <?php echo form_input([
            'type' => 'password',
            'id' => 'login-password',
            'name' => 'password',
            'class' => 'form-control',
        ])?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>
    <button class="btn btn-lg btn-primary btn-block" type="button" ><a id="toRegister" href="<?php echo base_url('register')?>">Register</a></button>
    <?php echo form_close(); ?>

</div>
</body>
</html>