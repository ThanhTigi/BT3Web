<?php
// Kết nối đến cơ sở dữ liệu
include("connect.php");

// Truy vấn để lấy mã khóa học lớn nhất hiện có
$sql = "SELECT MAX(RIGHT(MaKhoaHoc, 3)) AS MaxID FROM khoa_hoc";

// Thực thi truy vấn
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$maxID = $row['MaxID'];

// Tạo mã khóa học mới
if ($maxID === null) {
    $newID = "KH001";
} else {
    $newID = "KH" . sprintf('%03d', intval($maxID) + 1);
}

// Sử dụng mã khóa học mới để thêm bản ghi vào cơ sở dữ liệu
// Ví dụ:
$tenkhoahoc = $_POST['tenkhoahoc'];
$giatien = $_POST['giatien'];
$thoiluong = $_POST['thoiluong'];
$loaikhoahoc = $_POST['loaikhoahoc'];

// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng khoa_hoc
$sql_insert = "INSERT INTO khoa_hoc (MaKhoaHoc, TenKhoaHoc, GiaTien, ThoiLuong, LoaiKhoaHoc) VALUES (?, ?, ?, ?, ?)";

// Sử dụng câu lệnh chuẩn bị (prepared statement) để bảo vệ chống SQL Injection
$stmt = $conn->prepare($sql_insert);

// Gắn các giá trị vào câu lệnh SQL
$stmt->bind_param("ssdis", $newID, $tenkhoahoc, $giatien, $thoiluong, $loaikhoahoc);

// Thực thi câu lệnh SQL
if ($stmt->execute()) {
    // Nếu thêm thành công, thông báo và chuyển hướng về trang courses.php
    echo '<script>
    alert("Thêm khóa học thành công");
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

?>