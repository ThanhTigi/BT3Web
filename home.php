<?php
session_start();
ob_start();
include ("connect.php");

// Lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT MaKhoaHoc, TenKhoaHoc, GiaTien, ThoiLuong, SLDaBan, LoaiKhoaHoc FROM khoa_hoc";
$result = mysqli_query($conn, $sql);
$sum = 0;
// Mảng kết hợp để lưu trữ số lượng đã bán cho mỗi loại khóa học
$soluongdaban = [];
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
        $sum += $row['SLDaBan'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các khóa học và Biểu đồ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container mb-10" style="margin-top:94px;" id="khohang-card">
    <div class="row">
        <div class="col-md-10">
            <h2>Danh sách các khóa học</h2>
            <p>Số lượng khóa học đã bán</p>
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
                // Đếm số thứ tự
                $cnt_stt = 1;
                
                // Lặp qua mảng soluongdaban để hiển thị thông tin trong bảng
                foreach ($soluongdaban as $loai => $soluong) {
                    $tilesoluong[$loai] = $soluong / $sum * 100;
                    echo '<tr>
                        <td>' . $cnt_stt++ . '</td>
                        <td>' . $loai . '</td>
                        <td>-</td>
                        <td>-</td>
                        <td>' . $soluong . '</td>
                        <td>' . $loai . '</td>
                    </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="container" style="width: 50%;">
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
</body>
</html>


<div class="container " style="margin-top: 100px;" id="body-kho1">

            <h4 class="text-center">Sửa thông tin khóa học</h4>
            <?php
            include ("connect.php");
            $id = $_GET['MaKH'];
            ?>
            <form action="xu_ly_sua_khoa_hoc.php?id=<?php echo $id ?>" method="post">
                <?php
                $cnt = 1;
                $sql = "SELECT * FROM khoa_hoc where MaKhoaHoc = $id";

                // Thực thi truy vấn
                $result = mysqli_query($conn, $sql);

                // Xử lý kết quả
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <div class="mb-3 mt-3">
                            <label for="tenkhoahoc" class="form-label">Tên Khóa Học:</label>
                            <input type="text" class="form-control" id="tenkhoahoc" placeholder="Nhập tên khóa học"
                                name="tenkhoahoc" value="<?php echo $row["TenKhoaHoc"]; ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="giatien" class="form-label">giá khóa học:</label>
                            <input type="number" class="form-control" id="giatien" placeholder="nhập giá sản phẩm"
                                name="giatien" value="<?php echo $row["GiaTien"]; ?>">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="sldaban" class="form-label">Số lượng đã bán:</label>
                            <input type="number" class="form-control" id="sldaban" placeholder="Nhập số lượng " name="sldaban"
                                value="<?php echo $row["SLDaBan"]; ?>">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="thoiluong" class="form-label">Thời Lượng:</label>
                            <input type="text" class="form-control" id="thoiluong" placeholder="Nhập thời lượng "
                                name="thoiluong" value="<?php echo $row["ThoiLuong"]; ?>">
                        </div>

                        <?php
                    }
                }
                ?>

                <button type="submit" class="btn btn-primary">Đồng ý</button>
            </form>
        </div>