<?php include ('../core/init.php'); ?>

<?php

    $admin_email = $_SESSION['admin_email'];
    $get_admin = $getFromU->view_dismas_by_email($admin_email);
    $admin_id = $get_admin->admin_id;

    if (isset($_POST['new_passcode'])) {
        $admin_pass = $_POST['new_admin_pass'];
        $confirm_admin_pass = $_POST['confirm_admin_pass'];

        if ($admin_pass !== $confirm_admin_pass) {
                $error = "Passwords do not match";
            } else {
                $update_admin_pass = $getFromU->update_dismas_password($admin_id, $admin_pass);
                if ($update_admin_pass === true) {
                    header("location: index.php?page=dashboard", "_self");
                }
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
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?php echo time()?>" >
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css?v=<?php echo time()?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Enriqueta&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>New Passcode</title>
    </head>
    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
            <div class="login_form_main">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Sign Up as Admin</p>
                    </div>
                    <form method="POST">
                        <div class="login_form_header">
                            <p>Much more to do within your Application's dashboard</p>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input login_input_margin">
                            <label>New Passcode</label>
                            <input type="password" name="new_admin_pass" placeholder="Enter new passcode" required>
                        </div>
                        <div class="login_input">
                            <label>Confirm Passcode</label>
                            <input type="password" name="confirm_admin_pass" placeholder="Confirm new passcode" required>
                        </div>
                        <div class="login_button">
                            <button type="submit" name="new_passcode">Reset Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>