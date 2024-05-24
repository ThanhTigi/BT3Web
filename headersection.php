<!-- Header section -->
<header class="header-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="site-logo">
					<img src="img/logo.png" alt="">
				</div>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<?php
				if (isset($_SESSION['user_data']) && ($_SESSION['user_data'])) {
					echo '<a href="logout.php" class="site-btn header-btn btn-sm mr-3">Đăng xuất</a>';
					//echo '<span class="user-name text-white">Xin chào, ' . $_SESSION["user_data"]['TenKhachHang'] . '</span>';
				} else {
					echo '<a href="signin.php" class="site-btn header-btn btn-sm">Đăng nhập</a>';
					echo '<a href="signup.php" class="site-btn header-btn btn-sm mr-3">Đăng ký</a>';
				}
				?>
				<nav class="main-menu">
					<ul>
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="about.php">Giới thiệu</a></li>
						<li><a href="courses.php">Các khóa học</a></li>
						<li><a href="blogs.php">Blogs</a></li>
						<li><a href="contact.php">Liên hệ</a></li>
					</ul>
				</nav>
			</div>

		</div>
	</div>
</header>
<!-- Header section end -->