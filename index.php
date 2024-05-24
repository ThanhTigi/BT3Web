<?php
session_start();
ob_start();
include ("user.php");
include ("connect.php");
// Lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT MaKhoaHoc, TenKhoaHoc, GiaTien, ThoiLuong, SLDaBan, LoaiKhoaHoc FROM khoa_hoc";
$result = mysqli_query($conn, $sql);
$sum = 0;
// Mảng kết hợp để lưu trữ số lượng đã bán cho mỗi loại khóa học
$soluongdaban = [];
$soluongkhoahoc = [];
$tilesoluong = [];
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$loaikhoahoc = $row['LoaiKhoaHoc'];
		// Nếu loại khóa học đã tồn tại trong mảng soluongdaban, cập nhật số lượng đã bán
		if (array_key_exists($loaikhoahoc, $soluongdaban)) {
			$soluongdaban[$loaikhoahoc] += $row['SLDaBan'];
		} else {
			// Nếu không, thêm mới loại khóa học vào mảng soluongdaban
			$soluongdaban[$loaikhoahoc] = $row['SLDaBan'];
		}
		if (array_key_exists($loaikhoahoc, $soluongkhoahoc)) {
			$soluongkhoahoc[$loaikhoahoc] += 1;
		} else {
			// Nếu không, thêm mới loại khóa học vào mảng soluongdaban
			$soluongkhoahoc[$loaikhoahoc] = 1;
		}

		$sum += $row['SLDaBan'];
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

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

	<?php
	if (isset($_SESSION['user_data']) && $_SESSION['user_data']) {
		?>
		<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">

		</div>
		<?php
	} else {
		?>
		<section class="hero-section set-bg" data-setbg="img/bg.jpg">
			<div class="container">
				<div class="hero-text text-white">
					<h2>Các khóa học trực tuyến tốt nhất</h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-5">
						<form class="intro-newslatter">
							<a href="signup.php" class="site-btn">Đăng ký ngay</a>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	?>

	<?php
	if (isset($_SESSION['user_data']) && $_SESSION['user_data']) {
		?>
		<div class="container mb-10" style="margin-top:94px;" id="khohang-card">
			<div class="row">
				<div class="col-md-10">
					<h2>Danh sách các khóa học</h2>
					<p>Số lượng khóa học đã bán</p>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>STT</th>
								<th>Loại Khóa Học</th>
								<th>Số lượng Khóa Học</th>
								<th>Số Lượng Đã Bán</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Đếm số thứ tự
							$cnt_stt = 1;

							// Lặp qua mảng soluongdaban để hiển thị thông tin trong bảng
							foreach ($soluongdaban as $loai => $soluong) {
								$tilesoluong[$loai] = $soluong / $sum * 100;
								echo '<tr>
                        <td>' . $cnt_stt++ . '</td>
                        <td>' . $loai . '</td>
						<td>' . $soluongkhoahoc[$loai] . '</td>
                        <td>' . $soluong . '</td>
                    </tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="container" style="width: 100%;">
						<h2 class="text-center">Biểu đồ tỉ lệ loại khóa học đã bán</h2>
						<div class="row justify-content-center">
							<div class="col-md-6">
								<canvas id="myPieChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
		<!-- Custom JS to create the chart -->
		<script>
			// Data for the pie chart
			const data = {
				labels: <?php echo json_encode(array_keys($tilesoluong)); ?>,
				datasets: [{
					label: 'Tỉ lệ loại khóa học đã bán',
					data: <?php echo json_encode(array_values($tilesoluong)); ?>,
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(54, 162, 235)',
						'rgb(255, 205, 86)',
						'rgb(75, 192, 192)',
						'rgb(153, 102, 255)',
						'rgb(255, 159, 64)',
						'rgb(102, 255, 204)',
						'rgb(51, 102, 255)'
					],
					hoverOffset: 4
				}]
			};

			// Configuration for the pie chart
			const config = {
				type: 'pie',
				data: data,
			};

			// Render the pie chart
			const myPieChart = new Chart(
				document.getElementById('myPieChart'),
				config
			);
		</script>
		<?php
	} else {
		?>
		<section class="categories-section spad">
			<div class="container">
				<div class="section-title">
					<h2>Các Danh Mục Khóa Học Của Chúng Tôi</h2>
				</div>
				<div class="row">
					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/1.jpg"></div>
							<div class="ci-text">
								<h5>IT Developer</h5>
								<p>Các khóa học về lập trình</p>
								<?php
									echo '<span>'.$soluongkhoahoc['IT Developer'].' Khóa Học</span>'
								?>
								
							</div>
						</div>
					</a>

					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/2.jpg"></div>
							<div class="ci-text">
								<h5>Thiết Kế Web</h5>
								<p>Các khóa học về thiết kế Web</p>
								<?php
									echo '<span>'.$soluongkhoahoc['Thiết Kế Web'].' Khóa Học</span>'
								?>
							</div>
						</div>
					</a>

					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/3.jpg"></div>
							<div class="ci-text">
								<h5>Nhiếp ảnh</h5>
								<p>Các khóa học về chụp ảnh, máy ảnh</p>
								<?php
									echo '<span>'.$soluongkhoahoc['Nhiếp ảnh'].' Khóa Học</span>'
								?>
							</div>
						</div>
					</a>

					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/4.jpg"></div>
							<div class="ci-text">
								<h5>Môn học đại cương</h5>
								<p>Các khóa học về các môn đại cương</p>
								<?php
									echo '<span>'.$soluongkhoahoc['Môn học đại cương'].' Khóa Học</span>'
								?>
							</div>
						</div>
					</a>

					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/5.jpg"></div>
							<div class="ci-text">
								<h5>Photoshop</h5>
								<p>Các khóa học về photoshop, chỉnh sửa ảnh</p>
								<?php
									echo '<span>'.$soluongkhoahoc['Photoshop'].' Khóa Học</span>'
								?>
							</div>
						</div>
					</a>

					<a href="#" class="col-lg-4 col-md-6 btn btn-default">
						<div class="categorie-item">
							<div class="ci-thumb set-bg" data-setbg="img/categories/6.jpg"></div>
							<div class="ci-text">
								<h5>Tiền Kỹ Thuật Số</h5>
								<p>Các khóa học về tài chính Blockchain</p>
								<?php
									echo '<span>'.$soluongkhoahoc['Tiền Kỹ Thuật Số'].' Khóa Học</span>'
								?>
							</div>
						</div>
					</a>

				</div>
			</div>
		</section>
		<?php
	}
	?>




	<!-- Phần danh mục 
	
	Kết thúc phần danh mục -->



	<!-- Phần tìm kiếm 
	<section class="search-section">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2>Tìm Kiếm Khóa Học Của Bạn</h2>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<form class="course-search-form d-flex justify-content-between">
							<input type="text" class="form-control flex-grow-1" placeholder="Danh mục">
							<button class="btn btn-primary ml-2" type="button">Tìm Kiếm Khóa Học</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	 Kết thúc phần tìm kiếm -->


	<!-- Phần khóa học 
	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Các Khóa Học Nổi Bật</h2>
			</div>
		</div>
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">Tất Cả</li>
				<li class="control" data-filter=".finance">Tài Chính</li>
				<li class="control" data-filter=".design">Thiết Kế</li>
				<li class="control" data-filter=".it">IT Developer</li>
				<li class="control" data-filter=".media">Truyền thông</li>
			</ul>
			<div class="row course-items-area">
				<div class="mix col-lg-3 col-md-4 col-sm-6 design">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
				<div class="mix col-lg-3 col-md-4 col-sm-6 it">
					<a href="single-course.php" class="course-item">
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
				</a>
				<div class="mix col-lg-3 col-md-4 col-sm-6 design">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
				<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
				<div class="mix col-lg-3 col-md-4 col-sm-6 finance">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>

				<div class="mix col-lg-3 col-md-4 col-sm-6 media">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
				<div class="mix col-lg-3 col-md-4 col-sm-6 it">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
				<div class="mix col-lg-3 col-md-4 col-sm-6 it">
					<a href="single-course.php" class="course-item">
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
					</a>
				</div>
			</div>
		</div>
	</section>
	course section end -->



	<!-- banner section 
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
	banner section end -->


	<?php include 'footersection.php'; ?>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

</html>