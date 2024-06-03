<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        input[type="button"] {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: chartreuse;
        }

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
            margin-top: 20px;
            text-align: center;
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
            padding: 15px;
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
            background-color: #ddd;
        }

        .groupa {
            background-color: #4CAF50;
            border-radius: 10px;
            border: none;
            padding: 10px 20px;
            display: inline-block;
            color: white;
            text-decoration: none;

        }

        .icon-trash {
            font-size: 24px;
            /* Kích thước icon */
            color: blue;
            /* Màu đỏ */
            background-color: none;
            cursor: pointer;
            /* Con trỏ khi di chuột qua */
        }

        .icon-trash:hover {
            opacity: 0.8;
            /* Độ trong suốt khi di chuột qua */
        }

        .btn {
            padding: 6px 8px;
            margin-right: 2px;
            border: 1px solid #CCCCCC;
            background-color: none;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .btn-delete {
            color: red;
        }

        .btn-edit {
            color: black;
        }

        .groupa {
            text-decoration: none;
            color: #f2f2f2;
            background-color: #007bff;
            margin: 20px;
        }

        .groupa:hover {
            color: aqua;
        }

        .txtseach {
            margin-left: 5%;
            width: 300px;
        }

        .seach {
            background-color: rgb(14, 54, 99);
            padding: 9px;
            border-radius: 5px;
            color: whitesmoke;
            cursor: pointer;
        }

        input[type="text"] {
            border-radius: 8px;
            font-size: 20px;
            padding: 8px;
        }

        .container-seach{
            width: 40%;
            display: inline-block;
        }

        .sort{
            background-color: black;
        }

        button[type="submit"]
        {
            cursor: ;
        }

    </style>
</head>

<body>
    <?php require "Menu.php"; ?>
    <div class="container">
    <h1 style="margin-top: 20px">Quản lý hàng hóa</h1>
    <form action="" method="GET">
        <div>
            <a class='groupa' href='AddHangHoa.php'>Thêm</a>
            <div class="container-seach">
                <input type="text" id="seachmahang" name="seachmahang" class="txtseach" placeholder="Tìm kiếm theo mã hàng">
                <input type="submit" name="mahang" class="seach" value="Tìm kiếm">
            </div>
            <div class="container-seach">
                <input type="text" id="seachtenhang" name="seachtenhang" class="txtseach" placeholder="Tìm kiếm theo tên hàng">
                <input type="submit" name="tenhang" class="seach" value="Tìm kiếm">
            </div>
    <?php
    require "db.php";
    echo "<table>";
    echo "<tr>
    <th>Mã hàng</th>
    <th>Tên hàng</th>
    <th>Mã nhà sản xuất</th>
    <th>Năm sản xuất</th>
    <th>Giá <button type='submit' name='sort' class='submit-button'><i class='fa-solid fa-sort'></i></th>
    <th>Edit</th>
    </tr>";
    if (isset($_GET["mahang"]) and $_GET["seachmahang"] != '') {
        $mahang = $_GET["seachmahang"];
        $sql = "SELECT * FROM `hanghoa` WHERE 1 = 1 AND `MaHang` = '$mahang'";
    } elseif (isset($_GET["tenhang"]) and $_GET["seachtenhang"] != '') {
        $tenhang = $_GET["seachtenhang"];
        $sql = "SELECT * FROM `hanghoa` WHERE `TenHang` LIKE '%$tenhang%'";
    }elseif(isset($_GET["sort"])) {
        $sql = "SELECT * FROM hanghoa ORDER BY Gia ASC";
    }
     else {
        $sql = "SELECT `MaHang`, `TenHang`, `MaNSX`, `NamSX`, `Gia` FROM `hanghoa`";
    }
    $result = executeQuery($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
        <td>" . $row['MaHang'] . "</td>
        <td>" . $row['TenHang'] . "</td>
        <td>" . $row['MaNSX'] . "</td>
        <td>" . $row['NamSX'] . "</td>
        <td>" . $row['Gia'] . "</td>
        <td>
        <a href='editHangHoa.php?mahang=" . $row['MaHang'] . "' class='btn btn-edit'><i class='fa-solid fa-pen-to-square'></i></a>
        <a value='" . $row['MaHang'] . "' href='DeleteHangHoa.php?mahang=" . $row['MaHang'] . "' class='btn btn-delete'><i class='fa-solid fa-xmark'></i></a>
        </td>
        </tr>";
    }
    echo "</table>";
    ?>
        </form>
    <div style="padding: 20px 20px 10px 20px; color:aquamarine">Coder: Nguyễn Tiền Lâm</div>
</body>

</html>