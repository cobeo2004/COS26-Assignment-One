<?php
    //Check if the server has been connected
    function check_if_connected($connection) {
        return $connection ? true : false;
    }

    //Function to check if table exists
    function check_table_existence($connection, $table = "eoi") {
        // If connection is not established, return false
        if(!check_if_connected($connection)) {
            die("<p>Cannot connected to database</p>".mysqli_error($connection));
            return false;
        }
        // If connection is established, check if table exists
        else {
            $result = mysqli_query($connection, "SHOW TABLES LIKE '$table';");
            if($result !== false) {
                if(mysqli_num_rows($result) > 0) {
                    return true;
                } else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
    }

    //Function to create the table if not exists
    function create_table($connection, $table_name) {
        if(check_table_existence($connection, $table_name) === false) {
            // If the table does not exist, create the table
            $query = "CREATE TABLE IF NOT EXISTS $table_name (
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
                status ENUM('New', 'Current', 'Final') NOT NULL
            );";
            mysqli_query($connection, $query);
        }
    }

    // //Create database if exists
    // function create_database($connection, $database_name = "assign2") {
    //     if(!check_if_connected($connection)) {
    //         die("Connect failed! \n".mysqli_connect_error());
    //     }
    //     else {
    //         if(!check_if_exists_database($connection, $database_name)) {
    //             mysqli_query($connection, "CREATE DATABASE $database_name");
    //             echo("<p> Database $database_name has been created successfully!</p>");
    //         } else {
    //             echo("<p> Already create the table </p>");
    //         }
    //     }
    // }

    // Add user data to table
    function add_eoi_data($connection, $job_reference_number, $first_name, $last_name, $date_of_birth_string, $gender, $street_address, $suburb, $state, $postcode, $email, $phone, $skill_communication, $skill_teamwork, $skill_detail_oriented, $skill_initiative, $skill_time_management, $skill_risk_management, $other_skills) {
        if(check_table_existence($connection) === true) {
            //Inserting data if have created table
            $query = "INSERT INTO eoi (job_reference_number, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone, skill_communication, skill_teamwork, skill_detail_oriented, skill_initiative, skill_time_management, skill_risk_management, other_skills, status) values ('$job_reference_number', '$first_name', '$last_name', '$date_of_birth_string', '$gender', '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skill_communication', '$skill_teamwork', '$skill_detail_oriented', '$skill_initiative', '$skill_time_management', '$skill_risk_management', '$other_skills', 'New')";
            $queried = mysqli_query($connection, $query);
            //Return true if successfully query, otherwise no
            return $queried ? true : false;
        }
    }

    function redirect_if_success($connection) {
        // dynamically retrieve application number from the database, and pass it to apply.php
        $res = mysqli_query($connection, "SELECT EOINumber FROM eoi");
        $rows = array();
        while($row = mysqli_fetch_array($res)) {
            $rows[] = $row['EOINumber'];
        }
        $application_number = $rows[count($rows) - 1];
        header("location: apply.php?no=$application_number");
        exit;
    }

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
