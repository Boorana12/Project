<?php
if ($_SESSION["userRole"] == "Admin") {
	$adminBtn = '
	<li class="slide">
		<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-device-desktop"></i><span class="side-menu__label">ระบบการจัดการ</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a class="slide-item" href="adminStudent.php"><span>จัดการนักเรียน</span></a></li>
			<li><a class="slide-item" href="adminInternship.php"><span>สถานประกอบการ</span></a></li>
			<li><a class="slide-item" href="adminUser.php"><span>ผู้ใช้อื่น ๆ</span></a></li>
		</ul>
	</li>
	';
	$reportBtn = NULL;
	$internshipBtn = '
	<li class="slide">
		<a class="side-menu__item" href="internship.php"><i class="side-menu__icon fa fa-building"></i><span class="side-menu__label">สถานประกอบการ</span></a>
	</li>';
	$internManageBtn = NULL;
} else if ($_SESSION["userRole"] == "Internship") {
	$adminBtn = NULL;
	$reportBtn = NULL;
	$internshipBtn = NULL;
	$internManageBtn = '	
	<li class="slide">
		<a class="side-menu__item" href="internManagement.php"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">การฝึกประสบการณ์</span></a>
	</li>
	<li class="slide">
		<a class="side-menu__item" href="InternEdit.php"><i class="side-menu__icon fa fa-building"></i><span class="side-menu__label">สถานประกอบการ</span></a>
	</li>';
} else if ($_SESSION["userRole"] == "Member") {
	$reportBtn = '
	<li class="slide">
		<a class="side-menu__item" href="reportList.php"><i class="side-menu__icon fa fa-file-text"></i><span class="side-menu__label">บันทึกฝีกงาน</span></a>
	</li>
	';
	$adminBtn = NULL;
	$internshipBtn = '
	<li class="slide">
		<a class="side-menu__item" href="internship.php"><i class="side-menu__icon fa fa-building"></i><span class="side-menu__label">สถานประกอบการ</span></a>
	</li>';
	$internManageBtn = NULL;
}
?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar toggle-sidebar">
	<div class="app-sidebar__user pb-0">
		<div class="user-body">
			<span class="avatar avatar-xxl brround text-center cover-image" data-image-src="../assets/images/users/avatars/users.png"></span>
		</div>
		<div class="user-info">
			<a href="profile.php" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold"></span><br>
				<span class="text-dark app-sidebar__user-name text-sm"> <?= $_SESSION["userFirstName"] . " " . $_SESSION["userLastName"] ?></span>
			</a>
		</div>
	</div>
	<div class="panel-body tabs-menu-body border-0">
		<div class="tab-content">
			<div class="tab-pane active " id="index1">
				<ul class="side-menu toggle-menu">
					<li class="slide">
						<a class="side-menu__item" href="./"><i class="side-menu__icon fa fa-dashboard"></i><span class="side-menu__label">หน้าแรก</span></a>
					</li>
					<?= $internManageBtn ?>
					<?= $internshipBtn ?>
					<?= $reportBtn ?>
					<?= $adminBtn ?>


					<li class="slide">
						<a class="side-menu__item" href="logout.php"><i class="side-menu__icon fa fa-power-off text-red"></i><span class="side-menu__label">ออกจากระบบ</span></a>
					</li>
			</div>
		</div>
	</div>
	</div>
</aside>
<!--sidemenu end-->

<!-- app-content-->
<div class="app-content  my-3 my-md-5 toggle-content">
	<div class="side-app">
		<!-- page-header -->
		<br>
		<!-- End page-header -->