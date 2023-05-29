<!--
filename: enhancements.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: Explanations for the website enhancements
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enhancements - CloudLabs</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <meta name="description" content="Website enhancements" />
  </head>
  <body class="index-body">
  <?php
// include the header
$activePage = '';
include_once("header.inc");
?>
    <main class="enhancements-main">
      <!-- ENHANCEMENT 1 -->
      <h1>Enhancements</h1>
      <section>
              <!-- ENHANCEMENT PHP -->
      <h2>Enhancements with PHP</h2>
      <section>
        <h2><a href="jobs.php">First: Dynamic Job Listing with PHP and Database Integration</a></h2>
        <p>This enhancement involves integrating PHP and a database, allowing for the ability to update job listings directly
          from the database without the need for manual HTML editing. This enhancement significantly
           improves the efficiency and flexibility of the job listing management process.</p>
        <p><strong>
        Enhancement Details:
        </strong></p>
        <p>
        Database Integration:
        </p>
        <p>
        We integrated a database into our system to store all job listing information,
         including titles, descriptions, salaries, and responsibilities. This centralised
         storage allows for easy management and retrieval of job listing data. With the use
         of PHP, we developed a script that connects to the database and dynamically generates
         HTML code based on the job listing data. This enables the automatic display of job listings
         with their relevant details on our HTML webpage. We also used a many-to-many database relationship with foreign keys to support having multiple entries for specific job attributes (such as the Key Responsibilities).
        </p>
        <p>
        Direct Database Updates:
        </p>
        <p>
        Managers can update job listings directly from the database, Changes can
        be made to job titles, descriptions, qualifications, etc through the database rather than having to manually edit the HTML. This results in a more consistent and convenient experience for managers. Additionally, if changes need to be made to the design or formatting of the job descriptions, they only need to be changed once instead of having to change every single job description manually.
        </p>

        <p>
        Conclusion: With the HTML webpage using PHP and a database integration it can update job listings
        directly from the database, it achieved enhanced efficiency, accuracy, and flexibility.
        </p>
              <!-- ENHANCEMENT 2 -->
        <h2><a href="manage.php">
        Second: Secure Management Page</a>
        </h2>

        <p>We used PHP to create a secure page for managing job applications and restrict direct access to the manager's
          web page after logging out. This includes the
        creation of a manager registration page with server-side validation for unique usernames and a password rule. Additionally,
        we incorporated a mechanism to temporarily disable access to the website after multiple invalid login attempts.</p>

        <strong>Enhancement Details:</strong>

        <p>Logout Page Creation</p>

        <p>We developed a dedicated logout page using PHP that handles the logout functionality.
          The manage page includes a logout button that users can click to securely log out of their session.
        </p>

        <p>
        Access Restriction:
        </p>
        <p>
        After logging out, we added a mechanism to prevent users from accessing the manager's
        web page directly by entering the URL. This is achieved by implementing checks in PHP
        to verify the user's login status. If a user attempts to access the manager's web page
        without an active session, they are redirected to the login page.
        </p>
       <p>Manager Registration Page</p>
       <p>We created a dedicated manager registration page using PHP that allows managers to sign up for an account. The registration
         form includes fields for entering a unique username and a password that adheres to specific rules. Managers require a unique authentication code to register new accounts.</p>

       <p>Temporary Account Lockout</p>
       <p>For security, we implemented a temporary account lockout feature. After 3 consecutive
         invalid login attempts, access to the website is disabled for a few seconds. This discourages
         unauthorised access attempts and protects against brute-force attacks.</p>

       <p>Conclusion: The enhancement to our HTML page using PHP included a manager registration page with
         server-side validation, a logout function, secure access control to the manage.php page, and a temporary account lockout feature. This
         ensures the security of the system. The server-side validation and data storage mechanisms provide a robust solution for managing registration details,
         while the access control and account lockout features protect against unauthorised access attempts.
</p>
      </section>
    </main>
        <?php
  // include footer
  include_once "footer.inc";
  ?>
  </body>
</html>
