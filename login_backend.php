
<!--
filename: login_backend.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Backend handler for login form
-->
<?php

    session_start();
    include("settings.php");
    include("db_functions.php");


    if(isset($_POST["login"])) {
        if(isset($_POST["login-username"]) && isset($_POST["login-pw"])) {
            $manager_username = sanitise_input($_POST["login-username"]);
            $manager_password = sanitise_input($_POST["login-pw"]);
            if(empty($manager_username)) {
                $_SESSION["login-error"] = "Username is required";
                header("location: loginmanager.php");
                exit();
            } elseif(empty($manager_password)) {
                $_SESSION["login-error"] = "Password is required";
                header("location: loginmanager.php");
                exit();
            } else {
                if(check_if_connected($connection) === true) {
                    $query = "SELECT * FROM manager_db WHERE user_name='$manager_username' AND password='$manager_password'";
                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);
                        if($row["user_name"] === $manager_username && $row["password"] === $manager_password) {
                            $_SESSION["username"] = $row["user_name"];
                            $_SESSION["password"] = $row["password"];
                            $_SESSION["id"] = $row["id"];
                            $_SESSION["name"] = $row["name"];
                            header("location: manage.php");
                            exit();
                        }
                    } else {
                        $_SESSION["login-error"] = "Wrong username and password";
                        $_SESSION["login_time"] += 1;
                        header("location: loginmanager.php");
                        exit();
                    }
                } else {
                    $_SESSION["login-error"] = "Could not connect to database!";
                    header("location: loginmanager.php");
                    exit();
                }
            }
        } else {
            $_SESSION["login-error"] = "Username and password are required";
            header("location: loginmanager.php");
            exit();
        }
    }
    if(isset($_POST["register"])) {
        header("location: register_manager.php");
        exit();
    }



?>
