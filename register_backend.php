<!--
filename: register_backend.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Backend handler for register
-->

<?php
    session_start();

    include("settings.php");
    include("db_functions.php");

    if(isset($_POST["reg-name"]) && isset($_POST["reg-username"]) && isset($_POST["reg-pw"]) && isset($_POST["reg-auth-code"])) {
        $manager_name = sanitise_input($_POST["reg-name"]);
        $manager_username = sanitise_input($_POST["reg-username"]);
        $manager_password = sanitise_input($_POST["reg-pw"]);
        $manager_auth_code = sanitise_input($_POST["reg-auth-code"]);
        // check if the fields are empty
        if(empty($manager_name)) {
            header("location: register_manager.php?error=Name is required");
            exit();
        } elseif(empty($manager_username)) {
            header("location: register_manager.php?error=Username is required");
            exit();
        } elseif(empty($manager_password)) {
            header("location: register_manager.php?error=Password is required");
            exit();
        } elseif(empty($manager_auth_code)) {
            header("location: register_manager.php?error=Authentication Code is required");
            exit();
        } else {
            // check if the authentication code is correct
            if($manager_auth_code !== "ilovecloudlabs") {
                header("location: register_manager.php?error=Wrong authentication code");
                exit();
            }
            if (!preg_match('/^(?=.*[A-Z]).{8,}$/', $manager_password))
            {
                header("location: register_manager.php?error=Password must be at least 8 characters and must contain at least 1 uppercase letter");
                exit();
            }
            if(check_if_connected($connection) === true) {
                $check_query = "SELECT * FROM manager_db WHERE user_name='$manager_username'";
                $check_res = mysqli_query($connection, $check_query);
                // check if the username already exists
                if(mysqli_num_rows($check_res) > 0) {
                    header("location: register_manager.php?error=This username already exists, please try another");
                    exit();
                } else {
                    // insert the new manager into the database
                    $query = "INSERT INTO manager_db(user_name, password, name) VALUES ('$manager_username', '$manager_password', '$manager_name')";
                    $result = mysqli_query($connection, $query);
                    header("location: loginmanager.php?error=Register successfully");
                    exit();
                }
            } else {
                header("location: register_manager.php?error=Could not connect to the Database");
                exit();
            }
        }
    } else {
        header("location: register_manager.php?error=Username, password and authentication code are required");
        exit();
    }

?>
