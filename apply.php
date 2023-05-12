<!--
filename: apply.html
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: Job application page
-->



<!-- TODO: Fix error message style, display error message on all fields, fill in user data on error and confirmation page -->

<?php
// check if there are form errors indicated in the URL parameter
if (isset($_GET['error'])) {
  session_start();
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
  <!-- Header -->
  <header>
    <nav id="header-nav">
      <div class="logo">
        <a href="index.html">
          <img src="images/logo-removebg-preview.png" alt="CloudLabs logo" width="80" height="80" /></a>
      </div>
      <ul>
        <li><a href="./index.html">Home</a></li>
        <li><a href="./jobs.html">Jobs</a></li>
        <li id="selected-page"><a href="./apply.html">Apply</a></li>
        <li><a href="./about.html">About</a></li>
      </ul>
    </nav>
  </header>
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
    <!-- Job Application form, sends a POST request to the Swinburne Mercury server upon submission -->
    <form method="post" action="./processEOI.php" novalidate=”novalidate”>
      <fieldset class="apply-section">
        <legend>About the job</legend>
        <label class="apply-label" for="job_ref_no">Which job are you applying for?</label><br />
        <input class="apply-input" type="text" id="job_ref_no" name="job_ref_no" placeholder="Job reference number"
          required minlength="5" maxlength="5" />
          <?php
          // display error message if there is one
          if (isset($_GET['error'])) {
            echo "<span class=\"apply-error\">$error_job_reference_number</span>";
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
              <input class="apply-input" type="text" id="first_name" name="first_name" placeholder="John" required
                maxlength="20" pattern="^[a-zA-Z]+$" />
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="last_name" name="last_name" placeholder="Doe" required
                maxlength="20" pattern="^[a-zA-Z]+$" />
            </td>
          </tr>
        </table>
        <!-- Date of birth - date picker -->
        <label class="apply-label" for="birth_date">Date of birth</label><br />
        <input class="apply-input" type="date" id="birth_date" name="birth_date" required />
        <!-- Gender - radio buttons -->
        <fieldset class="apply-gender-list">
          <legend>Gender</legend>
          <input class="apply-input" type="radio" id="gender_male" name="gender" value="male" required />
          <label class="apply-label" for="gender_male">Male</label><br />
          <input class="apply-input" type="radio" id="gender_female" name="gender" value="female" />
          <label class="apply-label" for="gender_female">Female</label><br />
          <input class="apply-input" type="radio" id="gender_other" name="gender" value="other" />
          <label class="apply-label" for="gender_other">Other</label>
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
              <input class="apply-input" type="text" id="address" name="address" placeholder="1 John St" required
                maxlength="40" />
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="suburb" name="suburb" placeholder="Hawthorn" required
                maxlength="40" />
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
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
              </select>
            </td>
            <td class="apply-td">
              <input class="apply-input" type="text" id="postcode" name="postcode" placeholder="3122" required
                pattern="\d{4}" maxlength="4" />
            </td>
          </tr>
        </table>
        <!-- Email -->
        <label class="apply-label" for="email">Email</label><br />
        <input class="apply-input" type="email" id="email" name="email" placeholder="johndoe@example.com" required />
        <!-- Phone number - 8-12 digits/spaces -->
        <br />
        <label class="apply-label" for="phone">Phone number</label><br />
        <input class="apply-input" type="tel" id="phone" name="phone" placeholder="0412345678" minlength="8"
          maxlength="12" required pattern="[\d\s]+" />
      </fieldset>
      <!-- Skills - checkboxes -->
      <fieldset class="apply-section">
        <legend>Tell us about your skills</legend>
        <input class="apply-input" type="checkbox" id="skill1" name="skills[]" value="communication" required />
        <label class="apply-label" for="skill1">Communication</label><br />
        <input class="apply-input" type="checkbox" id="skill2" name="skills[]" value="teamwork" />
        <label class="apply-label" for="skill2">Teamwork</label><br />
        <input class="apply-input" type="checkbox" id="skill3" name="skills[]" value="detail_oriented" />
        <label class="apply-label" for="skill3">Detail-oriented</label><br />
        <input class="apply-input" type="checkbox" id="skill4" name="skills[]" value="initiative" />
        <label class="apply-label" for="skill4">Initiative</label><br />
        <input class="apply-input" type="checkbox" id="skill5" name="skills[]" value="time_management" />
        <label class="apply-label" for="skill5">Time management</label><br />
        <input class="apply-input" type="checkbox" id="skill6" name="skills[]" value="risk_management" />
        <label class="apply-label" for="skill6">Risk management</label><br />
        <input class="apply-input" type="checkbox" id="skill7" name="skills[]" value="other" />
        <label class="apply-label" for="skill7">Other skills...</label><br /><br />

        <label class="apply-label" for="other_skills">Other skills</label><br />
        <!-- Other skills - textarea -->
        <textarea class="apply-textarea" id="other_skills" name="other_skills" rows="4" cols="30"
          placeholder="If you have any other skills not listed above, please list them here."></textarea>
      </fieldset>
      <input class="apply-input" type="submit" value="Apply" />
    </form>
  </main>      
  <!-- Footer -->
  <footer id="general-footer">
    <div class="footer-row">
      <div class="footer-col">
        <a href="index.html"><img src="images/logo-removebg-preview.png" class="logo" alt="CloudLabs logo" /></a>
        <p>
          Our company provides details of "Chief Technology Officer(CTO)" and
          "Cloud engineering", including base position, skills needed,
          qualification and salary average per year in Australia.
        </p>
      </div>
      <div class="footer-col">
        <h3>Contact us</h3>
        <p class="footer-email-id">
          <a href="mailto:104082552@student.swin.edu.au" class="footer-email-id">Email:
            104082552@student.swin.edu.au</a>
        </p>
        <p>Phone Number: +61423032755</p>
      </div>
      <div class="footer-col">
        <h3>Links</h3>
        <ul>
          <li><a href="./index.html">Home</a></li>
          <li><a href="./jobs.html">Jobs</a></li>
          <li><a href="./apply.html">Apply</a></li>
          <li><a href="./about.html">About</a></li>
          <li><a href="./enhancements.html">Enhancements</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h3>Sign up to our newsletter</h3>
        <form>
          <input type="email" placeholder="Enter your email here" required />
          <input type="submit" />
        </form>
      </div>
    </div>
    <hr />
    <p>CloudLabs 2023 &copy; - All Rights Reserved</p>
  </footer>
</body>

</html>