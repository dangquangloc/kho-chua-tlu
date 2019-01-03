<?php
	session_start(); 
 ?>
<?php require_once("demo/connection.php");?>
<?php include("permission.php");?>
<?php include ("header.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$title = $_POST["title"];
        $content = $_POST["post_content"];
        $type = $_POST["type"];
		$is_public = 0;
 
		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE posts SET title = '$title', content = '$content', is_public = '$is_public', type='$type',updatedate = now() WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		header('Location: quan-ly-bai-viet.php');
	}
 
	$id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM posts WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);
 
	function make_type_dropdown($id){
		$select_1 = "";
		$select_2 = "";
		$select_3 = "";
		if ($id == 1) {
			$select_1 = 'selected = "selected"';
		}
		if ($id == 2) {
			$select_2 = 'selected = "selected"';
		}
		if ($id == 3) {
			$select_3 = 'selected = "selected"';
		}
		$select = '<select id="type" name="type">
						<option value="-1"></option>
						<option value="1" '.$select_1.'>Ngày lễ</option>
						<option value="2" '.$select_2.'>Đặc biệt</option>
						<option value="3" '.$select_3.'>Ngày thường</option>
					</select>';
 
		return $select;
	}
 
 
?>
	<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>
	<form action="chinh-sua-bai-viet.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa bài viết</h3>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
				</td>
                <tr>
 
			</tr>	
			<tr>
				<td nowrap="nowrap">Title :</td>
				<td><input name="post_title" id="post_title" value="<?php echo $data['title']; ?>" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Nội Dung :</td>
                <td><textarea name="post_content" id="post_content" rows="10" cols="150"><?php echo $data['content']; ?></textarea></td>
				
			</tr>
			<td nowrap="nowrap">Chủ đề bài viết :</td>
				<td>
					<?php echo make_type_dropdown($data['type']); ?>
			    </td>
                <tr>
				<td nowrap="nowrap">Public bài viết ? :</td>
				<td><input type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
		
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>
 
		</table>
		
	</form>
    <?php } ?>
    <script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
<?php include "footer.php" ?>