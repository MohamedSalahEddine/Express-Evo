<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "express_evo";

    // $servername = "localhost";
    // $user = "u320355773_root";
    // $password = "yQ&4e3BemWI";
    // $dbname = "u320355773_evo";

    $conn = new mysqli($servername, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>