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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/3.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Trang chủ</a>
				<span>Blogs</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Page  -->
	<section class="blog-page spad pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<!-- blog post -->
					<div class="blog-post">
						<img src="img/blog/1.jpg" alt="">
						<h3>Làm thế nào để tạo ra một bản sơ yếu lý lịch hoàn hảo</h3>
						<div class="blog-metas">
							<div class="blog-meta author">
								<div class="post-author set-bg" data-setbg="img/authors/1.jpg"></div>
								<a href="#">Nguyễn Đắc Thành</a>
							</div>
							<div class="blog-meta">
								<a href="#">Lập trình viên</a>
							</div>
							<div class="blog-meta">
								<a href="#">12 Tháng 10, 2023</a>
							</div>
							<div class="blog-meta">
								<a href="#">2 Bình luận</a>
							</div>
						</div>
						<p>Làm thế nào để tạo ra một bản sơ yếu lý lịch hoàn hảo? Một bản sơ yếu lý lịch hoàn hảo cần được chăm chỉ và cẩn thận chuẩn bị. Bắt đầu bằng việc cung cấp thông tin cá nhân chính xác, bao gồm tóm tắt kinh nghiệm, học vấn và kỹ năng. Đảm bảo sơ yếu lý lịch của bạn trình bày rõ ràng, có cấu trúc và chứa các mục tiêu sự nghiệp. Hãy chú ý đến ngôn ngữ và cách trình bày, đồng thời kiểm tra lỗi chính tả và ngữ pháp. </p>
						<a href="#" class="site-btn readmore">Đọc thêm</a>
					</div>
					<!-- blog post -->
					<div class="blog-post">
						<img src="img/blog/2.jpg" alt="">
						<h3>5 mẹo kiếm tiền tại nhà</h3>
						<div class="blog-metas">
							<div class="blog-meta author">
								<div class="post-author set-bg" data-setbg="img/authors/2.jpg"></div>
								<a href="#">Nguyễn Đắc Thành</a>
							</div>
							<div class="blog-meta">
								<a href="#">Lập trình viên</a>
							</div>
							<div class="blog-meta">
								<a href="#">16 Tháng 8, 2023</a>
							</div>
							<div class="blog-meta">
								<a href="#">4 Bình luận</a>
							</div>
						</div>
						<p>Bạn đang tìm cách kiếm tiền tại nhà? Hãy thử áp dụng 5 mẹo sau đây. 1. Bán hàng trực tuyến: Tận dụng các nền tảng thương mại điện tử để bán sản phẩm của bạn. 2. Dịch thuật và biên tập: Nếu bạn có khả năng sử dụng ngôn ngữ ngoại, hãy cân nhắc làm dịch thuật và biên tập. 3. Tiếp thị liên kết: Tạo ra nội dung và quảng cáo sản phẩm của người khác để nhận hoa hồng. 4. Dạy học trực tuyến: Chia sẻ kiến thức của bạn thông qua các khóa học trực tuyến. 5. Viết lách và biên tập: Nếu bạn có khả năng viết tốt, hãy tìm kiếm công việc viết lách và biên tập từ xa. </p>
						<a href="#" class="site-btn readmore">Đọc thêm</a>
					</div>
					<!-- blog post -->
					<div class="blog-post">
						<img src="img/blog/3.jpg" alt="">
						<h3>Tại sao nên chọn khóa học trực tuyến?</h3>
						<div class="blog-metas">
							<div class="blog-meta author">
								<div class="post-author set-bg" data-setbg="img/authors/3.jpg"></div>
								<a href="#">Nguyễn Đắc Thành</a>
							</div>
							<div class="blog-meta">
								<a href="#">Lập trình viên</a>
							</div>
							<div class="blog-meta">
								<a href="#">24 Tháng 2, 2023</a>
							</div>
							<div class="blog-meta">
								<a href="#">12 Bình luận</a>
							</div>
						</div>
						<p>Khóa học trực tuyến ngày càng trở thành lựa chọn phổ biến cho việc học tập. Vì sao nên chọn khóa học trực tuyến? Đầu tiên, nó linh hoạt và tiện lợi, cho phép bạn tự điều chỉnh thời gian và không gian học. Thứ hai, có sự đa dạng về chủ đề và nguồn tài liệu. Cuối cùng, khóa học trực tuyến thường có giá trị kinh tế hơn so với hình thức truyền thống. Bằng cách này, bạn có thể tiếp cận kiến thức và phát triển bản thân một cách hiệu quả.</p>
						<a href="#" class="site-btn readmore">Đọc thêm</a>
					</div>
					<div class="site-pagination">
						<span class="active">01.</span>
						<a href="#">02.</a>
						<a href="#">03</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-5 col-sm-9 sidebar">
					<div class="sb-widget-item">
						<h4 class="sb-w-title">Danh mục</h4>
						<ul>
							<li><a href="#">IT Deverloper</a></li>
							<li><a href="#">Truyền thông</a></li>
							<li><a href="#">Tài chính</a></li>
							<li><a href="#">Thiết kế</a></li>
						</ul>
					</div>
					<div class="sb-widget-item">
						<h4 class="sb-w-title">Thời gian</h4>
						<ul>
							<li><a href="#">Tháng 12, 2023</a></li>
							<li><a href="#">Tháng 1, 2024</a></li>
							<li><a href="#">Tháng 2, 2024</a></li>
							<li><a href="#">Tháng 3, 2024</a></li>
							<li><a href="#">Tháng 4, 2024</a></li>
						</ul>
					</div>
				
					<div class="sb-widget-item">
						<div class="add">
							<a href="#"><img src="img/add.jpg" alt=""></a>
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