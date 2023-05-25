<!--
filename: loginmanager.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Log in to Manager form
-->

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
    <form action="trigger_manager.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="pw">Password</label>
        <input type="password" name="pw" id="pw">
        <br>
        <input type="submit" name="login" id="login">
    </form>
</main>
<?php include_once "footer.inc"; ?>
</body>
</html>
