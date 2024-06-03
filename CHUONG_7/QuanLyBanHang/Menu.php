<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
        }

        nav {
            background-color: #333;
            border-bottom: 2px solid #222;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .menu a {
            display: inline-block;
            padding: 20px 30px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .meunu a:hover {
            background-color: #555;
        }

        /* Dropdown Menu */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content li {
            display: block;
        }

        .dropdown-content li a {
            padding: 10px 2px;
            color: white;
            text-decoration: none;
            display: block;
        }

        .dropdown-content li a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>
</head>

<body>
    <nav class="menu">
        <ul>
            <li><a href="Home.php">Trang chủ</a></li>
            <li class="dropdown">
                <a>Danh mục</a>
                <ul class="dropdown-content">
                    <li><a href="HangHoa.php">Hàng hóa</a></li>
                    <li><a href="KhachHang.php">Khách hàng</a></li>
                    <li><a href="NhaSanXuat.php">Nhà sản xuất</a></li>
                </ul>
            </li>
            <li><a onclick="Logoff()">Đăng xuất</a></li>
        </ul>
    </nav>
</body>

</html>
<script language="Javascript">
    function Logoff() {
        var result = confirm("Bạn có chắc chắn muốn đăng xuất?");
        // Nếu người dùng chọn "OK"
        if (result) {
            window.location.href = "Login.php";
        }
    }

    function MenuItem(index) {
        // Lấy danh sách tất cả các mục menu
        var menuItems = document.querySelectorAll('.menu ul li');

        // Loại bỏ lớp "active" từ tất cả các mục menu
        menuItems.forEach(function(item) {
            item.classList.remove('dropdown');
        });

        // Thêm lớp "active" cho mục được chọn
        menuItems[index].classList.add('dropdown');
    }
</script>