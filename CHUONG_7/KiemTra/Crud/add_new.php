<?php   
    include("./db_conn.php");
    try {
        if (isset($_POST["insert"])) {
            $maSv = $_POST['maSinhVien'];
            $tenSv = $_POST['tenSinhVien'];
            $ngaySinh = $_POST['ngaySinh'];
            $loaiTk = (int)$_POST['loaiTaiKhoan'];
            $nganhHoc = $_POST['nganhHoc'];
            $gioiTinh = $_POST['gioiTinh'];
            $sql = "INSERT INTO `students`(`student_id`, `name`, `birthdate`, `user_id`, `major`, `gender`) 
                        VALUES ('$maSv','$tenSv','$ngaySinh','$loaiTk','$nganhHoc','$gioiTinh')";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                header("Location: showdata.php?msg=Thêm thành công");
            } else {
                echo "Falied" . mysqli_error( $conn );
            }
    
        }
    } catch (Exception) {
        echo"không thể thêm vui lòng kiểm tra lại thông tin";
    }

