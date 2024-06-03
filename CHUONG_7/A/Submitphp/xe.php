<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="FormTable.css">
</head>

<body>
    <form method="get">
        <h1>Quản lý xe</h1>
        <div>
            <label for="maxe">Mã xe:</label>
            <input type="text" name="maxe" id="maxe" required>
        </div>
        <div>
            <label for="tenxe">Tên xe:</label>
            <input type="text" name="tenxe" id="tenxe">
        </div>
        <div>
            <input type="radio" name="capso" id="tudong" value="tudong" checked>Tự động
            <input type="radio" name="capso" id="sosang" value="sosang">Số sàng
        </div>
        <div>
            <label for="malx">Mã loại xe:</label>
            <select name="malx" id="malx">
                <?php
                //Load dữ liệu vào select
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "quanlyxe";
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT malx,tenlx FROM `loaixe`";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['malx'] . "' selected>" . $row['malx'] . " </option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="hangsx">Hãng sản xuất:</label>
            <input type="text" name="hangsx" id="hangsx">
        </div>
        <div>
            <label for="thongtinxe">Thông tin:</label>
            <input type="text" name="thongtinxe" id="thongtinxe">
        </div>
        <div>
            <input type="submit" value="Thêm" name="them">
            <input type="submit" value="Sửa" name="sua">
            <input type="submit" value="Xóa" name="xoa">
        </div>
    </form>
    <table>
        <tr>
            <th>Mã xe</th>
            <th>Tên xe</th>
            <th>Cấp số</th>
            <th>Mã loại xe</th>
            <th>Hãng sản xuất</th>
            <th>Thông tin</th>
        </tr>
        <?php
        //Load dữ liệu vào bảng
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanlyxe";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM `xe`";
        $result = $conn->query($sql); {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                <td>" . $row['MaXe'] . "</td>
                <td>" . $row['TenXe'] . "</td>
                <td>" . $row['CapSo'] . "</td>
                <td>" . $row['MaLX'] . "</td>
                <td>" . $row['HangSX'] . "</td>
                <td>" . $row['ThongTinXe'] . "</td>
                </td>";
            }
            echo "</table>";
        }

        //Thêm
        if (isset($_GET["them"])) {
            $maxe = $_GET["maxe"];
            $tenxe = $_GET["tenxe"];
            $capso = $_GET["capso"];
            $malx = $_GET["malx"];
            $hangsx = $_GET["hangsx"];
            $thongtinxe = $_GET["thongtinxe"];

            $sql = "INSERT INTO `xe`(`MaXe`, `TenXe`, `CapSo`, `MaLX`, `HangSX`, `ThongTinXe`) VALUES ('$maxe', '$tenxe', '$capso', '$malx', '$hangsx', '$thongtinxe')";
            $result = $conn->query($sql);

            if ($result === true) {
                echo "<script>
                        window.location.reload();
                        alert('Thêm thành công');
                        </script>";
            }
        }

        //Xóa
        else if(isset($_GET["xoa"]))
        {
            $maxe = $_GET["maxe"];
            $sql = "DELETE FROM `xe` WHERE `maxe` = '$maxe'";
            $result = $conn->query($sql);

            if ($result === true) 
            {
                echo "<script>
                        alert('Xóa thành công');
                        </script>";
            }
        }
        ?>
</body>

</html>