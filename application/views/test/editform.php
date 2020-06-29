<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<?php 
foreach ($userdata as  $val) {
?>
<form method="POST" action="<?php echo base_url().'index.php/test/update/'.$val->id; ?>" enctype="multipart/form-data">
	User<input type="text" name="uname" value="<?php echo $val->uname; ?>"><br>
	Pass<input type="text" name="upass" value="<?php echo $val->upass; ?>"><br>
		Image<input type="file" name="img">
		<input type="hidden" name="hid" value="<?php echo $val->img; ?>"><br>

	<input type="submit" name="submit" value="ADD">
</form>
<?php } ?>
</body>
</html>