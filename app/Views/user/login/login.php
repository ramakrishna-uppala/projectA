<?php
/**
 * User login
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= PROJECT_TITLE ?> | Login</title>
        <link rel="shortcut icon" href="<?= WEBROOT ?>html/img/favicon.png" type="image/x-icon">
            <!-- CSS files -->
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/bootstrap-5.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/bootstrap-5.3/icons/bootstrap-icons.css">
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>html/template/template.css">
            
            <!-- JS files -->
            <script type="text/javascript" src="<?= WEBROOT ?>html/jquery/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="<?= WEBROOT ?>html/bootstrap-5.3/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div>
                <img src="<?= WEBROOT ?>html/images/logo.png">
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="<?= WEBROOT ?>login/loginSubmit" method="post">
                        <?= csrf_field() ?>
                        <div class="login-text">User Login</div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="Username" autofocus="autofocus" type="text">
                        </div>
                        <span class="text-danger"><?= validation_show_error('username') ?></span>
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input name="password" class="form-control " placeholder="Password" type="password">
                        </div>
                        <span class="text-danger"><?= validation_show_error('password') ?></span>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i>&nbsp;Login</button>
                            <span class="text-danger"><? echo isset($message) ? $message : '';?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>