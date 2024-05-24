<?php
session_start();
ob_start();
include "user.php"; // Giả sử tập tin này chứa thông tin kết nối cơ sở dữ liệu

if (isset($_POST["dangky"]) && $_POST["dangky"]) {
    $user = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $date = $_POST['date'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];

    // Kiểm tra thông tin thiếu
    if (empty($user) || empty($fullname) || empty($email) || empty($sdt) || empty($date) || empty($pass) || empty($repass)) {
        echo "Vui lòng điền đầy đủ thông tin.";
    } else {
        // Kiểm tra mật khẩu có khớp không
        if ($pass !== $repass) {
            echo "Mật khẩu không khớp.";
        } else {
            try {
                // Kết nối cơ sở dữ liệu
                $conn = connectdb();

                // Kiểm tra xem username đã tồn tại hay chưa
                $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM khach_hang WHERE Username = ?");
                $stmt->bindValue(1, $user, PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['count'] > 0) {
                    echo "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
                } else {
                    // Mã hóa mật khẩu trước khi lưu trữ
                    $hashed_pass = $pass;

                    // Tạo MaKhachHang tự động tăng
                    $result = $conn->query("SELECT COUNT(*) AS count FROM khach_hang");
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $count = $row['count'] + 1;
                    $MaKhachHang = 'KH' . str_pad($count, 3, '0', STR_PAD_LEFT);

                    // Chèn dữ liệu vào bảng khach_hang
                    $sql = "INSERT INTO khach_hang (MaKhachHang, Username, TenKhachHang, NgaySinh, SDT, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(1, $MaKhachHang, PDO::PARAM_STR);
                    $stmt->bindValue(2, $user, PDO::PARAM_STR);
                    $stmt->bindValue(3, $fullname, PDO::PARAM_STR);
                    $stmt->bindValue(4, $date, PDO::PARAM_STR);
                    $stmt->bindValue(5, $sdt, PDO::PARAM_STR);
                    $stmt->bindValue(6, $email, PDO::PARAM_STR);
                    $stmt->bindValue(7, $hashed_pass, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        echo "Đăng ký thành công!";
                        $_SESSION['signupsuccess'] = true;
                        header("location: signin.php");
                        exit(); // Đảm bảo script dừng sau khi chuyển hướng
                    } else {
                        echo "Lỗi: " . $stmt->errorInfo()[2];
                    }
                }
            } catch (PDOException $e) {
                echo "Lỗi kết nối: " . $e->getMessage();
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>WebUni - Education</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i"
		rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/style.css" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'headersection.php'; ?>

    <!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 spad pb-0">
                    <h2 class="text-frame mt-5 mb-3 text-center text-white">Đăng ký tài khoản</h2>
                    <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                        <div class="form-group">
                            <label for="username" class="text-white">Tên đăng nhập</label>
                            <input name = "username" type ="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-white">Họ và tên</label>
                            <input name = "fullname" type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="text-white">Ngày sinh</label>
                            <input name = "date" type="date" class="form-control" id="birthday">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email</label>
                            <input name = "email" type="email" class="form-control " id="email" placeholder="Nhập địa chỉ email">
                        </div>
						<div class="form-group">
                            <label for="sdt" class="text-white">Số điện thoại</label>
                            <input name = "sdt" type="sdt" class="form-control " id="sdt" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Mật khẩu</label>
                            <input name = "password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="text-white">Xác nhận mật khẩu</label>
                            <input name = "repassword" type="password" class="form-control" id="confirm-password" placeholder="Xác nhận mật khẩu">
                        </div>
						<input class="site-btn" type = "submit" name = "dangky" value = "Đăng ký"></input>
                        
                    </form>
                    <p class="text-center mt-3">Bạn đã có tài khoản? <a href="signin.php">Đăng nhập</a></p>
                </div>
            </div>
        </div>
	</section>
	<!-- Hero section end -->

	<?php include 'footersection.php'; ?>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

</html>