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


	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/2.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Trang chủ</a>
				<span>Khóa học</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- single course section -->
	<section class="single-course spad pb-0">
		<div class="container">
			<div class="course-meta-area">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="course-note">Giá: 300.000 đ</div>
						<h3>Lập trình C#</h3>
						<div class="course-metas">
							<div class="course-meta">
								<div class="course-author">
									<div class="ca-pic set-bg" data-setbg="img/authors/2.jpg"></div>
									<h6>Giảng viên</h6>
									<p>Nguyễn Đắc Thành, <span>Lập trình viên</span></p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Danh mục</h6>
									<p>IT Developer</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Hoc viên</h6>
									<p>120 sinh viên đã đăng ký</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Đánh giá</h6>
									<p>12 Đánh giá <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star is-fade"></i>
									</span></p>
								</div>
							</div>
						</div>
						<div class="price"> </div>
						<a href="#" class="site-btn buy-btn">Đăng ký khóa học</a>
					</div>
				</div>
			</div>
			<img src="img/courses/single.jpg" alt="" class="course-preview">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 course-list">
					<div class="cl-item">
						<h4>Mô tả khóa học</h4>
						<p>Khóa học lập trình C# là một khóa học toàn diện giúp bạn học và làm chủ ngôn ngữ lập trình C#. Với mục tiêu giúp bạn trở thành một lập trình viên chuyên nghiệp trong việc phát triển ứng dụng sử dụng C#, khóa học này cung cấp kiến thức và kỹ năng cần thiết để xây dựng các ứng dụng mạnh mẽ và linh hoạt.</p>
					</div>
					<div class="cl-item">
						<h4>Chi tiết khóa học</h4>
						<p>Trong khóa học, bạn sẽ bắt đầu từ cơ bản của ngôn ngữ C# như cú pháp, biến, kiểu dữ liệu và các cấu trúc điều khiển. Bạn sẽ hiểu cách xây dựng các hàm và lớp, và sử dụng chúng để tổ chức mã nguồn một cách logic và có cấu trúc.
							<br>
							Khóa học sẽ tiếp tục khám phá các khái niệm quan trọng khác như kế thừa, đa hình, giao diện và xử lý ngoại lệ. Bạn sẽ học cách sử dụng các thư viện và framework phổ biến trong lập trình C#, giúp bạn xây dựng ứng dụng thực tế và tối ưu hóa hiệu suất.</p>
					</div>
					<div class="cl-item">
						<h4>Giảng viên</h4>
						<p>Giảng viên đẹp trai và có nhiều kinh nghiệm trong lập trình C#</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- single course section end -->


	<!-- Page -->
	<section class="realated-courses spad">
		<div class="course-warp">
			<h2 class="rc-title">Các khóa học</h2>
			<div class="rc-slider owl-carousel">
				<!-- Khóa học -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/1.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Vẽ tranh</h5>
								<p>Khóa học dạy vẽ tranh</p>
								<div class="students">120 Học Viên</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/1.jpg"></div>
								<p>Leonardo da Vinci, <span>Họa sĩ</span></p>
							</div>
						</div>
					</div>
				<!-- Khóa học -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/2.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Lập trình C#</h5>
								<p>Khóa học ngôn ngữ lập trình C# cơ bản</p>
								<div class="students">120 Học Viên</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/2.jpg"></div>
								<p>Nguyễn Đắc Thành, <span>Lập trình viên</span></p>
							</div>
						</div>
					</div>
				<!-- Khóa học -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/3.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Thiết Kế Đồ Họa</h5>
								<p>Khóa học thiết kế UI/UX</p>
								<div class="students">120 Học Viên</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/3.jpg"></div>
								<p>Trần Thanh Lâm, <span>UI/UX Designer</span></p>
							</div>
						</div>
					</div>
				<!-- Khóa học -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/4.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Blockchain</h5>
								<p>Khóa học về Blockchain</p>
								<div class="students">120 Học Viên</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/4.jpg"></div>
								<p>William Parker, <span>Nhà Phát Triển</span></p>
							</div>
						</div>
					</div>
				<!-- Khóa học -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/5.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Quản lý dự án</h5>
								<p>Khóa học về kỹ năng quản lý</p>
								<div class="students">120 Học Viên</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/5.jpg"></div>
								<p>Nguyễn Đắc Thành, <span>CEO TiGi Shop</span></p>
							</div>
						</div>
					</div>

				<!-- course -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/6.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Truyền thông và Marketing</h5>
								<p>Khóa học về Truyền thông và Marketing</p>
								<div class="students">120 Students</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/6.jpg"></div>
								<p>Huy NL, <span>CEO SChanel</span></p>
							</div>
						</div>
					</div>
				<!-- course -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/7.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Lập trình web</h5>
								<p>Khóa học về lập trình web cơ bản</p>
								<div class="students">120 Students</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/7.jpg"></div>
								<p>Nguyễn Đắc Thành, <span>Lập trình viên</span></p>
							</div>
						</div>
					</div>
				<!-- course -->
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="img/courses/8.jpg">
							<div class="price">Giá: 300.000 đ</div>
						</div>
						<div class="course-info">
							<div class="course-text">
								<h5>Boostrap</h5>
								<p>Khóa học về boostrap</p>
								<div class="students">120 Students</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="img/authors/8.jpg"></div>
								<p>Nguyễn Đắc Thành, <span>Lập trình viên</span></p>
							</div>
						</div>
					</div>
			</div>
		</div>
	</section>
	<!-- Page end -->


	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Tham gia cộng đồng của chúng tôi ngay bây giờ!</h2>
				<p>Hãy biến ước mơ thành hiện thực với những khóa học của chúng tôi.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Đăng ký ngay</a>
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