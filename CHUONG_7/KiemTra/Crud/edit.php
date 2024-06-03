<?php
include("./db_conn.php");

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Fetch current details of the student
    $sql = "SELECT * FROM `students` WHERE `student_id` = '$studentId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Failed to retrieve student details: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Sinh Viên</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2>Sửa Thông Tin Sinh Viên</h2>
        <form action="update_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
            <div class="mb-3">
                <label for="maSinhVien" class="form-label">Mã sinh viên</label>
                <input type="text" class="form-control" id="maSinhVien" name="maSinhVien" value="<?php echo $student['student_id']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="tenSinhVien" class="form-label">Tên sinh viên</label>
                <input type="text" class="form-control" id="tenSinhVien" name="tenSinhVien" value="<?php echo $student['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày sinh</label>
                <input type="text" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo $student['birthdate']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="loaiTaiKhoan" class="form-label">Loại tài khoản</label>
                <input type="number" class="form-control" id="loaiTaiKhoan" name="loaiTaiKhoan" value="<?php echo $student['user_id']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nganhHoc" class="form-label">Ngành học</label>
                <input type="text" class="form-control" id="nganhHoc" name="nganhHoc" value="<?php echo $student['major']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="gioiTinh" class="form-label">Giới tính</label>
                <input type="text" class="form-control" id="gioiTinh" name="gioiTinh" value="<?php echo $student['gender']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
