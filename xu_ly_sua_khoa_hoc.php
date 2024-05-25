<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['makhoahoc']) && isset($_POST['giatien']) && isset($_POST['thoiluong'])) {
    $id = $_POST['makhoahoc'];
    $giatien = $_POST['giatien'];
    $thoiluong = $_POST['thoiluong'];

    // Sử dụng câu lệnh chuẩn bị (prepared statement) để bảo vệ chống SQL Injection
    $stmt = $conn->prepare('UPDATE khoa_hoc 
    SET GiaTien = ?, ThoiLuong = ?
    WHERE MaKhoaHoc = ?');

    // Kiểm tra lỗi khi chuẩn bị câu lệnh
    if (!$stmt) {
        die('Có lỗi xảy ra: ' . $conn->error);
    }

    // Ràng buộc tham số với câu lệnh
    $stmt->bind_param('dis', $giatien, $thoiluong, $id);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        // Nếu cần thêm logic insert vào bảng tblphieunhap, hãy thêm ở đây

        echo '<script>
        alert("Cập nhật sản phẩm thành công");
        window.location.href = "courses.php";
        </script>';
        exit(); // Đảm bảo script dừng lại sau khi chuyển hướng
    } else {
        echo '<script>alert("Có lỗi xảy ra: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
}
$conn->close();
?>
