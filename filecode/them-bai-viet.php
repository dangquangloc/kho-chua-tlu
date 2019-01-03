<?php
	session_start(); 
	include "menu.php";
 ?>
<?php require_once("demo/connection.php"); ?>
<?php require_once("permission.php"); ?>

<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$title = $_POST["title"];
		$content = $_POST["post_content"];
		$is_public = 0;
		$pay = $_POST["pay"];
		if (isset($_POST["is_public"])) {
			$is_public = $_POST["is_public"];
		}
		
		$user_id = $_SESSION["user_id"];
 
		$sql = "INSERT INTO posts(type,title, content, user_id, is_public, createdate ) VALUES ('$pay', '$title', '$content', '$user_id', '$is_public', now())";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		
	}
 
?>
 <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Thiết lập mảng lưu lỗi => Mặc định rỗng
    $error = array();
    if (empty($_POST['pay'])) {
        $error['pay'] = "Bạn cần chọn chủ đề cho món ăn";
    } else {
        $pay = $_POST['pay'];
    }
    // Kiểm tra có lỗi hay không
    if (empty($error)) {
        echo "Bài viết đã thêm thành công";
        // Xử lý dữ liệu khi không gặp lỗi nhập liệu
    }
}
?>

	<form action="them-bai-viet.php" method="post">
		<table>
			<tr>
				<td colspan="2"><h3>Thêm bài viết mới</h3></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Chủ đề của món ăn :
					<td><select  name="pay">
    					<option  value="">--Chọn--</option>
    					<option <?php if (isset($pay) && $pay == '1')  ?> value="1">ngày lễ</option>
						<option <?php if (isset($pay) && $pay == '2')  ?> value="2">đặc biệt</option>
						<option <?php if (isset($pay) && $pay == '3')  ?> value="3">ngày thường</option>
					</select></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tiêu đề bài viết :</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
	
			<tr>
				<td nowrap="nowrap">Nội dung :</td>
				<td><textarea name="post_content" id="post_content" rows="10" cols="150"></textarea></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Public bài viết ? :</td>
				<td><input type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Thêm bài viết"></td>
				<span style="color: red;"><?php if (isset($error['pay'])) echo $error['pay']; ?></span> <br/>

			</tr>
 
		</table>
		
	</form>
	<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
