<?php
    session_start();

    include("settings.php");
    include("db_functions.php");

    if(isset($_POST["login"])) {
        if(isset($_POST["login-username"]) && isset($_POST["login-pw"])) {
            $manager_username = sanitise_input($_POST["login-username"]);
            $manager_password = sanitise_input($_POST["login-pw"]);
            if(empty($manager_username)) {
                header("location: loginmanager.php?error=Username is required");
                exit();
            } elseif(empty($manager_password)) {
                header("location: loginmanager.php?error=Password is required");
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
                        header("location: loginmanager.php?error=Wrong username or password");
                        exit();
                    }
                } else {
                    header("location: loginmanager.php?error=Could not connect to the Database");
                    exit();
                }
            }
        } else {
            header("location: loginmanager.php?error=Username and password are required");
            exit();
        }
    }
    if(isset($_POST["register"])) {
        header("location: register_manager.php");
        exit();
    }

?>
