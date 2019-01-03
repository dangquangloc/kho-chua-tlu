<?php require_once("demo/connection.php"); ?>
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
            <?php 
				while ( $data = mysqli_fetch_array($query) ) {
            ?>
            <h3><?php echo $data['cmtcontent']; ?></h3></div></ br>
            <?php } ?>