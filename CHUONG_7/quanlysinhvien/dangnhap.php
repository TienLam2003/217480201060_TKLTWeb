<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container{
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            text-align: center;
        }

        .dangnhap input[type="text"],
        .dangnhap input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            margin: 10px;
            background-color: blue;
            color: #f2f2f2;
            height: 50px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            width: 90px;
        }

        label{
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Đăng nhập</h1>
        <form action="" method="post">
            <div class="dangnhap">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="username" id="username">
                <br> <br>

            </div>
            <div class="dangnhap">
                <label for="username">Mật khẩu</label>
                <input type="password" name="password" id="password">
                <br> <br>
            </div>
            <div class="dangnhap">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qlsv";
    $conn = new mysqli($servername, $username, $password, $database);

    if(isset($_POST["user"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `user` WHERE `username` = '$username' and `password` = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            header('location: http://localhost/quanlysinhvien/sinhvien.php');
            exit;
        }
        else
        {
            echo "<h1>Thông tin tài khoản hoặc mật khẩu không chính xác</h1>";
        }

    }

    ?>
</body>
</html>