<?php
    session_start();

    include("settings.php");
    include("db_functions.php");

    if(isset($_POST["reg-name"]) && isset($_POST["reg-username"]) && isset($_POST["reg-pw"]) && isset($_POST["reg-auth-code"])) {
        $manager_name = sanitise_input($_POST["reg-name"]);
        $manager_username = sanitise_input($_POST["reg-username"]);
        $manager_password = sanitise_input($_POST["reg-pw"]);
        $manager_auth_code = sanitise_input($_POST["reg-auth-code"]);
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
            if($manager_auth_code !== "ilovecloudlabs") {
                header("location: register_manager.php?error=Wrong authentication code");
                exit();
            }
            if(check_if_connected($connection) === true) {
                $check_query = "SELECT * FROM manager_db WHERE password='$manager_password'";
                $check_res = mysqli_query($connection, $check_query);
                if(mysqli_num_rows($check_res) > 0) {
                    header("location: register_manager.php?error=The password is existed, please try another");
                    exit();
                } else {
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
