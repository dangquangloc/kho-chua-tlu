<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $ketnoi['host'] = 'localhost'; //Tên server, nếu dùng hosting free thì cần thay đổi
    $ketnoi['dbname'] = 'dulieu'; //Đây là tên của Database
    $ketnoi['username'] = 'admin'; //Tên sử dụng Database
    $ketnoi['password'] = 'admin';//Mật khẩu của tên sử dụng Database
    @mysql_connect(
        "{$ketnoi['host']}",
        "{$ketnoi['username']}",
        "{$ketnoi['password']}")
    or
        die("Không thể kết nối database");
    @mysql_select_db(
        "{$ketnoi['dulieu']}") 
    or
        die("Không thể chọn database");
?>
</body>
</html>