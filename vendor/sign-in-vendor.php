<?php require_once '../core/init.php'; ?>

<?php
    if (isset($_POST['login_admin'])) {
        $vendor_email = $_POST['vendor_email'];
        $vendor_pass = $_POST['vendor_pass'];

        $vendor_login = $getFromU->vendor_login($vendor_email, $vendor_pass);
        if ($vendor_login === false) {
            $error = "Wrong email or password or you're not registered!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="theme-color" content="">
        <meta name="msapplication-TileColor" content="">
        <meta name="msapplication-navbutton-color" content="">
        <meta name="apple-mobile-web-app-status-bar-style" content="">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?php echo time()?>" >
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css?v=<?php echo time()?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Enriqueta&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <title>Vendor Sign In</title>
    </head>

    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Sign in to your account</p>
                    </div>
                    <form method="POST">

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input login_input_margin">
                            <label>Vendor Email</label>
                            <input type="email" name="vendor_email" placeholder="Enter your email" required>
                        </div>
                        <div class="login_input">
                            <label>Vendor Passcode</label>
                            <input type="password" name="vendor_pass" placeholder="Enter your passcode" required>
                        </div>
                        <div class="data_recovery">
                            <label>
                                <input type="checkbox" name="" value="Remember me" checked="">
                                Remember me
                            </label>
                            <p><a href="reset-vendor-passcode.php">Forgot Passcode?</a></p>
                        </div>
                        <div class="login_button">
                            <button type="submit" name="login_admin">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>