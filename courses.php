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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Trang chủ</a>
				<span>Các khóa học</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<div class="container " id="body-kho1">
            <h4 class="text-center" style="margin-top: 75px;">Danh sách sản phẩm</h4>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã Khóa Học</th>
                        <th scope="col">Tên Khóa Học</th>
                        <th scope="col">Giá tiền</th>
						<th scope="col">Thời lượng</th>
                        <th scope="col">Số lượng đã bán</th>
						<th scope="col">Loại khóa học</th>
                        <th scope="col" colspan="2">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr> -->
                    <?php
                    include("connect.php");
                    $cnt = 1;
                    $sql = "SELECT * from khoa_hoc";

                    // Thực thi truy vấn
                    $result = mysqli_query($conn, $sql);

                    // Xử lý kết quả
                    if (mysqli_num_rows($result) > 0) {
                        // Lặp qua từng dòng dữ liệu

                        while ($row = mysqli_fetch_assoc($result)) {
                            // Xử lý dòng dữ liệu, ví dụ:
                    ?>
                            <tr>
                                <th scope="row"><?php echo $cnt;
                                                $cnt++ ?></th>
                                <td>
                                    <?php echo $row["MaKhoaHoc"]; ?>
                                </td>
                                <td><?php echo $row["TenKhoaHoc"]; ?></td>
                                <td><?php echo $row["GiaTien"]; ?></td>
                                <td><?php echo $row["ThoiLuong"]; ?></td>
                                <td><?php echo $row["SLDaBan"]; ?></td>
								<td><?php echo $row["LoaiKhoaHoc"]; ?></td>
                                <td><a class="btn btn-primary" href="updatecourse.php?id=<?php echo $row["MaKhoaHoc"]; ?>">sửa</a></td>
                                <td><a href="deletecourse.php?id=<?php echo $row["MaKhoaHoc"]; ?>" class="btn btn-danger">xóa</a></td>
                            </tr>


                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($conn);
                    ?>

                </tbody>
            </table>
        </div>


	<!-- banner section 
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