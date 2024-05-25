<?php
session_start();
ob_start();
if (!isset($_SESSION['user_data'])) {
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
                <span>Sửa khóa học</span>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <div class="container-fluid p-0 height">

        <div class="container " style="margin-top: 100px;" id="body-kho1">
            <h4 class="text-center">Nhập Khóa Học đã có:</h4>
            <form action="xu_ly_sua_khoa_hoc.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="makhoahoc" class="form-label">Tên Khóa Học:</label>
                    
                        <?php
                        include ("connect.php");
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM khoa_hoc WHERE MaKhoaHoc = '$id'";

                            // Thực thi truy vấn
                            $result = mysqli_query($conn, $sql);

                            // Xử lý kết quả
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <select class="form-select" id="makhoahoc" name="makhoahoc">
                                    <option value="<?php echo $row["MaKhoaHoc"]; ?>"><?php echo $row["TenKhoaHoc"]; ?></option>
                                    </select>
                                    <div class="mb-3 mt-3">
                                        <label for="giatien" class="form-label">Giá tiền:</label>
                                        <input type="number" class="form-control" id="giatien" placeholder="Nhập giá tiền "
                                            name="giatien" value="<?php echo $row["GiaTien"]; ?>">
                                        <label for="thoiluong" class="form-label">Thời lượng:</label>
                                        <input type="number" class="form-control" id="thoiluong" placeholder="Nhập thời lượng "
                                            name="thoiluong" value="<?php echo $row["ThoiLuong"]; ?>">
                                        <button type="submit" class="btn btn-primary">Sửa khóa học</button>
                                    </div>
                                    <?php
                                }
                            }
                        } else {
                            $sql = "SELECT * FROM khoa_hoc";
                            $result = mysqli_query($conn, $sql);
                            // Xử lý kết quả
                            if (mysqli_num_rows($result) > 0) {
                                // Lặp qua từng dòng dữ liệu
                                ?> 
                                <select class="form-select" id="makhoahoc" name="makhoahoc">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Xử lý dòng dữ liệu, ví dụ:
                                    ?>
                                    
                                    <option value="<?php echo $row["MaKhoaHoc"]; ?>"><?php echo $row["TenKhoaHoc"]; ?></option>
                                
                                    <?php
                                }
                                ?>
                                </select>
                                <?php

                            } else {
                                echo "0 results";
                            }
                            ?>
                            <div class="mb-3 mt-3">
                                <label for="giatien" class="form-label">Giá tiền:</label>
                                <input type="number" class="form-control" id="giatien" placeholder="Nhập giá tiền "
                                    name="giatien">
                                <label for="thoiluong" class="form-label">Thời lượng:</label>
                                <input type="number" class="form-control" id="thoiluong" placeholder="Nhập thời lượng "
                                    name="thoiluong">
                                <button type="submit" class="btn btn-primary">Sửa khóa học</button>
                            </div>
                            <?php
                        }

                        ?>
                </div>

            </form>
        </div>

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