<?php

function executeQuery($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "QuanLyBanHang";

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Thực hiện truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và trả về kết quả
    if ($result === false) {
        die("Lỗi truy vấn: " . $conn->error);
    } else {
        return $result;
    }
}

function Handle($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "QuanLyBanHang";

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}