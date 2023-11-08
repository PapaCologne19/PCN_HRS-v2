<?php
ini_set('default_charset', 'utf-8');
    $db_user = "root";
    $db_password = "";
    $db_host = "localhost";
    $db_database = "pcnhrs";

    $link = mysqli_connect($db_host, $db_user, $db_password, $db_database) or die("Connection Failure");

    // Check connection
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Set the character set to UTF-8
    mysqli_set_charset($link, "utf8");

    // Rest of your code
