<!--
filename: log_out.php
authors: Xuan Tuan Minh Nguyen, Nathan Wijaya, Mai An Nguyen, Nhat Minh Tran, Amiru Manthrige
created: 21-Mar-2023
description: Logout backend handler and redirect to login page
-->

<?php
    session_start();
    session_unset();
    session_destroy();

    header("location: loginmanager.php");
?>
