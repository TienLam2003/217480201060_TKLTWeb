<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    font-size: 20px;
}

form {
    max-width: 700px;
    margin: 20px auto;
    background-color: #fff;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    width: 30%;
}
label:hover{
    color: aqua;
}

input[type="text"] {
    width: calc(100% - 12px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="text"]:focus {
    border-color: blue; /* Thay đổi màu viền khi nhập vào input */
    box-shadow: 0 0 5px blue; /* Hiển thị shadow khi nhập vào input */
    outline: none; /* Loại bỏ đường viền màu khi tập trung vào input */
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    margin-right: 10px;
}

input[type="submit"]:hover {
    background-color: #398615;
}

h1{
    font-size: 50px;
    color: red;
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 30px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 20px;
}
th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #f2f2f2;
    color: #333;
    text-align: center;
}
tr:hover {
    background-color: royalblue;
    cursor: pointer;
}
    </style>
</head>
<body>
    <h1>BẢNG XE</h1>
    <form method="post">
        <div class="group">
            <label for="maxe">Mã Xe:</label>
            <input type="text" id="maxe" name="maxe">
            <label for="tenxe">Tên xe:</label>
            <input type="text" id="tenxe" name="tenxe">
            <label for="capso">Cấp số:</label>
            <input type="radio" id="tudong" name="capso" value="Tự động" checked><span>Tự động</span>
            <input type="radio" id="sosan" name="capso" value="Số sàn"><span>Số sàn</span>
        </div>
        <div class="group">
            <label for="maloaixe">Mã Loại Xe:</label>
            <input type="text" id="maloaixe" name="maloaixe">
            <label for="hangsx">Hãng Sản Xuất:</label>
            <input type="text" id="hangsx" name="hangsx">
            <label for="thongtinxe">Thông Tin Xe:</label>
            <input type="text" id="thongtinxe" name="thongtinxe">
        </div>
        <input type="submit" value="Thêm" name="btnadd">
        <input type="submit" value="Sửa" name="btnupdate">
        <input type="submit" value="Xóa" name="btndelete">
        <input type="submit" value="Tìm kiếm" name="btnseach">
    </form>

    <?php
    //Xuất ra table
    $servername = "localhost";
    $database = "QuanLyXe";
    $username = "root";
    $password = "";

    //tạo kết nối đến csdl
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Không kết nối được csdl" . $conn->connect_error);
    }

    $sql = "SELECT * FROM Xe";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $total_row = mysqli_num_rows($query);
        echo "Số dòng: ".$total_row . "<br>";
    } else {
        echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
    }

    if ($query) {
        echo "<table border='1'>";
        echo "<tr><th>Mã Xe</th><th>Tên Xe</th><th>Cấp số</th><th>Mã loại xe</th><th>Hãng sản xuất</th><th>Thông tin xe</th></tr>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $row['MaXe'] . "</td>";
            echo "<td>" . $row['TenXe'] . "</td>";
            echo "<td>" . $row['CapSo'] . "</td>";
            echo "<td>" . $row['MaLX'] . "</td>";
            echo "<td>" . $row['HangSX'] . "</td>";
            echo "<td>" . $row['ThongTinXe'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
    }

    //Thêm
    if (isset($_POST['btnadd'])) {
        $maxe = $_POST['maxe'];
        $tenxe = $_POST['tenxe'];
        $capso = $_POST['capso'];
        $maloaixe = $_POST['maloaixe'];
        $hangsx = $_POST['hangsx'];
        $thongtinxe = $_POST['thongtinxe'];

        // echo "<pre>";
        // print_r($_POST);

        $sql = "INSERT INTO `Xe`(`MaXe`, `TenXe`, `CapSo`, `MaLX`, `HangSX`, `ThongTinXe`) VALUES ('$maxe', '$tenxe', '$capso', '$maloaixe', '$hangsx', '$thongtinxe')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm thành công";
            header("Location: " . $_SERVER['PHP_SELF']); //load lại trang
            exit();
        } else {
            echo "lỗi";
        }
    }

    //Sửa
    elseif (isset($_POST["btnupdate"])) {
        $maxe = $_POST['maxe'];
        $tenxe = $_POST['tenxe'];
        $capso = $_POST['capso'];
        $maloaixe = $_POST['maloaixe'];
        $hangsx = $_POST['hangsx'];
        $thongtinxe = $_POST['thongtinxe'];
        $sql = "UPDATE `Xe` SET `TenXe`='$tenxe',`CapSo`='$capso',`MaLX`='$maloaixe',`HangSX`='$hangsx',`ThongTinXe`='$thongtinxe' WHERE `MaXe` = '$maxe'";
        if ($conn->query($sql) === TRUE) {
            echo "Sửa thành công";
            // header("Location: " . $_SERVER['PHP_SELF']); //load lại trang
            // exit();
        } else {
            echo "Lỗi";
        }
    }
    //Xóa
    elseif (isset($_POST["btndelete"])) {
        $maxe = $_POST["maxe"];
        $sql = "DELETE FROM `Xe` WHERE `MaXe` = '$maxe'";
        if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); //load lại trang
        exit();
        }
    }
    //Tìm kiếm
    elseif (isset($_POST['btnseach'])) {
        $maxe = $_POST['maxe'];
        $tenxe = $_POST['tenxe'];
        $capso = $_POST['capso'];
        $maloaixe = $_POST['maloaixe'];
        $hangsx = $_POST['hangsx'];
        $thongtinxe = $_POST['thongtinxe'];
        $sql = "SELECT * FROM `Xe` WHERE 1=1 and `MaXe` LIKE '%$maxe%' and `TenXe` LIKE '%$tenxe%'";
        $result = $conn->query($sql);

        // Kiểm tra kết quả truy vấn
        if ($result->num_rows > 0) {
            // Xuất dữ liệu từ cơ sở dữ liệu
            while ($row = $result->fetch_assoc()) {
                echo "Mã xe: " . $row["MaXe"] . " - Tên xe: " . $row["TenXe"] . " - Cấp số: " .$row["CapSo"]." - Mã loại xe: " . $row["MaLX"] . " - Hãng sản xuất: " . $row["HangSX"] . " - Thông tin xe: " .$row["ThongTinXe"]."<br>";
            }
        } else {
            echo "0 results";
        }
    }
    //Đóng kết nối
    mysqli_close($conn);
    ?>
</body>
</html>