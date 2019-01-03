<?php
	session_start(); 
	
 ?>
 <?php require_once("demo/connection.php"); ?>
 <?php
 //lấy thông tin từ các form bằng phương thức POST
 if (isset($_POST["btn_submit"])) {
   $post = $_POST["post"];
   $user_id = $_SESSION["user_id"];
   $idpost = $_SESSION["id"];
   $sql = "INSERT INTO comment(cmtcontent, user_id,idpost ) VALUES ('$post', '$user_id','$idpost')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
 }

 ?>

 
<form action="display.php?id=" method="post">
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