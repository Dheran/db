<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "laureles-salimbagat_dblinfo";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (mysqli_connect_error()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
    }
?>
