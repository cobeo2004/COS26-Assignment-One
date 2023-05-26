<!--
filename: settings.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Handling functions and informations for accessing database, creating table and
-->


<?php
    $host_name = "feenix-mariadb.swin.edu.au";
    $user_name = "s103819212";
    $password = "281204";
    $database = "s103819212_db";
    $table = "eoi";
    $connection = @mysqli_connect($host_name, $user_name, $password, $database);
?>


