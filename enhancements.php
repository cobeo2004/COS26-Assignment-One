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
      <!-- ENHANCEMENT CSS -->
      <h1>Enhancements</h1>
      <h2>Enhancements with CSS</h2>
      <section>
        <h2><a href="apply.php">First: Advanced CSS</a></h2>
        <p>
          The first enhancement uses advanced CSS such as keyframes,
          animations and flexbox.
        </p>
        <p>
          One example of our advanced CSS is the heading typing animation, which is done by placing the page heading into a container,
          then gradually increasing the width of the container to make it look
          like the text is being typed out. For the blinking cursor animation,
          the right border of the container alternates between solid black and
          transparent.
        </p>
        <p>
          Due to each heading having different lengths, the CSS must be adapted
          individually to fit each heading.
        </p>
        <p>
          Another example is the use of flexbox and dynamic sizing to make our pages responsive. We have used advanced CSS to ensure that the font and elements on the page dynamically resize according to the user's screen size.
        </p>
        <p>
          This enhancement is done solely using HTML and CSS, and the flexbox, keyframes and
          animations go beyond what was taught in the lectures. Overall, the aim
          of this enhancement was to make the website more dynamic and enjoyable
          to use, therefore increasing the quality of the website and making it
          more engaging to users.
        </p>
        <strong>References:</strong>
        <p>
          Marko n.d., ‘CSS Typing Effect’, Codepen, viewed 31 March 2023,
          <a href="https://codepen.io/denic/pen/GRoOxbM"
            >https://codepen.io/denic/pen/GRoOxbM</a
          >.
        </p>
        <p>
          Nikonorov, M 2021, ‘How to Create a CSS Typewriter Effect for Your
          Website — SitePoint’, www.sitepoint.com, viewed 31 March 2023,
          <a href="https://www.sitepoint.com/css-typewriter-effect"
            >https://www.sitepoint.com/css-typewriter-effect</a
          >.
        </p>
      </section>

      <section>
        <h2><a href="about.php">Second: CSS Hover Animations</a></h2>
        <p>The second enhancement uses simple hover CSS animation.</p>
        <p>
          The animation is done by adding a hover effect to the group member's
          card.
        </p>
        <p>
          When the user hovers the group member's card, the card will scale up
          20%, the background color of the card changes to the blue - purple
          linear gradient color, the member's image will scale 10% up, the text
          color will change into white and will change to yellow while the user
          hovers it. In addition, the 'Contact Us' button will also scale up
          20%, the 'Contact Us' will change to yellow and the background color
          changes to blue - purple linear gradient while user hovering it.
          Moreover, the sections that contains essential informations about the
          group will also upsize 10%, change its color to blue - purple linear
          gradient color and the text inside it will change to white if the user
          hovers the card, if the user hovers the text then it will change to
          yellow and scale up 20%. Finally, the timetable will scale up 10% when
          user hovers it and the text inside it will change to yellow color and
          upscale 10% if users hover it.
        </p>
        <p>
          For all the elements inside the about page, there will be a light blue
          shadow when user hovers each element.
        </p>
        <p>
          This animation is done by only using HTML and simple CSS hover
          attribute. The aim of this animation was to make the about page looks
          more modern and ease to use, thus increasing the website's quality and
          consistency.
        </p>
        <strong>References:</strong>
        <p>
          Ivanov, A 2022, 'Adding a Gradient Hover Effect to Buttons with CSS',
          www.stackdiary.com, viewed 20 March 2023,
          <a href="https://stackdiary.com/gradient-hover-effect-css/"
            >https://stackdiary.com/gradient-hover-effect-css</a
          >.
        </p>
        <p>
          W3Schools n.d., 'CSS :hover Selector', W3Schools.com, viewed 20 March
          2023,
          <a href="https://www.w3schools.com/cssref/sel_hover.php"
            >https://www.w3schools.com/cssref/sel_hover.php</a
          >.
        </p>
        <p>
          Coding Artist 2022, 'Responsive Our Team Section | CSS Tutorial | With
          Source Code', youtube.com, viewed 20 March 2023,
          <a href="https://www.youtube.com/watch?v=H_64n7gY3h0"
            >https://www.youtube.com/watch?v=H_64n7gY3h0</a
          >.
        </p>
        <p><a href="phpenhancements.php">PHP Enhancements</a></p>
      </section>

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
