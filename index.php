<!--
filename: index.html
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: CloudLabs home page
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Apply to our open positions" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>CloudLabs</title>
  </head>
  <body class="index-body">
  <?php
// include the header
$activePage = 'home';
include_once("header.inc");
?>
    <main>
    <section class="img">
      <br>
      <br>
      <br>
      <div class="header-container">
        <div class="index-typed-out">
          <h1>This is CloudLabs</h1>
        </div>
      </div>
      <br />
      <h2>
        We create your dream website with our inhouse specialist team with ease
        to your mind
      </h2>
      <p class="first-para">
        <!-- Image source: https://www.digitalsilk.com/wp-content/uploads/2022/09/website-development-process-1.jpg -->
        <img src="images/code.jpeg" class="img-2" alt="Illustration of website development" />
        Welcome to our web development company, where we specialize in creating
        custom websites and web applications for businesses of all sizes. We
        believe that a strong online presence is essential for success in
        today's digital age, and we are committed to helping our clients achieve
        their goals through expert web development services.
        <br><br>
        Our team of experienced developers, designers, and project managers work
        closely with each client to understand their unique needs and create a
        website or web application that perfectly fits their vision. We use the
        latest technologies and design trends to ensure that every website we
        create is modern, fast, and user-friendly.
      </p>
      <!-- Services -->
      <section>
        <h2>Services we Provide</h2>
        <div class="row">
          <div class="column">Content Marketing</div>
          <div class="column">Digital Marketing</div>
          <div class="column">Email Marketing</div>
        </div>
        <div class="row">
          <div class="column">SEO</div>
          <div class="column">Web Development</div>
          <div class="column">Web Optimization</div>
        </div>
      </section>
    </section>
    <section class="img">
      <br />
      <br />
      <br />
      <!-- Clients -->
      <h2>Companies we have worked with</h2>
      <section class="logos">
        <img class="logo-indi" src="images/forbes.png" alt="Forbes logo" />
        <img class="logo-indi" src="images/google.png" alt="Google logo" />
        <img class="logo-indi" src="images/bloomberg.png" alt="Bloomberg logo" />
        <img class="logo-indi" src="images/oracle.png" alt="Oracle logo" />
        <img class="logo-indi" src="images/lenovo.png" alt="Lenovo logo" />
        <img class="logo-indi" src="images/apple.png" alt="Apple logo" />
        <img class="logo-indi" src="images/microsoft.png" alt="Microsoft logo" />
        <img class="logo-indi" src="images/swinburne.png" alt="Swinburne logo" />
        <img class="logo-indi" src="images/nestle.png" alt="Nestle logo" />
        <img class="logo-indi" src="images/youtube.png" alt="Youtube logo" />
      </section>
      <br />
      <br />
      <br />
      <!-- Reviews -->
      <h2>Here's some of our client reviews</h2>
      <section class="reviews-container">
        <h2>Reviews</h2>
        <div class="review-card">
          <div class="rating">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9734;</span>
          </div>
          <p class="review-text">
            "The team is amazing! I love how easy it is to customize and the
            quality is top-notch."
          </p>
          <p class="author">- Bill Gate</p>
        </div>
        <section class="review-card">
          <div class="rating">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
          </div>
          <p class="review-text">
            "Best company to get your website built in melbourne hands down."
          </p>
          <p class="author">- Tim Cook</p>
        </section>
      </section>
    </section>
    <!-- Link to video report -->
    <section class="link-report">
      <a href="https://www.youtube.com/watch?v=N02GqclyABc" target="_blank">Link To Video Report</a>
    </section>
    </main>
    <?php
  // include footer
  include_once "footer.inc";
  ?>
  </body>
</html>
