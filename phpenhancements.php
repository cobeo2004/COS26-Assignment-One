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
        <h2>First: Dynamic Job Listing with PHP and Database Integration</h2>
        <p>Integrating PHP and a database, give the ability to update job listings directly
          from the database without the need for manual coding. This enhancement significantly
           improved the efficiency and flexibility of the job listing management process</p>
        <p><strong>
        Enhancement Details:
        </strong></p>
        <p>
        Database Integration:
        </p>
        <p>
        Integrated a database into our system to store all job listing information,
         including titles, descriptions, salaries, and responsibilities. This centralized
         storage allows for easy management and retrieval of job listing data. With the use
         of PHP, we developed a script that connects to the database and dynamically generates
         HTML code based on the job listing data. This enables the automatic display of job listings
         with their relevant details on our HTML webpage.
        </p>
        <p>
        Direct Database Updates:
        </p>
        <p>
        Authorized personnel can update job listings directly from the database, Changes can
        be made to job titles, descriptions, qualifications, etc through a user-friendly interface.
        </p>

        <p>
        Conclusion: With the HTML webpage using PHP and a database integration it can update job listings
        directly from the database, it achieved enhanced efficiency, accuracy, and flexibility.
        </p>
        <h2>
        Second: Secure Logout Page and Restricted Access using PHP  Summary
        </h2>

        <p>This outlines the successful enhancement we implemented on our HTML webpage
          using PHP to create a secure logout page and restrict direct access to the manager's
          web page after logging out. This enhancement ensures the privacy and security of our
          manager's web portal. </p>

        <p>Logout Page Creation</p>

        <p>We developed a dedicated logout page using PHP that handles the logout functionality.
          This page includes a logout button that users can click to securely log out of their session.
        </p>

        <p>
        Access Restriction:
        </p>
        <p>
        After logging out, we added a mechanism to prevent users from accessing the manager's
        web page directly by entering the URL. This is achieved by implementing checks in PHP
        to verify the user's login status. If a user attempts to access the manager's web page
        without an active session, they are redirected to a login page or a different appropriate page.
        </p>

        <p>Conclusion: The enhancement for the HTML webpage using PHP implemented a secure logout page
          and restricted direct access to the manager's web page after logging out. This enhancement ensures
          the privacy and security of our manager's web portal and provides a user-friendly experience for our users.
        </p>

        <h2>Third: Requiring unique username and a password rule & disable after invalid logins</h2>
        <p>
        The enhancement we implemented on our HTML page using PHP, which includes the
        creation of a manager registration page with server-side validation for unique usernames and password rules. Additionally,
        we developed a secure access control system for the manage.php page by checking the username and password. Furthermore, we
        incorporated a mechanism to temporarily disable access to the website after multiple invalid login attempts.
        </p>
        <p>Manager Registration Page</p>
        <p>created a dedicated manager registration page using PHP that allows managers to sign up for an account. The registration
          form includes fields for entering a unique username and a password that adheres to specific rules,</p>

        <p>Temporary Account Lockout</p>
        <p>added security measure, we implemented a temporary account lockout feature. After a specified number of consecutive
          invalid login attempts, such as three or more attempts, access to the website is disabled for a set period. This discourages
          unauthorized access attempts and protects against brute-force attacks.</p>

        <p>Conclusion: The enhancement to our HTML page using PHP has successfully implemented a manager registration page with
          server-side validation, secure access control to the manage.php page, and a temporary account lockout feature. This
          ensures the security of the system. The server-side validation and data storage mechanisms provide a robust solution for managing registration details,
          while the access control and account lockout features protect against unauthorized access attempts.
        </p>

        <h2>
          Using PHP to add the header and the Footer
        </h2>
      </section>
    </main>
        <?php
  // include footer
  include_once "footer.inc";
  ?>
  </body>
</html>
