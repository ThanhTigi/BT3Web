<?php

function checkUser($user, $password)
{
    include ("connect.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM khach_hang";
    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql);
    // Kiểm tra số bản ghi trả về có lớn hơn 0 hay không
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng dòng dữ liệu
        $check = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Username'] == $username && $row['Password'] == $password) {

                // Lưu thông tin người dùng vào session
                $_SESSION['user_data'] = $row;
                return $row;
            }
        }
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!'); window.location = 'login.php'</script>  ";

    }
}
?>