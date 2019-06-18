<?php
session_start();
require 'lib/config.php';
$uhs=$phs="";
if(isset($_POST['hs'])){
	if($_POST['txtuserhs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="login.php";
		</script>
		<?php
		exit();
	}else{
		$uhs=$_POST['txtuserhs'];

	}
	if($_POST['txtpasshs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
		window.location="login.php";
		</script>
		<?php
		exit();
	}
	else{
		$phs=$_POST['txtpasshs'];
	}
	if($uhs && $phs){
		
		//require("../includes/config.php");
		

		$query="select * from taikhoan where TDN='$uhs' and MK='$phs'";
		$results = mysqli_query($conn,$query);
		if($rowcount=mysqli_num_rows($results) ==0) {
				?>
				<script type="text/javascript">
					alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
					window.location = "login.php";
				</script>
				<?php
				exit();
			} else {
				$data=mysqli_fetch_assoc($results);
				$_SESSION['TDN'] = $data['TDN'];
				$_SESSION['MK']=$data['MK'];
				$_SESSION['level']=$data['Loai'];
				$_SESSION['MaNV']=$data['MaNV'];
				$_SESSION['TenNV']=$data['TenNV'];
				$_SESSION['Khoa']=$data['Khoa'];
				header("location:chuyenhuong.php");
				exit();
			}
		}
	$dis=$con->close();
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG ĐĂNG NHẬP BỆNH VIỆN</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="style.css">

  
</head>

<body>
<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">BỆNH VIỆN ĐA KHOA ÁNH DƯƠNG - BỆNH VIỆN ÁNH DƯƠNG</div>
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRANG ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ BỆNH VIỆN</div>
  <div class="wrap" style="margin-top:30px">
		<div class="avatar">
       <img src="lib/anhdangnhap.jpg">
		</div>
		<form action="login.php" method="post">
		<input type="text" name="txtuserhs" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasshs" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">Làm mới lại?</a>
		<button><input type="submit" name="hs" value="Đăng Nhập" /></button>
	</form>
	</div>
<br/>
<div style="border: 1px solid #CDCDCD;background-color: #e4e0d8;width: 500px;margin-left: 440px;font-family: Tahoma">
	<h6 style="font-weight: bold">Một số hướng dẫn cần thiết :</h6>
	<li>Đối tượng sử dụng : Các y bác sĩ Bệnh viện đa khoa Ánh Dương - Bệnh viện Ánh Dương.</li>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Trong quá trình truy cập, nếu có thắc mắc gì hay quên</h6>
		<h6>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp mật khẩu truy cập liên hệ ban quản trị bệnh viện</h6>
			<h6>&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp để lấy lại tài khoản.</h6>
</div>
    <script src="js/index.js"></script>

</body>&nbsp
</html>