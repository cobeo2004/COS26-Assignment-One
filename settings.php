<?php
    $host_name = "feenix-mariadb.swin.edu.au";
    $user_name = "s103819212";
    $password = "281204";
    $database = "s103819212_db";
    $table = "cars";
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
    function check_if_exists_database($conncetion, $database_name) {
        $database = mysqli_select_db($conncetion, $database_name);
        return $database;

    }

    //Function to check if table exists
    function check_if_exists_table($conncetion, $database_name, $table) {
        if(!check_if_connected($conncetion) && !check_if_exists_database($conncetion, $database_name)) {
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

    //Create table if table not exists
    function create_table($connection, $database_name, $table) {
        if(!check_if_connected($connection)) {
            die("Connect failed! \n".mysqli_connect_error());
        } else {
            if(!check_if_exists_database($connection, $database_name)) {
                echo("<p> Creating database </p>");
                create_database($connection, $database_name);
                echo("<p> Database created </p>");
            }
            else {
                if(check_if_exists_table($connection, $database_name, $table)) {
                    echo("<p> Already got the data table</p>");
                }
                else {
                    $query = "CREATE TABLE $table(
                            EOINumber INT AUTO_INCREMENT PRIMARY KEY,
                            job_reference_number VARCHAR(5),
                            first_name VARCHAR(20),
                            last_name VARCHAR(20),
                            date_of_birth VARCHAR(20),
                            gender

                        );";
                    mysqli_query($connection, $query);
                }
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


