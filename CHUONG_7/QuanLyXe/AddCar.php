<?php
// Kết nối đến cơ sở dữ liệu (sử dụng thông tin kết nối của bạn)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QuanLyXe";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "hihi";

// Thêm dữ liệu vào bảng
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $maxe = $_POST["maxe"];
        $tenxe = $_POST["tenxe"];
        $capso = $_POST["capso"];
        $maloaixe = $_POST["maloaixe"];
        $hangsx = $_POST["hangsx"];
        $thongtinxe = $_POST["thongtinxe"];

    $sql = "INSERT INTO Xe (`MaXe`, `TenXe`, `CapSo`, `MaLX`, `HangSX`, `ThongTinXe`) 
            VALUES ('$maxe', '$tenxe', '$capso', '$maloaixe', '$hangsx', '$thongtinxe')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>