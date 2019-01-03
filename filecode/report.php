<?php
	session_start(); 
	
 ?>
<?php require_once("demo/connection.php"); ?>
<?php include "header.php" ?>
<?php
  
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
		// Lấy ra nội dung bài viết theo điều kiện id
		$sql = "select * from comment where cmt_id = $id";
		// Thực hiện truy vấn data thông qua hàm mysqli_query
		$query = mysqli_query($conn,$sql);
?>
			<div class="">
<?php 
				while ( $data = mysqli_fetch_array($query) ) {
?>
                    <i> Tên người bị báo cáo</i> 
                    <h3><?php echo $data['name']; ?></h3></br>

					<i> Nội dung báo cáo</i> 
                    <h3><?php echo $data['cmtcontent']; ?></h3></div></br>

                         <form action="report.php?id=<?php echo $_GET['id'] ?>" method="post">	

                             <table>
           							<tr>
											<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Báo cáo"></td>
									</tr>
									
   						    </table>
                               <?php
 	//lấy thông tin từ các form bằng phương thức POST
 	if (isset($_POST["btn_submit"])) {
         $c = $data['cmtcontent'];
         $n =$data['name'];
         $a = $data['username'];
         $b = $_SESSION['username'];
  		 $i = $data['cmt_id'];
  		//lưu dữ liêu vào CSDL
  		 $sql = "INSERT INTO report(cmtcontent,name,username,user_report,cmt_id ) VALUES ('$c','$n','$a','$b','$i')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
        mysqli_query($conn,$sql);
        
	
 }

 ?>

                     <?php } ?>	
                     <?php include "footer.php" ?>
