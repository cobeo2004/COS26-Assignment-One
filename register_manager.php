<!--
filename: register_manager.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Register for manager
-->

<!DOCTYPE html>
<html lang="en" class="login_manager-class">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Register to management - CloudLabs</title>
</head>

<body class="index-body">
<?php
$activePage = "loginmanager";
include_once("header.inc"); ?>
<main id="login_manager-body">
    <h1>Register for Manager</h1>
    <form action="register_backend.php" method="post">
        <?php
        if(isset($_GET["error"])) { ?>
            <p id="form-error-login"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label for="reg-name">Your Name</label>
        <input type="text" name="reg-name" id="reg-name">
        <br>
        <label for="reg-username">Username</label>
        <input type="text" name="reg-username" id="reg-username">
        <br>
        <label for="reg-pw">Password</label>
        <input type="password" name="reg-pw" id="reg-pw">
        <br>
        <label for="reg-auth-code">Auth Code</label>
        <input type="text" name="reg-auth-code" id="reg-auth-code">
        <br>
        <button type="submit" name="register" id="register">Register</button>
    </form>
</main>
<?php include_once "footer.inc"; ?>
</body>
</html>
