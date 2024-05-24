<?php 
	session_start();
	ob_start();
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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Trang chủ</a>
				<span>Các khóa học</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<div class="container mb-10" style="margin-top:94px;" id="khohang-card">

		<div class="row">
			<div class="col-md-10">
				<h2>Danh sách các khóa học</h2>
				<p>Số lượng khóa học đã bán </p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Khóa Học</th>
							<th>Giá Tiền</th>
							<th>Thời Lượng (giờ)</th>
							<th>Số Lượng Đã Bán</th>
							<th>Loại Khóa Học</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include ("connect.php");

						// Câu lệnh SQL lấy tất cả các thuộc tính
						$sql = "SELECT MaKhoaHoc, TenKhoaHoc, GiaTien, ThoiLuong, SLDaBan, LoaiKhoaHoc FROM khoa_hoc";
						$cnt_stt = 1;
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo ' <tr>
                    			<td>' . $cnt_stt++ . '</td>
                    			<td>' . $row['TenKhoaHoc'] . '</td>
                    			<td>' . number_format($row['GiaTien'], 0, ',', '.') . ' VND</td>
                    			<td>' . $row['ThoiLuong'] . '</td>
                    			<td>' . $row['SLDaBan'] . '</td>
                    			<td>' . $row['LoaiKhoaHoc'] . '</td>
                				</tr>';
							
							}
						} else {
							echo '<tr><td colspan="7">Không có dữ liệu</td></tr>';
						}
						?>
					</tbody>
				</table>


			


		</div>


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