<?php require_once '../core/init.php'; ?>

<?php
    if (isset($_POST['login_admin'])) {
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];

        $admin_login = $getFromU->dismas_login($admin_email, $admin_pass);
        if ($admin_login === false) {
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
        <title>Admin Sign In</title>
    </head>

    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Reset Passcode</p>
                    </div>
                    <form method="POST">
                        <div class="login_form_header">
                                <p>Already have an account? Sign in.</p>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input login_input_margin">
                            <label>Admin Email</label>
                            <input type="email" name="admin_email" placeholder="Enter admin email" required>
                        </div>
                        <div class="login_input">
                            <label>Admin Passcode</label>
                            <input type="password" name="admin_pass" placeholder="Enter admin passcode" required>
                        </div>
                        <div class="data_recovery">
                            <label>
                                <input type="checkbox" name="" value="Remember me" checked="">
                                Remember me
                            </label>
                            <p><a href="reset-admin-passcode.php">Forgot Passcode?</a></p>
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