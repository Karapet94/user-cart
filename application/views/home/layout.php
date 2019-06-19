<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH . '/vendor/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH . '/vendor/pnotify.custom.min.css')?>">
    <?php echo akAddCssFiles($additionalCssFiles);?>

    <script src="<?php echo base_url(JS_PATH . '/vendor/jquery.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/jquery.validation.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/common/functions.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/vendor/pnotify.custom.min.js')?>"></script>
    <script src="<?php echo base_url(JS_PATH . '/common/flash-message.js')?>"></script>

    <script>
        $(function () {
            var flashMessage = new FlashMessage(
                <?php echo $flashMessage;?>
            );
            flashMessage.init();
        })
    </script>
</head>
<body>
<header>
    <h2>Welcome the most crazy site all over te world</h2>
    <hr>
</header>
<a class="logout" href="<?php echo base_url('/login/logout')?>"><button class="btn btn-warning">Log out</button></a>
<a class="logout" href="<?php echo base_url('/home/delete_user/' . $user_id)?>"><button class="btn btn-danger">Delete User</button></a>
<div class="container">
<?php echo $pageContent ?>
</div>
</body>
</html>