<?php
// initialise variables
$job_reference_number = "";
$first_name = "";
$last_name = "";
$date_of_birth = "";
$gender = "";
$street_address = "";
$suburb = "";
$state = "";
$postcode = "";
$skills = [];
$other_skills = "";
$status = "";

// Function to sanitise inputs
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if this page is reloaded after a form submission
if (isset($_POST["submit"])) {
    $error = false;
    $error_type = "";
	// connect to database
	
	// save the form data to variables and sanitise
    if (isset($_POST["job_reference_number"])) {
        $job_reference_number = sanitise_input($_POST["job_reference_number"]);
    } else {
        $error = true;
        $error_type = "job_reference_number";
    }
    if (isset($_POST["first_name"])) {
        $first_name = sanitise_input($_POST["first_name"]);
    } else {
        $error = true;
        $error_type = "first_name";
    }
    if (isset($_POST["last_name"])) {
        $last_name = sanitise_input($_POST["last_name"]);
    } else {
        $error = true;
        $error_type = "last_name";
    }
    if (isset($_POST["date_of_birth"])) {
        $date_of_birth = sanitise_input($_POST["date_of_birth"]);
    } else {
        $error = true;
        $error_type = "date_of_birth";
    }
    if (isset($_POST["gender"])) {
        $date_of_birth = sanitise_input($_POST["gender"]);
    } else {
        $error = true;
        $error_type = "gender";
    }
    if (isset($_POST["street_address"])) {
        $street_address = sanitise_input($_POST["street_address"]);
    } else {
        $error = true;
        $error_type = "street_address";
    }
    if (isset($_POST["suburb"])) {
        $suburb = sanitise_input($_POST["suburb"]);
    } else {
        $error = true;
        $error_type = "suburb";
    }
    if (isset($_POST["state"])) {
        $state = sanitise_input($_POST["state"]);
    } else {
        $error = true;
        $error_type = "state";
    }
    if (isset($_POST["postcode"])) {
        $postcode = sanitise_input($_POST["postcode"]);
    } else {
        $error = true;
        $error_type = "postcode";
    }
    if (isset($_POST["skills"])) {
        $skills = sanitise_input($_POST["skills"]);
    } else {
        $error = true;
        $error_type = "skills";
    }
    if (isset($_POST["other_skills"])) {
        $other_skills = sanitise_input($_POST["other_skills"]);
    } else {
        $error = true;
        $error_type = "other_skills";
    }
    if (isset($_POST["status"])) {
        $status = sanitise_input($_POST["status"]);
    } else {
        $error = true;
        $error_type = "status";
    }

	// Validation

	// DATA TYPE CHECKS

	// RANGE CHECKS
	

	// If there is no error, add the application to the database
	if ($error == false) {
		
		}
	}
// If there is an error, display the error messages and fill the inputs with the user's previous data (in the HTML form)
?>

