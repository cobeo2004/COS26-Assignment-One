<!--
filename: processEOI.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 28-Apr-2023
description: Script to process the job application form
-->

<?php
// initialise database connection
include "settings.php";
include "db_functions.php";

// check if the EOI table exists, if not create it
if(!check_table_existence($connection)) {
    create_table($connection, "eoi");
}

// initialise form data variables
$job_reference_number = "";
$first_name = "";
$last_name = "";
$date_of_birth = "";
$date_of_birth_string = "";
$gender = "";
$street_address = "";
$suburb = "";
$state = "";
$postcode = "";
$email = "";
$phone = "";
$skills = [];
$other_skills = "";
$status = "";

// initialise error variables
$error = false;
$error_job_reference_number = "";
$error_first_name = "";
$error_last_name = "";
$error_date_of_birth = "";
$error_gender = "";
$error_street_address = "";
$error_suburb = "";
$error_state = "";
$error_postcode = "";
$error_email = "";
$error_phone = "";
$error_skills = "";
$error_other_skills = "";



// Checks if validation was triggered by a form submit, if not redirect the user
if ($_POST) {
	// connect to database

	// save the form data to variables and sanitise + existence checks
    if (!empty($_POST["job_ref_no"])) {
        $job_reference_number = sanitise_input($_POST["job_ref_no"]);
    } else {
        $error = true;
        $error_job_reference_number = "Please enter a job reference number";
    }

    if (!empty($_POST["first_name"])) {
        $first_name = sanitise_input($_POST["first_name"]);
    } else {
        $error = true;
        $error_first_name = "Please enter your first name";
    }

    if (!empty($_POST["last_name"])) {
        $last_name = sanitise_input($_POST["last_name"]);
    } else {
        $error = true;
        $error_last_name = "Please enter your last name";
    }

    if (!empty($_POST["birth_date"])) {
        $date_of_birth = sanitise_input($_POST["birth_date"]);
    } else {
        $error = true;
       $error_date_of_birth = "Please enter your date of birth";
    }

    if (!empty($_POST["gender"])) {
        $gender = sanitise_input($_POST["gender"]);
    } else {
        $error = true;
        $error_gender = "Please select a gender";
    }

    if (!empty($_POST["address"])) {
        $street_address = sanitise_input($_POST["address"]);
    } else {
        $error = true;
        $error_street_address = "Please enter your street address";
    }

    if (!empty($_POST["suburb"])) {
        $suburb = sanitise_input($_POST["suburb"]);
    } else {
        $error = true;
        $error_suburb = "Please enter your suburb";
    }

    if (!empty($_POST["state"])) {
        $state = sanitise_input($_POST["state"]);
    } else {
        $error = true;
        $error_state = "Please select a state";
    }

    if (!empty($_POST["postcode"])) {
        $postcode = sanitise_input($_POST["postcode"]);
    } else {
        $error = true;
        $error_postcode = "Please enter your postcode";
    }

    if (!empty($_POST["email"])) {
        $email = sanitise_input($_POST["email"]);
    } else {
        $error = true;
        $error_email = "Please enter your email address";
    }

    if (!empty($_POST["phone"])) {
        $phone = sanitise_input($_POST["phone"]);
    } else {
        $error = true;
        $error_phone = "Please enter your phone number";
    }

    if (!empty($_POST["skills"])) {
        // if skills is an array (which it should be), sanitise each skill
        if (is_array($_POST["skills"])) {
            foreach ($_POST["skills"] as $skill) {
                $skills[] = sanitise_input($skill);
            }
        } else {
            $skills[] = sanitise_input($_POST["skills"]);
        }
    } else {
        $error = true;
        $error_skills = "Please select at least one skill";
    }

    if (!empty($_POST["other_skills"])) {
        $other_skills = sanitise_input($_POST["other_skills"]);
    } elseif (!empty($_POST["skills"]) && in_array("other", $_POST["skills"])){
        $error = true;
        $error_other_skills = "Please enter any other skills you have";
    }

	// VALIDATION

	// DATA TYPE CHECKS
    // check if job reference number contains only alphanumeric characters
    if (!preg_match("/^[a-zA-Z0-9]*$/", $job_reference_number) && empty($error_job_reference_number)) {
        $error = true;
        $error_job_reference_number = "Job reference number must contain only alphanumeric characters";
    }

    // check if first name contains only alphabetic characters
    if (!preg_match("/^[a-zA-Z]*$/", $first_name) && empty($error_first_name)) {
        $error = true;
        $error_first_name = "First name must contain only alphabetic characters";
    }

    // check if last name contains only alphabetic characters
    if (!preg_match("/^[a-zA-Z]*$/", $last_name) && empty($error_last_name)) {
        $error = true;
        $error_last_name = "Last name must contain only alphabetic characters";
    }
     // check if the date picker has been used (if date of birth is in yyyy-mm-dd format)
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date_of_birth) && empty($error_date_of_birth)) {
        $error = true;
        $error_date_of_birth = "Please enter a valid date of birth";
    }
    // check if state is one of the following: VIC,NSW,QLD,NT,WA,SA,TAS,ACT
    if (!preg_match("/^(VIC|NSW|QLD|NT|WA|SA|TAS|ACT)$/", $state) && empty($error_state)) {
        $error = true;
        $error_state = "Please select a valid state";
    }

    // check if postcode is 4 characters long
    // better to check postcode length before checking if it is in the selected state
    if (strlen($postcode) != 4 && empty($error_postcode)) {
        $error = true;
        $error_postcode = "Postcode must be 4 characters long";
    }

    // check if postcode is in the selected state
    if (empty($error_postcode)) {
    if ($state == "VIC" && !preg_match("/^(3|8)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Victorian postcode";
    } elseif ($state == "NSW" && !preg_match("/^(1|2)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid New South Wales postcode";
    } elseif ($state == "QLD" && !preg_match("/^(4|9)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Queensland postcode";
    } elseif ($state == "NT" && !preg_match("/^(0)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Northern Territory postcode";
    } elseif ($state == "WA" && !preg_match("/^(6)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Western Australia postcode";
    } elseif ($state == "SA" && !preg_match("/^(5)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid South Australia postcode";
    } elseif ($state == "TAS" && !preg_match("/^(7)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Tasmania postcode";
    } elseif ($state == "ACT" && !preg_match("/^(0)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "Please enter a valid Australian Capital Territory postcode";
    }
}

    // check if email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && empty($error_email)) {
        $error = true;
        $error_email = "Please enter a valid email address";
    }

	// RANGE CHECKS
	// check if job reference number is 5 characters
    if (strlen($job_reference_number) != 5 && empty($error_job_reference_number)) {
        $error = true;
        $error_job_reference_number = "Job reference number must be 5 characters long";
    }

    // check if first name is maximum 20 characters long
    if (strlen($first_name) > 20 && empty($error_first_name)) {
        $error = true;
        $error_first_name = "First name must be 20 characters or less";
    }

    // check if last name is maximum 20 characters long
    if (strlen($last_name) > 20 && empty($error_last_name)) {
        $error = true;
        $error_last_name = "Last name must be 20 characters or less";
    }

    // check if age is between 15 and 80 using date of birth
    if (empty($error_date_of_birth)) {
    // save date of birth string for later use
    $date_of_birth_string = $date_of_birth;
        // calculate age
    $date_of_birth = date_create($date_of_birth);
    $today = date_create(date("Y-m-d"));
    $age = date_diff($date_of_birth, $today);
    $age = $age->format("%y");
    if ($age < 15 || $age > 80) {
        $error = true;
        $error_date_of_birth = "Age must be between 15 and 80 years old";
    }
}

    // check if street address is maximum 40 characters long
    if (strlen($street_address) > 40 && empty($error_street_address)) {
        $error = true;
        $error_street_address = "Street address must be 40 characters or less";
    }

    // check if suburb is maximum 40 characters long
    if (strlen($suburb) > 40 && empty($error_suburb)) {
        $error = true;
        $error_suburb = "Suburb must be 40 characters or less";
    }

    // check if phone number contains 8-12 digits or spaces
    if (!preg_match("/^[0-9 ]{8,12}$/", $phone) && empty($error_phone)) {
        $error = true;
        $error_phone = "Phone number must contain 8-12 digits, or spaces";
    }

    session_start();
	// If there is no error, add the application to the database
	if ($error === false) {
        // Check if table exists
         if (check_table_existence($connection, 'eoi') === true) {
            // Extract skills from array
            if (in_array("communication", $skills)) {
                $skill_communication = 1;
            } else {
                $skill_communication = 0;
            }

            if (in_array("teamwork", $skills)) {
                $skill_teamwork = 1;
            } else {
                $skill_teamwork = 0;
            }

            if (in_array("detail_oriented", $skills)) {
                $skill_detail_oriented = 1;
            } else {
                $skill_detail_oriented = 0;
            }

            if (in_array("initiative", $skills)) {
                $skill_initiative = 1;
            } else {
                $skill_initiative = 0;
            }

            if (in_array("time_management", $skills)) {
                $skill_time_management = 1;
            } else {
                $skill_time_management = 0;
            }

            if (in_array("risk_management", $skills)) {
                $skill_risk_management = 1;
            } else {
                $skill_risk_management = 0;
            }
            // If table exists, insert data into table
            $data = add_eoi_data($connection, $job_reference_number, $first_name, $last_name, $date_of_birth_string, $gender, $street_address, $suburb, $state, $postcode, $email, $phone, $skill_communication, $skill_teamwork, $skill_detail_oriented, $skill_initiative, $skill_time_management, $skill_risk_management, $other_skills);
            if($data === true) {
                // delete form session variables
                session_destroy();
                // redirect to the application form with success parameter and application number set
                redirect_if_success($connection);
            } else {
                header("location: apply.php");
                exit;
            }
         }
	} else {
        // If there is an error, display the error messages and fill the inputs with the user's previous data (in the HTML form)
        // store error messages in session variables
        $_SESSION["error"] = true;
        $_SESSION["error_job_reference_number"] = $error_job_reference_number;
        $_SESSION["error_first_name"] = $error_first_name;
        $_SESSION["error_last_name"] = $error_last_name;
        $_SESSION["error_date_of_birth"] = $error_date_of_birth;
        $_SESSION["error_gender"] = $error_gender;
        $_SESSION["error_street_address"] = $error_street_address;
        $_SESSION["error_suburb"] = $error_suburb;
        $_SESSION["error_state"] = $error_state;
        $_SESSION["error_postcode"] = $error_postcode;
        $_SESSION["error_email"] = $error_email;
        $_SESSION["error_phone"] = $error_phone;
        $_SESSION["error_skills"] = $error_skills;
        $_SESSION["error_other_skills"] = $error_other_skills;

        // store user's previous data in session variables (so the user doesn't have to re-enter all the data)
        $_SESSION["job_reference_number"] = $job_reference_number;
        $_SESSION["first_name"] = $first_name;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["date_of_birth"] = $_POST["birth_date"];
        $_SESSION["gender"] = $gender;
        $_SESSION["street_address"] = $street_address;
        $_SESSION["suburb"] = $suburb;
        $_SESSION["state"] = $state;
        $_SESSION["postcode"] = $postcode;
        $_SESSION["email"] = $email;
        $_SESSION["phone"] = $phone;
        $_SESSION["skills"] = $skills;
        $_SESSION["other_skills"] = $other_skills;

        // redirect to the application form with error parameter set
        header("location: apply.php");
        exit;
    }
} else {
    // Redirect to form, if process not triggered by a form submit
    header("location: apply.php");
    exit;
}
?>

