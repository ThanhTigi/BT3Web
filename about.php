<?php 
	session_start();
	ob_start();
	if (!isset($_SESSION['user_data'])){
		header('location: signin.php');
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
	<section class="hero-section set-bg" data-setbg="img/bgg.jpg">

	</section>
	<!-- Hero section end -->


	<!-- Page -->
	<section class="contact-page spad pb-0">
		<section class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<h2>Giới thiệu về chúng tôi</h2>
					<p>WebUni - Education là nền tảng giáo dục trực tuyến cung cấp những khóa học chất lượng với nội dung
						phong phú và giảng viên chuyên nghiệp. Chúng tôi cam kết mang đến cho bạn những kiến thức và kỹ năng
						cần thiết để nâng cao sự nghiệp và thành công trong cuộc sống.</p>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<h2>Tại sao chọn chúng tôi</h2>
					<ul>
						<li>Đội ngũ giảng viên chất lượng</li>
						<li>Khóa học đa dạng và phong phú</li>
						<li>Học tập linh hoạt theo lịch của bạn</li>
						<li>Hỗ trợ và tương tác trong quá trình học</li>
						<li>Chứng chỉ hoàn thành khóa học</li>
					</ul>
				</div>
			</div>
		</section>
		</div>
	</section>

	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Tham gia cộng đồng của chúng tôi ngay bây giờ!</h2>
				<p>Hãy biến ước mơ thành hiện thực với những khóa học của chúng tôi.</p>
			</div>
			<div class="text-center pt-5">
				<a href="signup.php" class="site-btn">Đăng ký ngay</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->
	

	<?php include 'footersection.php'; ?>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

</html>