<?php require_once '../core/init.php'; ?>

<?php
    if (isset($_POST['vendor_signup'])) {
        $vendor_name = $_POST['vendor_name'];
        $vendor_email = $_POST['vendor_email'];
        $vendor_pass = $_POST['vendor_pass'];

        $check_vendor = $getFromU->check_vendor_by_email($vendor_email);

        if ($check_vendor === true) {
            $error = "Email already registered. Please sign in.";
        } else {
            $add_vendor = $getFromU->create("vendor", array("vendor_name" => $vendor_name, "vendor_email" => $vendor_email, "vendor_pass" => $vendor_pass ));

            $_SESSION['vendor_email'] = $vendor_email;
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
        <title>Vendor Sign Up</title>
    </head>

    <body class="val_cont" style="background-image: linear-gradient(to right, rgb(0, 0, 0, 0.1), rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.1)), url(../images/ken13s.jpg);">
        <div class="validate_container">
            <div class="login_form_main">
                <div class="login_form_left_cont_ent">
                    <div class="admin_well">
                        <p>Sign Up as a Vendor</p>
                    </div>
                    <form method="POST">

                        <?php if (isset($error)): ?>
                            <div class="account-log">
                              <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="login_input">
                            <label>Vendor Name</label>
                            <input type="text" name="vendor_name" placeholder="Enter admin name">
                        </div>
                        <div class="login_input">
                            <label>Vendor Email</label>
                            <input type="email" name="vendor_email" placeholder="Enter admin email" required>
                        </div>
                        <div class="login_input">
                            <label>Vendor Passcode</label>
                            <input type="password" name="vendor_pass" placeholder="Enter admin passcode" required>
                        </div>
                        <div class="login_button">
                            <button type="submit" name="vendor_signup">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>