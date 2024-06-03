<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="HangHoa.css">
    <style>
        h2 {
            margin-top: 20px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    require "Menu.php";
    require "db.php";
    ?>
    <form action="" method="GET">
        <h1>Thêm hàng hóa</h1>
        <div>
            <label for="mahang">Mã hàng:</label>
            <input type='text' id='mahang' name='mahang' required>
        </div>
        <div>
            <label for="tenhang">Tên hàng:</label>
            <input type='text' id='tenhang' name='tenhang' required>
        </div>
        <div>
            <label for="mansx">Tên nhà sản xuất:</label>
            <select name="mansx" id="mansx">
                <?php
                $sql = "SELECT MaNSX,TenNSX FROM `NhaSanXuat`";
                $result = executeQuery($sql);
                $mansx = $value["MaNSX"];
                while ($row = mysqli_fetch_array($result)) {
                    if ($mansx == $row["MaNSX"]) {
                        echo "<option value='" . $row['MaNSX'] . "' selected>" . $row['TenNSX'] . " </option>";
                    } else {
                        echo "<option value='" . $row['MaNSX'] . "'>" . $row['TenNSX'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="namsx">Năm sản xuất:</label>
            <input type='text' id='namsx' name='namsx' required>
        </div>
        <div>
            <label for="gia">Giá:</label>
            <input type='text' id='gia' name='gia' required>
        </div>
        <div>
            <input type="submit" name="btnadd" value="Lưu">
        </div>
        <?php
        if (isset($_GET["btnadd"])) {
            $mahang = $_GET["mahang"];
            $tenhang = $_GET["tenhang"];
            $mansx = $_GET["mansx"];
            $namsx = $_GET["namsx"];
            $gia = $_GET["gia"];

            $sql = "INSERT INTO `hanghoa`(`MaHang`, `TenHang`, `MaNSX`, `NamSX`, `Gia`) VALUES ('$mahang', '$tenhang', '$mansx', '$namsx', $gia)";
            $result = Handle($sql);
            if ($result === false) {
                echo "<h2>Mã " . $mahang . " đã tồn tại</h2>";
            } else {
                echo "<h2>Thêm thành công mã " . $mahang . " </h2>";
            }
        }
        ?>
    </form>
</body>

</html>