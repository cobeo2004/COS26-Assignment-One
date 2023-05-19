<?php
    $host_name = "feenix-mariadb.swin.edu.au";
    $user_name = "s103819212";
    $password = "281204";
    $database = "s103819212_db";
    $connection = @mysqli_connect($host_name, $user_name, $password, $database);

    //Check if the server has been connected
    function check_if_connected($connection) {
        if($connection === false) {
            return false;
        }
        else {
            return true;
        }
    }

    //Check if database exists
    function check_if_exists_database($connection, $database_name) {
        $database = mysqli_select_db($connection, $database_name);
        return $database;

    }

    //Function to check if table exists
    function check_if_exists_table($connection, $database_name, $table) {
        if(!check_if_connected($connection) && !check_if_exists_database($connection, $database_name)) {
            return false;
        }
        else {
            $result = mysqli_query($connection, "DESCRIBE `$table`;");
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

 //Function to check if table exists
 function check_table_existence($connection, $table) {
    // If connection is not established, return false
    if(!check_if_connected($connection)) {
        return false;
    }
    // If connection is established, check if table exists
    else {
        $result = mysqli_query($connection, "DESCRIBE `$table`;");
        if($result !== false) {
            if(mysqli_num_rows($result) > 0) {
                return true;
            } else
                return false;
        }
        else {
            // If the table does not exist, create the table
            $query = "CREATE TABLE $table(
                EOINumber INT AUTO_INCREMENT PRIMARY KEY,
                job_reference_number VARCHAR(5),
                first_name VARCHAR(20),
                last_name VARCHAR(20),
                date_of_birth DATE,
                gender VARCHAR(6),
                street_address VARCHAR(40),
                suburb VARCHAR(40),
                state VARCHAR(3),
                postcode VARCHAR(4),
                email VARCHAR(40),
                phone VARCHAR(12),
                skill_communication TINYINT,
                skill_teamwork TINYINT,
                skill_detail_oriented TINYINT,
                skill_initiative TINYINT,
                skill_time_management TINYINT,
                skill_risk_management TINYINT,
                other_skills VARCHAR(300),
                status VARCHAR(20)
            );";
        mysqli_query($connection, $query);
        return true;
        }
    }
}

    //Create database if exists
    function create_database($connection, $database_name) {
        if(!check_if_connected($connection)) {
            die("Connect failed! \n".mysqli_connect_error());
        }
        else {
            if(!check_if_exists_database($connection, $database_name)) {
                mysqli_query($connection, "CREATE DATABASE $database_name");
                echo("<p> Database $database_name has been created successfully!</p>");
            } else {
                echo("<p> Already create the table </p>");
            }
        }
    }


?>


