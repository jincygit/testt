<!DOCTYPE html>
<html>
<head>
	<title>List</title>
</head>
<body>
<a href="<?php echo base_url(); ?>index.php/testc/register">ADD New Data </a>
<br><br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
		<?php
		$i=1;
		foreach ($logdata as  $val) {
			?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $val->uname; ?></td>
			<td><img src="<?php echo $val->img; ?>" height="100px" width="100px" ></td>
			<td><a href="<?php echo base_url().'/index.php/testc/edit/'.$val->id; ?>">Edit </a></td>
			<td><a href="<?php echo base_url().'/index.php/testc/delete/'.$val->id; ?>">Delete </a></td>
			</tr>
		<?php
	$i++; }
		 ?>
	
</table>
</body>
</html>