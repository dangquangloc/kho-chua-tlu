
<?php
$server_username = "admin";
$server_password = "admin";
$server_host = "localhost";
$database = 'demo';
// tao ket noi
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) ;
//kiem tra ket noi
if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}
echo "";
mysqli_query($conn,"SET NAMES 'UTF8'");