<?php
require 'connect.php';

if (isset($_POST['btnadd'])) {
    $maxe = $_POST['maxe'];
    $tenxe = $_POST['tenxe'];
    $capso = $_POST['capso'];
    $maloaixe = $_POST['maloaixe'];
    $hangsx = $_POST['hangsx'];
    $thongtinxe = $_POST['thongtinxe'];

    echo "<pre>";
    print_r($_POST);

    $sql = "INSERT INTO `Xe`(`MaXe`, `TenXe`, `CapSo`, `MaLX`, `HangSX`, `ThongTinXe`) VALUES ('$maxe', '$tenxe', '$capso', '$maloaixe', '$hangsx', '$thongtinxe')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm thành công";
    } else {
        echo "lỗi";
    }
}
