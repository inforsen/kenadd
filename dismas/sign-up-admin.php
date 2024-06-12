<?php require_once '../core/init.php'; ?>

<?php
    if (isset($_POST['admin_signup'])) {
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];

        $check_admin = $getFromU->check_admin_by_email($admin_email);

        if ($check_admin === true) {
            $error = "Email already registered. Please sign in.";
        } else {
            $add_user = $getFromU->create("admins", array("admin_name" => $admin_name, "admin_email" => $admin_email, "admin_pass" => $admin_pass ));

            $_SESSION['admin_email'] = $admin_email;
            header ('location: index.php?page=dashboard', '_self');
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
        <meta name="theme-color" content="#000">
        <meta name="msapplication-TileColor" content="#000">
        <meta name="msapplication-navbutton-color" content="#000">
        <meta name="apple-mobile-web-app-status-bar-style" content="#000">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?php echo time()?>" >
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css?v=<?php echo time()?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Enriqueta&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Admin Sign Up</title>
    </head>

    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
            <div class="login_form_main">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Sign Up as Admin</p>
                    </div>
                    <form method="POST">

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input">
                            <label>Admin Name</label>
                            <input type="text" name="admin_name" placeholder="Enter admin name">
                        </div>
                        <div class="login_input">
                            <label>Admin Email</label>
                            <input type="email" name="admin_email" placeholder="Enter admin email" required>
                        </div>
                        <div class="login_input">
                            <label>Admin Passcode</label>
                            <input type="password" name="admin_pass" placeholder="Enter admin passcode" required>
                        </div>
                        <div class="login_button">
                            <button type="submit" name="admin_signup">Sign Up</button>
                        </div>
                    </form>
                </div>
                <!---<div class="login_form_right_content">
                    <div class="login_form_header_right">
                        <p class="login_right_header">You're the Owner!</p>
                        <p class="login_right_info">Create your Admin account in just a few clicks! Take control of what happens in your web application. See your customers, products and much much more!</p>
                    </div>
                    <div class="right_button_account">
                        <p>Already have an account?</p>
                        <a href="sign-in-admin.php"><button>Sign in</button></a>
                    </div>
                </div>--->
            </div>
        </div>
    </body>
</html>