<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .infomation {
            width: 300px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-1 bg-info">
        Quản lý sinh viên
    </nav>
    <div class="container">
        <?php 
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> '. $msg .' </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lable="Close">
                </div>';
            }
        ?>
        <a href="add_new.html" class="btn btn-primary mb-2">Thêm sinh viên</a> 
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Mã sinh viên</th>
                    <th scope="col">Tên sinh viên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Loại tài khoản</th>
                    <th scope="col">Ngành học</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'db_conn.php';
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['student_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['birthdate']}</td>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['major']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>
                                        <a href='edit.php?id={$row['student_id']}' class='link-dark btn btn-info'>Sửa</a>
                                        <a href='delete.php?id={$row['student_id']}' class='link-dark btn btn-danger'>Xóa</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không có sinh viên nào</td></tr>";
                    }

                    mysqli_close($conn);
                ?>
            </tbody>
        </table>       
    </div>
    
<script src="../bootstrap-5.3.3-dist/js/bootstrap.js"></script>    
</body>
</html>
