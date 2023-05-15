<?php
    $host_name = "feenix-mariadb.swin.edu.au";
    $user_name = "s103819212";
    $password = "281204";
    $database = "s103819212_db";
    $table = "cars";
    $connection = @mysqli_connect($host_name, $user_name, $password, $database);

    function check_if_connected(\mysqli $connection) {
        if(mysqli_connect_errno()) {
            die("Connect failed! \n".mysqli_connect_error());
            return false;
        }
        else {
            return true;
        }
    }

    function check_if_exists_table(\mysqli $conncetion, string $table) {
        if(!check_if_connected($conncetion)) {
            return false;
        }
        else {
            $result = mysqli_query($conncetion, "DESCRIBE `$table`;");
            if($result !== false) {
                if(mysqli_num_rows($result) > 0) {
                    return true;
                }
            }
            else {
                return false;
            }
        }
    }

    function create_table(\mysqli $connection, string $table) {
        if(check_if_exists_table($connection, $table)) {
            echo("<p> Already got the data table</p>");
        }
        else {
            mysqli_query($connection, "CREATE TABLE $table");
        }
    }
?>


