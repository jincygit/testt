<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
foreach ($userdata as  $val) {
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $val->uname; ?></td>
	<td><img src="<?php echo $val->img; ?>" height="200px" width="100px" ></td>
	<td><a href="<?php echo base_url().'index.php/test/edit/'.$val->id; ?>">Edit</a></td>
		<td><a href="<?php echo base_url().'index.php/test/delete/'.$val->id; ?>">Delete</a></td>

</tr>
<?php $i++; } ?>
</table>
<p class="pagination"><?php echo $links; ?></p>
</body>
</html>