<?php
	session_start(); 
 ?>
 <?php require_once("demo/connection.php");?>
<?php include("permission.php");?>
<?php include ("menu.php"); ?>
<?php
	$sql = "SELECT * FROM posts";
	$query = mysqli_query($conn,$sql);
?>
<table border="1px;" align="center">
	  <thead>
	  	<tr>
			  <td bgcolor="#E6E6FA">ID</td>
		  	<td bgcolor="#E6E6FA">Title</td>
		  	<td bgcolor="#E6E6FA">Content</td>
			  <td bgcolor="#E6E6FA">User_id</td>
		  	<td bgcolor="#E6E6FA">Public</td>
        <td bgcolor="#E6E6FA">Type</td>
	  	<tr>
  	</thead>
  <tbody>
  <?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
	?>
	  	<tr>
	  		<td><?php echo $id; ?></td>
		  	<td><?php echo $data['title']; ?></td>
		  	<td><?php echo $data['content']; ?></td>
	  		<td><?php echo ($data['user_id'] ) ; ?></td>
		  	<td><?php echo ($data['is_public'] ) ; ?></td>
        <td><?php echo ($data['type'] ) ; ?></td>
		  	<td>
	  			<a href="chinh-sua-bai-viet.php?id=<?php echo $id;?>">Sửa</a>
		  		<a href="xoa-bai-viet?id_delete=<?php echo $id;?>">Xóa</a>
		  	</td>
	  	</tr>
	<?php 
			$i++;
		}
	?>
  </tbody>
</table>
