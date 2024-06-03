<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .login-container {
      max-width: 500px;
      margin: 100px auto;
      background-color: #fff;
      padding: 50px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-container h1 {
      text-align: center;
      color: brown;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <form method="post" id="login">
      <h1>Đăng nhập</h1>
      <div class="input-group">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name="submit">Đăng nhập</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      require "db.php";
      $username = $_POST["username"];
      $password = $_POST["password"];
      $sql = "SELECT `username`, `password` FROM `login` WHERE `username` = '$username' and `password` = '$password'";
      $result = executeQuery($sql);
      if ($result->num_rows > 0) {
        header('location: http://localhost/php/QuanLyBanHang/HangHoa.php');
        exit;
      } else {
        echo "<script laguage = 'Javascrip'>alert('Tên đăng nhập hoặc tài khoản không chính xác')</script>";
      }
    }

    ?>
  </div>
</body>

</html>