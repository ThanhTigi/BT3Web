<?php
session_start();
ob_start();
include("connect.php");
$sql = "SELECT * FROM khoa_hoc";
$result = $conn->query($sql);
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

    <?php
	include 'headersection.php';
	?>
    

    <!-- Hero section -->
    <section class="hero-section set-bg" data-setbg="img/bg.jpg">
        
    </section>
    <!-- Hero section end -->



    <!-- Phần khóa học -->
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
        <li class="control" data-filter=".truyenthong">Truyền thông</li>
    </ul>
    <div class="row course-items-area">
        <?php
        // Hiển thị dữ liệu từ bảng khoa_hoc
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Đặt các lớp CSS phù hợp với LoaiKhoaHoc
                $courseTypeClass = "";
                $backgroundImage = "";
                switch($row['LoaiKhoaHoc']) {
                    case 'Tiền Kỹ Thuật Số':
                        $courseTypeClass = "finance";
                        $backgroundImage = "img/courses/4.jpg";
                        break;
                    case 'Photoshop':
                        $courseTypeClass = "design";
                        $backgroundImage = "img/courses/1.jpg";
                        break;
                    case 'IT Developer':
                        $courseTypeClass = "it";
                        $backgroundImage = "img/courses/2.jpg";
                        break;
                    case 'Nhiếp ảnh':
                        $courseTypeClass = "truyenthong";
                        $backgroundImage = "img/courses/6.jpg";
                        break;
                    default:
                        $courseTypeClass = "other";
                        $backgroundImage = "img/courses/7.jpg";
                }
                echo '<div class="mix col-lg-3 col-md-4 col-sm-6 ' . $courseTypeClass . '">';
                echo '    <a href="single-course.html" class="course-item">';
                echo '        <div class="course-thumb" style="background-image: url(\'' . $backgroundImage . '\');">';
                echo '            <div class="price">Giá: ' . number_format($row["GiaTien"]) . ' đ</div>';
                echo '        </div>';
                echo '        <div class="course-info">';
                echo '            <div class="course-text">';
                echo '                <h5>' . htmlspecialchars($row["TenKhoaHoc"]) . '</h5>';
                echo '                <p>' . htmlspecialchars($row["ThoiLuong"]) . ' giờ</p>';
                echo '                <div class="students">' . $row["SLDaBan"] . ' học viên đã đăng ký</div>';
                echo '            </div>';
                echo '        </div>';
                echo '    </a>';
                echo '</div>';
            }
        } else {
            echo "Không có khóa học nào.";
        }
        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
        ?>
    </div>
        </div>
    </section>
    <!-- course section end -->
<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>