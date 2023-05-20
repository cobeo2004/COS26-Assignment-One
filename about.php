<!--
filename: about.html
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 29-Mar-2023
description: About our team
-->

<!DOCTYPE html>
<html lang="en" class="about-class">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>About Us - CloudLabs</title>
  </head>
  <body id="about-body" class="index-body">
  <?php
// include the header
$activePage = 'about';
include_once("header.inc");
?>
    <main>
      <div class="about-container">
        <div class="header-container">
          <div class="about-typed-out">
            <h1 class="about-h1">About our team</h1>
          </div>
        </div>
        <p class="about-p">
          We are a team of quick learners who are always on the lookout for the
          latest advancements in the cloud technology and web developing
          industry. We continuously upgrade our skills and knowledge through
          attending conferences, training programs, and workshops to stay
          upgrade of the latest trends and technologies.
        </p>
        <!-- Group Info -->
        <section class="about-group-info">
          <dl>
            <dt>Group Name</dt>
            <dd>Deadline Is Coming</dd>
          </dl>
          <dl>
            <dt>Group ID</dt>
            <dd>FYM69</dd>
          </dl>
          <dl>
            <dt>Tutor's Name</dt>
            <dd>Grace Tao</dd>
          </dl>
          <dl>
            <dt>Course</dt>
            <dd>Computing Technology Inquiry Project</dd>
          </dl>
        </section>
        <!-- Members -->
        <div class="about-card">
          <img src="./images/member/Simon.png" alt="Tuan Minh member photo">
          <h3 class="about-h3">Tuan Minh</h3>
          <p>Role: Leader</p>
        </div>
        <div class="about-card">
          <img src="./images/member/Nathan.jpeg" alt="Nathan member photo">
          <h3 class="about-h3">Nathan</h3>
          <p>Role: Co-Leader</p>
        </div>
        <div class="about-card">
          <img src="./images/member/MaiAn.JPG" alt="Mai An member photo">
          <h3 class="about-h3">Mai An</h3>
          <p>Role: Member</p>
        </div>
        <div class="about-card">
          <img src="./images/member/amiru.jpg" alt="Amiru member photo">
          <h3 class="about-h3">Amiru</h3>
          <p>Role: Member</p>
        </div>
        <div class="about-card">
          <img src="./images/member/Nhatminh.jpg" alt="Nhat Minh member photo">
          <h3 class="about-h3">Nhat Minh</h3>
          <p>Role: Member</p>
        </div>
        <div>
        <!-- Timetable -->
        <section class="about-timetable">
          <h2 class="about-h2">Timetable</h2>
          <table>
            <thead>
              <tr>
                <th>Day</th>
                <th>Time</th>
                <th>Class</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Monday</td>
                <td>12:30pm - 1:30pm</td>
                <td>Computing Technology Inquiry Project - Lecture</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>8:30am - 10:30am</td>
                <td>Introduction To Programming - Lecture</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>3:30pm - 4:30pm</td>
                <td>Computing Technology Inquiry Project - Lab</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>8:30am - 11:30am</td>
                <td>Networks and Switching - Lab</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>2:30pm - 4:30pm</td>
                <td>Computer Systems - Lab</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>10:30am - 12:30pm</td>
                <td>Introduction to Programming - Lab</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>10:30am - 12:30pm</td>
                <td>Networks and Switching - Lecture</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>2:30pm - 4:30pm</td>
                <td>Computing Technology Inquiry Project - Workshop</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>4:30pm - 5:30pm</td>
                <td>Computer Systems - Lecture</td>
              </tr>
            </tbody>
          </table>
        </section>
        <figure class="about-group-img">
          <img src="./images/member/member.png" alt="member"/>
          <figcaption>Deadline Is Coming @ 2023</figcaption>
        </figure>

        <section class="about-mail">
          <p>Want to get in touch with us?</p>
          <a href="mailto:104082552@student.swin.edu.au">Contact Us</a>
        </section>
      </div>
      </div>
    </main>
    <?php
  // include footer
  include_once "footer.inc";
  ?>
  </body>
</html>
