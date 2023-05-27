<!--
filename: apply.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: Job application page
-->

<?php
  session_start();
// check if there are form errors indicated in the URL parameter
if (isset($_SESSION['error']) ) {
  // set error to true
  $error = true;
  // get the error messages from session variables
  $error_job_reference_number = $_SESSION["error_job_reference_number"];
  $error_first_name = $_SESSION["error_first_name"];
  $error_last_name = $_SESSION["error_last_name"];
  $error_date_of_birth = $_SESSION["error_date_of_birth"];
  $error_gender = $_SESSION["error_gender"];
  $error_street_address = $_SESSION["error_street_address"];
  $error_suburb = $_SESSION["error_suburb"];
  $error_state = $_SESSION["error_state"];
  $error_postcode = $_SESSION["error_postcode"];
  $error_email = $_SESSION["error_email"];
  $error_phone = $_SESSION["error_phone"];
  $error_skills = $_SESSION["error_skills"];
  $error_other_skills = $_SESSION["error_other_skills"];

  // get the user's form data from session variables
  $job_reference_number = $_SESSION["job_reference_number"];
  $first_name = $_SESSION["first_name"];
  $last_name = $_SESSION["last_name"];
  $date_of_birth = $_SESSION["date_of_birth"];
  $gender = $_SESSION["gender"];
  $street_address = $_SESSION["street_address"];
  $suburb = $_SESSION["suburb"];
  $state = $_SESSION["state"];
  $postcode = $_SESSION["postcode"];
  $email = $_SESSION["email"];
  $phone = $_SESSION["phone"];
  $skills = $_SESSION["skills"];
  $other_skills = $_SESSION["other_skills"];
} else {
  // if there is no form data, set all form data to empty strings
  $error = false;
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
  $skills = "";
  $other_skills = "";
}

if (isset($_GET['no'])) {
  $success = true;
  $application_number = $_GET['no'];
} else {
  $success = false;
}
?>

<!DOCTYPE html>
<html lang="en" class="apply-class">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Apply for our open positions!" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
  <title>Apply - CloudLabs</title>
</head>

<body class="index-body">
<?php
// include the header
$activePage = 'apply';
include_once("header.inc");
?>
  <main class="apply-container">
    <div class="header-container">
      <div class="apply-typed-out">
        <h1 class="apply-h1">Apply for your dream job</h1>
      </div>
    </div>
    <h2 class="apply-h2">
      Fill out the form below to apply for one of our open positions!
    </h2>
    <br />
    <!-- Success modal (adapted from https://codepen.io/Idered/pen/DdeoeW)-->
<input class="show-success-modal" id="success-modal" type="checkbox"     <?php
    // if the form was submitted successfully, check the checkbox to show the success modal
    if ($success) {
      echo "checked";
    }
    ?>/>
    <!-- Only displays when checkbox above is checked -->
<div class="success-modal">
  <label class="success-modal__bg" for="success-modal"></label>
  <div class="success-modal__inner">
    <label class="success-modal__close" for="success-modal"></label>
          <!-- Display CloudLabs logo -->
              <img src="images/logo-removebg-preview.png" alt="CloudLabs logo" width="100" height="100" /></a>
    <br>
    <h2 class="apply-h2">Your job application has been submitted successfully!</h2>
    <br>
      <p>Thank you for applying for a position at CloudLabs. We will review your application and get back to you as soon as possible.</p>
      <br>
      <p>Your application number:</p>
      <?php
      // display the application number
      echo "<p>$application_number</p>";
      ?>
      <br>
  </div>
</div>
    <!-- Job Application form, sends a POST request to the Swinburne Mercury server upon submission -->
    <form method="post" action="./processEOI.php" novalidate=”novalidate”>
      <fieldset class="apply-section">
        <legend>About the job</legend>
        <label class="apply-label" for="job_ref_no">Which job are you applying for?</label><br />
        <input class="apply-input" type="text" id="job_ref_no" name="job_ref_no" placeholder="Job reference number" value="<?php echo $job_reference_number; ?>" required minlength="5" maxlength="5" />
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_job_reference_number</span>";
        }
        ?>
      </fieldset>
      <fieldset class="apply-section">
        <legend>Tell us about yourself</legend>
        <table class="apply-table">
          <tr>
            <td class="apply-td">
              <label class="apply-label" for="first_name">First name</label>
            </td>

            <td class="apply-td">
              <label class="apply-label" for="last_name">Last name</label>
            </td>
          </tr>
          <tr>
            <!-- First and last name, maximum 20 alpha characters -->
            <td class="apply-td">
              <input class="apply-input" type="text" id="first_name" name="first_name" placeholder="John" required maxlength="20" pattern="^[a-zA-Z]+$" value="<?php echo $first_name; ?>">
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_first_name</span>";
              }
              ?>
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="last_name" name="last_name" placeholder="Doe" required maxlength="20" pattern="^[a-zA-Z]+$" value="<?php echo $last_name ?>" />
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_last_name</span>";
              }
              ?>
            </td>
          </tr>
        </table>
        <!-- Date of birth - date picker -->
        <label class="apply-label" for="birth_date">Date of birth</label><br />
        <input class="apply-input" type="date" id="birth_date" name="birth_date" value="<?php
                                                                                        // if this is a resubmission, and a date was filled previously, fill in the date
                                                                                        if (!empty($date_of_birth)) {
                                                                                          echo $date_of_birth;
                                                                                        } ?>" required />
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_date_of_birth</span>";
        }
        ?>
        <!-- Gender - radio buttons -->
        <fieldset class="apply-gender-list">
          <legend>Gender</legend>
          <input class="apply-input" type="radio" id="gender_male" name="gender" value="male" required <?php
                                                                                                        // if this is a resubmission, and this gender was selected previously, check the radio button
                                                                                                        if ($gender === 'male') {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                        ?> />
          <label class="apply-label" for="gender_male">Male</label><br />
          <input class="apply-input" type="radio" id="gender_female" name="gender" value="female" <?php
                                                                                                  // if this is a resubmission, and this gender was selected previously, check the radio button
                                                                                                  if ($gender === 'female') {
                                                                                                    echo "checked";
                                                                                                  }
                                                                                                  ?> />
          <label class="apply-label" for="gender_female">Female</label><br />
          <input class="apply-input" type="radio" id="gender_other" name="gender" value="other" <?php
                                                                                                // if this is a resubmission, and this gender was selected previously, check the radio button
                                                                                                if ($gender === 'other') {
                                                                                                  echo "checked";
                                                                                                }
                                                                                                ?> />
          <label class="apply-label" for="gender_other">Other</label>
          <?php
          // display error message if there is one
          if ($error) {
            echo "<br><span class='apply-error'>$error_gender</span>";
          }
          ?>
        </fieldset>
        <!-- Address - Max 40 characters -->
        <table class="apply-table">
          <tr>
            <td class="apply-td">
              <label class="apply-label" for="address">Street address</label>
            </td>
            <td class="apply-td">
              <label class="apply-label" for="suburb">Suburb/town</label>
            </td>
          </tr>
          <tr>
            <td class="apply-td">
              <input class="apply-input" type="text" id="address" name="address" placeholder="1 John St" required maxlength="40" value="<?php echo $street_address ?>" />
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_street_address</span>";
              }
              ?>
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="suburb" name="suburb" placeholder="Hawthorn" required maxlength="40" value="<?php echo $suburb ?>" />
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_suburb</span>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <!-- State - Dropdown -->
            <td class="apply-td">
              <label class="apply-label" for="state">State</label>
            </td>
            <!-- Postcode - 4 numbers -->
            <td class="apply-td">
              <label class="apply-label" for="postcode">Postcode</label>
            </td>
          </tr>
          <tr>
            <td class="apply-td">
              <select class="apply-select" name="state" id="state" required>
                <option value="" disabled selected>Select your state</option>
                <option value="VIC" <?php
                                    // if this is a form resubmission, and the state is VIC, select it
                                    if ($state === "VIC") {
                                      echo "selected";
                                    }
                                    ?>>VIC</option>
                <option value="NSW" <?php
                                    // if this is a form resubmission, and the state is NSW, select it
                                    if ($state === "NSW") {
                                      echo "selected";
                                    }
                                    ?>>NSW</option>
                <option value="QLD" <?php
                                    // if this is a form resubmission, and the state is QLD, select it
                                    if ($state === "QLD") {
                                      echo "selected";
                                    }
                                    ?>>QLD</option>
                <option value="NT" <?php
                                    // if this is a form resubmission, and the state is NT, select it
                                    if ($state === "NT") {
                                      echo "selected";
                                    }
                                    ?>>NT</option>
                <option value="WA" <?php
                                    // if this is a form resubmission, and the state is WA, select it
                                    if ($state === "WA") {
                                      echo "selected";
                                    }
                                    ?>>WA</option>
                <option value="SA" <?php
                                    // if this is a form resubmission, and the state is SA, select it
                                    if ($state === "SA") {
                                      echo "selected";
                                    }
                                    ?>>SA</option>
                <option value="TAS" <?php
                                    // if this is a form resubmission, and the state is TAS, select it
                                    if ($state === "TAS") {
                                      echo "selected";
                                    }
                                    ?>>TAS</option>
                <option value="ACT" <?php
                                    // if this is a form resubmission, and the state is ACT, select it
                                    if ($state === "ACT") {
                                      echo "selected";
                                    }
                                    ?>>ACT</option>
              </select>
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_state</span>";
              }
              ?>
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="postcode" name="postcode" placeholder="3122" required pattern="\d{4}" maxlength="4" value="<?php echo $postcode ?>" />
              <?php
              // display error message if there is one
              if ($error) {
                echo "<span class='apply-error'>$error_postcode</span>";
              }
              ?>
            </td>
          </tr>
        </table>
        <!-- Email -->
        <label class="apply-label" for="email">Email</label><br />
        <input class="apply-input" type="email" id="email" name="email" placeholder="johndoe@example.com" required value="<?php echo $email ?>" />
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_email</span>";
        }
        ?>
        <!-- Phone number - 8-12 digits/spaces -->
        <br />
        <label class="apply-label" for="phone">Phone number</label><br />
        <input class="apply-input" type="tel" id="phone" name="phone" placeholder="0412345678" minlength="8" maxlength="12" required pattern="[\d\s]+" value="<?php echo $phone ?>" />
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_phone</span>";
        }
        ?>
      </fieldset>
      <!-- Skills - checkboxes -->
      <fieldset class="apply-section">
        <legend>Tell us about your skills</legend>
        <input class="apply-input" type="checkbox" id="skill1" name="skills[]" value="communication" required <?php
                                                                                                              // if this is a form resubmission, and the skills array contains communication, check it
                                                                                                              if ($error && in_array("communication", $skills)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                              ?> />
        <label class="apply-label" for="skill1">Communication</label><br />
        <input class="apply-input" type="checkbox" id="skill2" name="skills[]" value="teamwork" <?php
                                                                                                // if this is a form resubmission, and the skills array contains teamwork, check it
                                                                                                if ($error && in_array("teamwork", $skills)) {
                                                                                                  echo "checked";
                                                                                                }
                                                                                                ?> />
        <label class="apply-label" for="skill2">Teamwork</label><br />
        <input class="apply-input" type="checkbox" id="skill3" name="skills[]" value="detail_oriented" <?php
                                                                                                        // if this is a form resubmission, and the skills array contains detail oriented, check it
                                                                                                        if ($error && in_array("detail_oriented", $skills)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                        ?> />
        <label class="apply-label" for="skill3">Detail-oriented</label><br />
        <input class="apply-input" type="checkbox" id="skill4" name="skills[]" value="initiative" <?php
                                                                                                  // if this is a form resubmission, and the skills array contains initiative, check it
                                                                                                  if ($error && in_array("initiative", $skills)) {
                                                                                                    echo "checked";
                                                                                                  }
                                                                                                  ?> />
        <label class="apply-label" for="skill4">Initiative</label><br />
        <input class="apply-input" type="checkbox" id="skill5" name="skills[]" value="time_management" <?php
                                                                                                        // if this is a form resubmission, and the skills array contains time management, check it
                                                                                                        if ($error && in_array("time_management", $skills)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                        ?> />
        <label class="apply-label" for="skill5">Time management</label><br />
        <input class="apply-input" type="checkbox" id="skill6" name="skills[]" value="risk_management" <?php
                                                                                                        // if this is a form resubmission, and the skills array contains risk management, check it
                                                                                                        if ($error && in_array("risk_management", $skills)) {
                                                                                                          echo "checked";
                                                                                                        }
                                                                                                        ?> />
        <label class="apply-label" for="skill6">Risk management</label><br />
        <input class="apply-input" type="checkbox" id="skill7" name="skills[]" value="other" <?php
                                                                                              // if this is a form resubmission, and the skills array contains other skills, check it
                                                                                              if ($error && in_array("other", $skills)) {
                                                                                                echo "checked";
                                                                                              }
                                                                                              ?> />
        <label class="apply-label" for="skill7">Other skills...</label><br /><br />
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_skills</span><br>";
        }
        ?>
        <label class="apply-label" for="other_skills">Other skills</label><br />
        <!-- Other skills - textarea -->
        <textarea class="apply-textarea" id="other_skills" name="other_skills" rows="4" cols="30" placeholder="If you have any other skills not listed above, please list them here."><?php
                                                                                                                                                                                      // if this is a form resubmission, and the skills array contains other skills, display the user's other skills if filled
                                                                                                                                                                                      if ($error && in_array("other", $skills)) {
                                                                                                                                                                                        echo $other_skills;
                                                                                                                                                                                      }
                                                                                                                                                                                      ?></textarea>
        <?php
        // display error message if there is one
        if ($error) {
          echo "<span class='apply-error'>$error_other_skills</span>";
        }
        ?>
      </fieldset>
      <input class="apply-input" type="submit" value="Apply" />
    </form>
  </main>
  <?php
  // include footer
  include_once "footer.inc";
  ?>
</body>

</html>
