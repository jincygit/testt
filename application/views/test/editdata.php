<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
</head>
<body>
<?php
		foreach ($logdata as  $val) {
			?>
<form method="POST" action="<?php echo base_url().'index.php/testc/update/'. $val->id; ?>" enctype="multipart/form-data">

	Username<input type="text" name="uname" value="<?php echo $val->uname; ?>"><?php echo form_error('uname'); ?><br>
	Password<input type="text" name="upass" value="<?php echo $val->upass; ?>"><?php echo form_error('upass'); ?><br>
	Image<input type="file" name="img">
	<input type="hidden" name="hid"  value="<?php echo $val->img; ?>"><br>
	<input type="submit" value="Update">
	
</form>
<?php
	}
		 ?>
</body>
</html>