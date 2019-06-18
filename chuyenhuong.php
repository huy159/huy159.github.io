<?php
session_start();
require 'lib/config.php';
$tdn = $_SESSION['TDN'];
$mk = $_SESSION['MK'];
$loai = $_SESSION['level'];
$manv = $_SESSION['MaNV'];
$khoa = $_SESSION['Khoa'];
if ($manv == "") {
	header("location:login.php");
}else{
$sqla = "SELECT * FROM `khoa` WHERE MaKhoa = '$khoa'";
$querya = mysqli_query($conn, $sqla);
$data=mysqli_fetch_assoc($querya);
$loaikhoa = $data['LoaiKhoa'];
$ulr = $loaikhoa."/".$loai;
if ($ulr == "khambenh/letan") {
	$chuyen = "khambenh/letan/index.php?thekhambenh=Th%E1%BA%BB+Kh%C3%A1m+B%E1%BB%87nh";
	header("location:$chuyen");
}else{
header("location:$ulr");
}
}
?>