<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
        }

        h1 {
            font-size: 50px;
            margin-bottom: 20px;
            color: brown;
            margin-top: 20px
        }

        /* Định dạng cơ bản cho biểu mẫu */
        form {
            max-width: 800px;
            margin: 30px auto;
            background-color: #f2f2f2;
            padding: 50px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0px;
            text-align: center;
        }

        /* Định dạng các phần tử trong biểu mẫu */
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* table */
        table {
            width: 100%;
            border-collapse: collapse;
            /*gộp các đường viền*/
            border-spacing: 0;
            margin-bottom: 20px;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }

        /* Định dạng các dòng chẵn của bảng */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background-color: #cce5ff;
        }

        #mahang{
            background-color: #ccc;
        }
        
    </style>
</head>

<body>
    <?php
    require "Menu.php";
    require 'db.php';
    $mahang = $_GET['mahang'];
    $sql = "SELECT * FROM `hanghoa` WHERE `MaHang` = '$mahang'";
    $result = executeQuery($sql);
    $value = mysqli_fetch_array($result); //Lấy kết quả theo hàng
    ?>
    <form action="" method="get">
        <h1>Edit hàng hóa</h1>
        <div>
            <label for="mahang">Mã hàng:</label>
            <?php
            echo "<input type='text' id='mahang' name='mahang' required readonly value='" . $value['MaHang'] . "'>"
            ?>
        </div>
        <div>
            <label for="tenhang">Tên hàng:</label>
            <?php
            echo "<input type='text' id='tenhang' name='tenhang' required value='" . $value['TenHang'] . "'>"
            ?>
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
            <?php
            echo "<input type='text' id='namsx' name='namsx' required value='" . $value['NamSX'] . "'>"
            ?>
        </div>
        <div>
            <label for="gia">Giá:</label>
            <?php
            echo "<input type='text' id='gia' name='gia' required value='" . $value['Gia'] . "'>"
            ?>
        </div>
        <div>
            <input type="submit" name="btnupdate" value="Sửa">
            <input type="submit" name="btndelete" value="Xóa">
        </div>
    </form>
    <?php
    //Sửa
    if (isset($_GET["btnupdate"])) {

        $mahang = $_GET["mahang"];
        $tenhang = $_GET["tenhang"];
        $mansx = $_GET["mansx"];
        $namsx = $_GET["namsx"];
        $gia = $_GET["gia"];

        $sql = "UPDATE `HangHoa` SET `TenHang` = '$tenhang', `MaNSX` = '$mansx', `NamSX` = '$namsx', `Gia` = '$gia' WHERE `MaHang` = '$mahang'";
        $result = Handle($sql);
        if ($result === false) {
            echo "Không thể thay đổi mã hàng";
        } else {
            echo "<script Language = 'Javascript'>";
            echo"alert('Sửa thành công');";
            echo "window.location.href = 'http://localhost/php/QuanLyBanHang/HangHoa.php'";
            echo "</script>";
        }
    }
    
    //Xóa
    if(isset($_GET["btndelete"])) {
        $mahang = $_GET["mahang"];
        require "DeleteHangHoa.php";
    }
    ?>
</body>
</html>
