<!--
filename: enhancements.html
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
    <!-- Header -->
    <header>
      <nav id="header-nav">
        <div class="logo">
          <a href="index.html">
            <img
              src="images/logo-removebg-preview.png"
              alt="CloudLabs logo"
              width="80"
              height="80"
          /></a>
        </div>
        <ul>
          <li><a href="./index.html">Home</a></li>
          <li><a href="./jobs.html">Jobs</a></li>
          <li><a href="./apply.html">Apply</a></li>
          <li><a href="./about.html">About</a></li>
        </ul>
      </nav>
    </header>
    <main class="enhancements-main">
      <!-- ENHANCEMENT 1 -->
      <h1>Enhancements</h1>
      <section>
        <h2><a href="apply.html">First: Advanced CSS</a></h2>
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
      <!-- ENHANCEMENT 2 -->
      <section>
        <h2><a href="about.html">Second: CSS Hover Animations</a></h2>
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
      </section>
    </main>
    <footer id="general-footer">
      <div class="footer-row">
        <div class="footer-col">
          <a href="index.html"><img
            src="images/logo-removebg-preview.png"
            class="logo"
            alt="CloudLabs logo"
          /></a>
          <p>
            Our company provides details of "Chief Technology Officer(CTO)" and
            "Cloud engineering", including base position, skills needed,
            qualification and salary average per year in Australia.
          </p>
        </div>

        <div class="footer-col">
          <h3>Contact us</h3>
          <p class="footer-email-id">
            <a href="mailto:104082552@student.swin.edu.au" class="footer-email-id"
              >Email: 104082552@student.swin.edu.au</a
            >
          </p>
          <p>Phone Number: +61423032755</p>
        </div>
        <!-- Footer -->
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