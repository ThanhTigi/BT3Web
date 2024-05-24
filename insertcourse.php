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
                <span>Thêm khóa học</span>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <div class="container " style="margin-top: 100px;" id="body-kho1">
        <h4 class="text-center">Nhập khóa học mới</h4>
        <form action="xu_ly_them_khoa_hoc.php" method="post">
            <div class="mb-3 mt-3">
                <label for="tenkhoahoc" class="form-label">Tên khóa học:</label>
                <input type="text" class="form-control" id="tenkhoahoc" placeholder="Nhập tên khóa học"
                    name="tenkhoahoc">
            </div>
            <div class="mb-3 mt-3">
                <label for="giatien" class="form-label">Giá khóa học:</label>
                <input type="number" class="form-control" id="giatien" placeholder="Nhập giá khóa học" name="giatien">
            </div>
            <div class="mb-3 mt-3">
                <label for="thoiluong" class="form-label">Thời lượng khóa học:</label>
                <input type="number" class="form-control" id="thoiluong" placeholder="Nhập giá khóa học" name="thoiluong">
            </div>
            <div class="mb-3 mt-3">
                <label for="loaikhoahoc" class="form-label">Loại khóa học:</label>
                <select class="form-select" id="loaikhoahoc" name="loaikhoahoc">
                    <?php
                    include ("connect.php");
                    $sql = "SELECT * FROM khoa_hoc";
                    $result = mysqli_query($conn, $sql);

                    // Xử lý kết quả
                    if (mysqli_num_rows($result) > 0) {
                        // Khai báo mảng để lưu trữ các loại khóa học
                        $loaiKhoaHoc = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Thêm loại khóa học vào mảng $loaiKhoaHoc
                            $loaiKhoaHoc[] = $row['LoaiKhoaHoc'];
                        }

                        // Loại bỏ các giá trị trùng lặp từ mảng $loaiKhoaHoc
                        $uniqueLoaiKhoaHoc = array_unique($loaiKhoaHoc);

                        // Lặp qua từng loại khóa học duy nhất
                        foreach ($uniqueLoaiKhoaHoc as $loai) {
                            ?>
                            <option value="<?php echo $loai; ?>"><?php echo $loai; ?></option>
                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>


                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm khóa học</button>
        </form>
    </div>



    <?php include 'footersection.php'; ?>

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</html>