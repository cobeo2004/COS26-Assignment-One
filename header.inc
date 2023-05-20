  <!-- Header -->
  <header>
    <nav id="header-nav">
      <div class="logo">
        <a href="index.php">
          <img src="images/logo-removebg-preview.png" alt="CloudLabs logo" width="80" height="80" /></a>
      </div>
      <ul>
        <!-- Highlight selected page based on $activePage variable -->
        <li><a href="./index.php" <?php
        if ($activePage == 'home') {
            echo 'id="selected-page"';}?>>Home</a></li>
        <li><a href="./jobs.php" <?php
        if ($activePage == 'jobs') {
            echo 'id="selected-page"';}?>>Jobs</a></li>
        <li <?php
        if ($activePage == 'apply') {
            echo 'id="selected-page"';}?>><a href="./apply.php">Apply</a></li>
        <li><a href="./about.php" <?php
        if ($activePage == 'about') {
            echo 'id="selected-page"';}?>>About</a></li>
      </ul>
    </nav>
  </header>