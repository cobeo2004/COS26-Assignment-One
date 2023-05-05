<?php
// initialise form data variables
$job_reference_number = "";
$first_name = "";
$last_name = "";
$date_of_birth = "";
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

// Function to sanitise inputs
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Checks if validation was triggered by a form submit, if not redirect the user

if (!empty($_POST)) {
	// connect to database
	
	// save the form data to variables and sanitise + existence checks
    if (isset($_POST["job_ref_no"])) {
        $job_reference_number = sanitise_input($_POST["job_ref_no"]);
    } else {
        $error = true;
        $error_job_reference_number = "Please enter a job reference number";
    }
    if (isset($_POST["first_name"])) {
        $first_name = sanitise_input($_POST["first_name"]);
    } else {
        $error = true;
        $error_first_name = "Please enter your first name";
    }
    if (isset($_POST["last_name"])) {
        $last_name = sanitise_input($_POST["last_name"]);
    } else {
        $error = true;
        $error_last_name = "Please enter your last name";
    }
    if (isset($_POST["birth_date"])) {
        $date_of_birth = sanitise_input($_POST["birth_date"]);
    } else {
        $error = true;
       $error_date_of_birth = "Please enter your date of birth";
    }
    if (isset($_POST["gender_male"])) {
        $gender = sanitise_input($_POST["gender_male"]);
    } elseif (isset($_POST["gender_female"])) {
        $gender = sanitise_input($_POST["gender_female"]);
    } elseif (isset($_POST["gender_other"])) {
        $gender = sanitise_input($_POST["gender_other"]);
    } else {
        $error = true;
        $error_gender = "Please select a gender";
    }
    if (isset($_POST["address"])) {
        $address = sanitise_input($_POST["address"]);
    } else {
        $error = true;
        $error_street_address = "Please enter your street address";
    }
    if (isset($_POST["suburb"])) {
        $suburb = sanitise_input($_POST["suburb"]);
    } else {
        $error = true;
        $error_suburb = "Please enter your suburb";
    }
    if (isset($_POST["state"])) {
        $state = sanitise_input($_POST["state"]);
    } else {
        $error = true;
        $error_state = "Please select a state";
    }
    if (isset($_POST["postcode"])) {
        $postcode = sanitise_input($_POST["postcode"]);
    } else {
        $error = true;
        $error_postcode = "Please enter your postcode";
    }
    if (isset($_POST["email"])) {
        $email = sanitise_input($_POST["email"]);
    } else {
        $error = true;
        $error_email = "Please enter your email address";
    }
    if (isset($_POST["phone"])) {
        $phone = sanitise_input($_POST["phone"]);
    } else {
        $error = true;
        $error_phone = "Please enter your phone number";
    }
    if (isset($_POST["skills"])) {
        $skills = sanitise_input($_POST["skills"]);
    } else {
        $error = true;
        $error_skills = "Please select at least one skill";
    }
    if (isset($_POST["other_skills"])) {
        $other_skills = sanitise_input($_POST["other_skills"]);
    } elseif (isset($_POST["skills"]) && in_array("Other", $_POST["skills"])){
        $error = true;
        $error_other_skills = "Please enter any other skills you have";
    }
    if (isset($_POST["status"])) {
        $status = sanitise_input($_POST["status"]);
    } else {
        $error = true;
        $error_type = "status";
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

    // check if date of birth is in dd/mm/yyyy format
    if (!preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $date_of_birth) && empty($error_date_of_birth)) {
        $error = true;
        $error_date_of_birth = "Date of birth must be formatted as dd/mm/yyyy";
    }

    // check if state is one of the following: VIC,NSW,QLD,NT,WA,SA,TAS,ACT
    if (!preg_match("/^(VIC|NSW|QLD|NT|WA|SA|TAS|ACT)$/", $state) && empty($error_state)) {
        $error = true;
        $error_state = "State must be one of the following: VIC, NSW, QLD, NT, WA, SA, TAS, ACT";
    }

    // check if postcode is in the selected state
    if (empty($error_postcode)) {
    if ($state == "VIC" && !preg_match("/^(3|8)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in Victoria";
    } elseif ($state == "NSW" && !preg_match("/^(1|2)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in New South Wales";
    } elseif ($state == "QLD" && !preg_match("/^(4|9)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in Queensland";
    } elseif ($state == "NT" && !preg_match("/^(0)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in the Northern Territory";
    } elseif ($state == "WA" && !preg_match("/^(6)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in Western Australia";
    } elseif ($state == "SA" && !preg_match("/^(5)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in South Australia";
    } elseif ($state == "TAS" && !preg_match("/^(7)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in Tasmania";
    } elseif ($state == "ACT" && !preg_match("/^(0)[0-9]{3}$/", $postcode)) {
        $error = true;
        $error_postcode = "This postcode is not in the Australian Capital Territory";
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
    $date_of_birth = explode("/", $date_of_birth);
    // convert date of birth to yyyy-mm-dd format for PHP
    $date_of_birth = $date_of_birth[2] . "-" . $date_of_birth[1] . "-" . $date_of_birth[0];
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

    // check if postcode is 4 characters long
    if (strlen($postcode) != 4 && empty($error_postcode)) {
        $error = true;
        $error_postcode = "Postcode must be 4 characters long";
    }

    // check if phone number contains 8-12 digits or spaces
    if (!preg_match("/^[0-9 ]{8,12}$/", $phone) && empty($error_phone)) {
        $error = true;
        $error_phone = "Phone number must contain 8-12 digits, or spaces";
    }

	// If there is no error, add the application to the database
	if ($error == false) {
		
		
	} else {
        // If there is an error, display the error messages and fill the inputs with the user's previous data (in the HTML form)
        
        // debug
        echo "Job reference number: " . $_POST["job_ref_no"] . "<br>";
        echo "First name: " . $_POST["first_name"] . "<br>";
        echo "Last name: " . $_POST["last_name"] . "<br>";
        echo "Date of birth: " . $_POST["birth_date"] . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Street address: " . $_POST["address"] . "<br>";
        echo "Suburb: " . $_POST["suburb"] . "<br>";
        echo "State: " . $_POST["state"] . "<br>";
        echo "Postcode: " . $_POST["postcode"] . "<br>";
        echo "Email: " . $_POST["email"] . "<br>";
        echo "Phone: " . $_POST["phone"] . "<br>";
        echo "Skills: " . $_POST["skills"] . "<br>";
        echo "Other skills: " . $_POST["other_skills"] . "<br>";


        echo "Error: " . $error . "<br>";
        echo "Error job reference number: " . $error_job_reference_number . "<br>";
        echo "Error first name: " . $error_first_name . "<br>";
        echo "Error last name: " . $error_last_name . "<br>";
        echo "Error date of birth: " . $error_date_of_birth . "<br>";
        echo "Error gender: " . $error_gender . "<br>";
        echo "Error street address: " . $error_street_address . "<br>";
        echo "Error suburb: " . $error_suburb . "<br>";
        echo "Error state: " . $error_state . "<br>";
        echo "Error postcode: " . $error_postcode . "<br>";
        echo "Error email: " . $error_email . "<br>";
        echo "Error phone: " . $error_phone . "<br>";
        echo "Error skills: " . $error_skills . "<br>";
        echo "Error other skills: " . $error_other_skills . "<br>";
    }
} else {
    // Redirect to form, if process not triggered by a form submit
    header("location: apply.php");
}
?>

