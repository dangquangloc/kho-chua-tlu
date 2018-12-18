<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
  
    </style>
</head>
<body>
  <h1 > <Center>Xin chào <?php echo $_SESSION['username'];  ?></Center> </h1>
  1<a href="#">Thêm Thành viên</a><br><br>
  2<a href="chinh-sua-thanh-vien.php">Chỉnh sửa thành viên</a><br><br>
  3<a href="quan-ly-thanh-vien.php">Quản lý thành viên</a><br><br>
  4<a href="them-bai-viet.php">Thêm bài viết</a>

</body>
</html>