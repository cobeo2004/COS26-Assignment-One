<!--
filename: loginmanager.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Log in to Manager form
-->
<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
if(isset($_SESSION["locked"])) {
    $diff = time() - $_SESSION["locked"];
    if($diff > 5) {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_time"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="login_manager-class">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Login to management - CloudLabs</title>
</head>

<body class="index-body">
<?php

$activePage = "loginmanager";
include_once("header.inc"); ?>
<main id="login_manager-body">
    <h1>Login for Manager</h1>
    <form action="login_backend.php" method="post">
        <?php
        if(isset($_SESSION["login-error"])) { ?>
            <p id="form-error-login"><?php echo $_SESSION['login-error']; ?></p>
        <?php }
        unset($_SESSION["login-error"]);
        ?>

        <label for="login-username">Username</label>
        <input type="text" name="login-username" id="login-username">
        <br>
        <label for="pw">Password</label>
        <input type="password" name="login-pw" id="login-pw">
        <br>

        <?php
        if($_SESSION["login_time"] > 3) {
            $_SESSION["locked"] = time();
            echo "<p id = 'form-error-login'> Please try again in 5 seconds </p>";
        } else { ?>
        <button type="submit" name="login" id="login">Login</button>
        <button type="submit" name="register" id="register">Register</button>
        <?php } ?>
    </form>
</main>
<?php include_once "footer.inc"; ?>
</body>
</html>
