<?php
$mahang = $_GET['mahang'];

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

$sql = "DELETE FROM `hanghoa` WHERE `MaHang` = '$mahang'";

// Thực hiện truy vấn
$result = $conn->query($sql);

if ($result === false) {
    echo "<script Language = 'Javascript'>";
    echo "alert('Mã hàng ".$mahang." đã được tham chiếu, không thể xóa!');";
    echo "window.location.href = 'http://localhost/php/QuanLyBanHang/HangHoa.php'";
    echo "</script>";
} 
else {
    echo "<script Language = 'Javascript'>";
    echo"alert('Xóa thành công');";
    echo "window.location.href = 'http://localhost/php/QuanLyBanHang/HangHoa.php'";
    echo "</script>";
}
