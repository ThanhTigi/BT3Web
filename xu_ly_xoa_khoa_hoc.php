<?php
// Kiểm tra nếu đã nhấn nút Xóa khóa học và có dữ liệu được gửi từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Lấy mã khóa học được chọn từ form
    $id = $_POST['id'];

    // Kết nối đến cơ sở dữ liệu
    include("connect.php");

    // Chuẩn bị câu lệnh SQL để xóa khóa học
    $sql_delete = "DELETE FROM khoa_hoc WHERE MaKhoaHoc = ?";

    // Sử dụng câu lệnh chuẩn bị (prepared statement) để bảo vệ chống SQL Injection
    $stmt = $conn->prepare($sql_delete);

    // Gắn giá trị vào câu lệnh SQL
    $stmt->bind_param("s", $id);

    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        // Nếu xóa thành công, thông báo và chuyển hướng về trang courses.php
        echo '<script>
        alert("Xóa khóa học thành công");
        window.location.href = "courses.php";
        </script>';
        exit(); // Đảm bảo script dừng lại sau khi chuyển hướng
    } else {
        // Nếu có lỗi xảy ra, thông báo lỗi
        echo '<script>alert("Có lỗi xảy ra: ' . $stmt->error . '");</script>';
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
}
?>
