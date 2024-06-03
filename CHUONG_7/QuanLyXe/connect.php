<?php
$servername = "localhost";
$database = "QuanLyXe";
$username = "root";
$password = "";

//tạo kết nối đến csdl
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Không kết nối được csdl" . $conn->connect_error);
}
