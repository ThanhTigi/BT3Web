<?php
if (isset($_SESSION['user_data']) && $_SESSION['user_data']['role'] == 1) {
	?>
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
						echo '<a href="logout.php" class="site-btn header-btn btn-sm mr-3">Đăng xuất</a>';
					?>
					<nav class="main-menu">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li><a href="courses.php">Các khóa học</a></li>
							<li><a href="insertcourse.php">Thêm khóa học</a></li>
							<li><a href="updatecourse.php">Sửa khóa học</a></li>
							<li><a href="deletecourse.php">Xóa khóa học</a></li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</header>
	<!-- Header section end -->
	<?php
} else {
	?>
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
						if (isset($_SESSION['user_data'])) {
							echo '<a href="logout.php" class="site-btn header-btn btn-sm mr-3">Đăng xuất</a>';
						}
						else {	
							echo '<a href="signin.php" class="site-btn header-btn btn-sm">Đăng nhập</a>';
							echo '<a href="signup.php" class="site-btn header-btn btn-sm mr-3">Đăng ký</a>';
						}
					
					?>
					
					<nav class="main-menu">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li><a href="about.php">Giới thiệu</a></li>
							<li><a href="contact.php">Liên hệ</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->
	<?php
}
?>