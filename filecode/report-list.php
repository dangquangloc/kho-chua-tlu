<?php
	session_start(); 
	
 ?>
<?php require_once("demo/connection.php"); ?>
<?php include "menu.php" ?>
<?php include("permission.php");?>

<?php
	$sql = "SELECT * FROM report";
	$query = mysqli_query($conn,$sql);
?>
<?php
	if (isset($_GET["id_accep"])) {
		$sql = "DELETE FROM report WHERE report_id = ".$_GET["id_accep"];
		mysqli_query($conn,$sql);
	}	
?>
<?php
	$sql = "SELECT * FROM comment";
	$query2 = mysqli_query($conn,$sql);
?>
<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM comment WHERE cmt_id = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
	}	
?>
<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM report WHERE cmt_id = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
	}	
?>



<table border="1px;" align="center">
	<thead>
		<tr>
			<td bgcolor="#E6E6FA">Report-ID</td>
			<td bgcolor="#E6E6FA">Username</td>
			<td bgcolor="#E6E6FA">name</td>
			<td bgcolor="#E6E6FA">User-Report</td>
			<td bgcolor="#E6E6FA">Nội dung report</td>
		<tr>
	</thead>
	<tbody>
	<?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['report_id'];
			$idd = $data['cmt_id']
			
	?>
		<tr>
			<td><?php echo $data['report_id']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['name']; ?></td>
            <td><?php echo $data['user_report']; ?></td>
            <td><?php echo $data['cmtcontent']; ?></td>
			
			<td>
				<a href="report-list.php?id_accep=<?php echo $id;?>">Accep</a>
				<a href="report-list.php?id_delete=<?php echo $idd;?>">Delete</a>
			</td>
		</tr>
	<?php 
			$i++;
		}
	?>
	</tbody>
</table>
