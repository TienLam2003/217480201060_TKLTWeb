<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="FormTable.css">
</head>

<body>
    <form method="post">
    <h1>Đăng nhập</h1>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <input type="submit" name="login" value="Đăng nhập">
        </div>
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlyxe";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `login` WHERE `username` = '$username' and `password` = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            header('location: http://localhost/php/Submitphp/xe.php');
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