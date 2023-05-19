<?php
    $host_name = "feenix-mariadb.swin.edu.au";
    $user_name = "s103819212";
    $password = "281204";
    $database = "assign2_db";
    $table = "form";
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
 function check_table_existence($connection, $table) {
    // If connection is not established, return false
    if(!check_if_connected($connection)) {
        echo "a";
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
            $query = "CREATE TABLE $table (
                EOINumber INT AUTO_INCREMENT PRIMARY KEY,
                job_reference_number VARCHAR(5) NOT NULL,
                first_name VARCHAR(20) NOT NULL,
                last_name VARCHAR(20) NOT NULL,
                date_of_birth DATE NOT NULL,
                gender VARCHAR(6) NOT NULL,
                street_address VARCHAR(40) NOT NULL,
                suburb VARCHAR(40) NOT NULL,
                state VARCHAR(3) NOT NULL,
                postcode VARCHAR(4) NOT NULL,
                email VARCHAR(40) NOT NULL,
                phone VARCHAR(12) NOT NULL,
                skill_communication TINYINT NOT NULL,
                skill_teamwork TINYINT NOT NULL,
                skill_detail_oriented TINYINT NOT NULL,
                skill_initiative TINYINT NOT NULL,
                skill_time_management TINYINT NOT NULL,
                skill_risk_management TINYINT NOT NULL,
                other_skills VARCHAR(300) NOT NULL,
                status VARCHAR(20) NOT NULL
            );";
        mysqli_query($connection, $query);
        return true;
        }
    }
}

    //Create database if exists
    function create_database($connection, $database_name = "assign2") {
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


