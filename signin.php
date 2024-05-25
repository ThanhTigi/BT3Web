<?php
session_start();
ob_start();
include ("user.php");
if (isset($_SESSION["signupsuccess"]) && $_SESSION['signupsuccess']) {
	echo 'Đăng ký thành công';
	unset($_SESSION["signupsuccess"]);
}
if (isset($_POST["dangnhap"]) && $_POST["dangnhap"]) {


	$user = $_POST['username'];
	$pass = $_POST['password'];
	$user_data = checkUser($user, $pass);
	if ($user_data) {
		$_SESSION['user_data'] = $user_data;
		if ($user_data['role'] == 1) {
			header('location: index.php');
		} else {
			header('location: home.php');
		}
	} else {
		echo 'Tài khoản hoặc mật khẩu không đúng';
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
			<div class="hero-text text-white">
				<h2>Đăng nhập</h2>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input name="username" type="username" style="height: 60px; width: 350px"
							placeholder="Nhập tên đăng nhập">
						<input name="password" type="password" style="height: 60px; width: 350px"
							placeholder="Nhập mật khẩu">
						<input class="site-btn" type="submit" name="dangnhap" value="Đăng nhập"></input>
					</form>
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