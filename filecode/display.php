<?php
	session_start(); 
	
 ?>
<?php require_once("demo/connection.php"); ?>
<?php include "header.php" ?>
<?php
if (isset($_SESSION['user_id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='http://localhost/login.php'> Click để về trang đăng nhập</a>";
			exit();
}
?>
<?php
  
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
		// Lấy ra nội dung bài viết theo điều kiện id
		$sql = "select * from posts where id = $id";
		// Thực hiện truy vấn data thông qua hàm mysqli_query
		$query = mysqli_query($conn,$sql);
?>
			<div class="innertube">
<?php 
				while ( $data = mysqli_fetch_array($query) ) {
?>
					<h3><?php echo $data['title']; ?></h3></div></br>
					<i> Ngày tạo : <?php echo $data['createdate']; ?></i></br>
					<p><?php echo $data['content']; ?></p></br>
	
<?php
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
		// Lấy ra nội dung bài viết theo điều kiện id
		$sql = "select * from comment where idpost = $id";
		// Thực hiện truy vấn data thông qua hàm mysqli_query
		$query = mysqli_query($conn,$sql);
	
?>
			<div class="cmt">
			<tr>
						<td colspan="2"><h2>Các bình luận trước đó</h2></td>
					</tr>
            <?php //phần bình luận
				while ( $data = mysqli_fetch_array($query) ) {
			?>
					
					<tr>
						<td nowrap="nowrap" colspan="2">
						<b><?php  echo $data['name']; ?></b>
						<b> : </b>
						<b><?php  echo $data['cmtcontent']; ?></b>
						<a href="report.php?id=<?php echo $data["cmt_id"]; // truyền id  ?>"> Report</a>
						</td>
			</div></br>
					</tr>
<?php } ?>

			

				<form action="display.php?id=<?php echo $_GET['id'] ?>" method="post">
    					<table>
									<tr>
											<td colspan="2"><h3>Thêm bình luận</h3></td>
           							</tr>	
          							<tr>
											<td nowrap="nowrap">Nội dung :</td>
											<td><textarea name="post" id="post" rows="10" cols="100"></textarea></td>
         							</tr>
           							<tr>
											<td colspan="2" align="center"><input type="submit" name="btn_submit" value="gửi"></td>
				
									</tr>
									
   						</table>
						
 </form>

 <?php
 	//lấy thông tin từ các form bằng phương thức POST
 	if (isset($_POST["btn_submit"])) {
  		 $post = $_POST["post"];
		   $user_id = $_SESSION["user_id"];
		   $user = $_SESSION['username'];
		   $name = $_SESSION['name'];
  		//lưu dữ liêu vào CSDL
  		 $sql = "INSERT INTO comment(cmtcontent, user_id,idpost,username,name ) VALUES ('$post', '$user_id','$id','$user','$name')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
	
 }

 ?>
			<?php } ?>
			</div>
		</main>
	<?php include "menu.php" ?>
<?php include "footer.php" ?>