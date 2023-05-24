<?php
    if (isset($_POST["login"])) {
        if(isset($_SESSION["username"]) && isset($_SESSION["pw"])) {
            $username = $_POST["username"];
            $password = $_POST["pw"];

            $_SESSION["username"] = $username;
            $_SESSION["pw"] = $password;
            header("location: manage.php");
        }
    }
    else {
        header("location: loginmanager.php");
    }
?>
