<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "quanlysinhvien";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection Failed" . mysqli_connect_error());
    }

    // echo "Connected successfully";
