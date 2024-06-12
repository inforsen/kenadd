<?php include ('../core/init.php'); ?>

<?php

    if (isset($_POST['check__email'])) {
        
        $admin_email = $_POST['admin_email'];
        $check_admin_email = $getFromU->check_admin_by_email($admin_email);

        if ($check_admin_email == true) {
            $_SESSION['admin_email'] = $admin_email;
            header('location: new-passcode.php');
        } else {
            $error = "User does not exist. Please create account!";
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
        <title>Reset Admin Passcode</title>
    </head>

    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
            <div class="login_form_main">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Reset Your Passcode</p>
                    </div>
                    <form method="POST">
                        <div class="login_form_header">
                            <p>Enter your email below to confirm your registration.</p>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input login_input_margin">
                            <label>Enter email</label>
                            <input type="email" name="admin_email" placeholder="Enter admin email" required>
                        </div>
                        <div class="login_button">
                            <button type="submit" name="check__email">Reset Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>