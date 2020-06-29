<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>

<form method="POST" action="<?php echo base_url(); ?>index.php/test/add" enctype="multipart/form-data">
	User<input type="text" name="uname"><?php echo form_error('uname'); ?><br>
	Pass<input type="text" name="upass"><?php echo form_error('upass'); ?><br>
		Image<input type="file" name="img"><?php echo form_error('img'); ?><br>

	<input type="submit" name="submit" value="ADD">
</form>
</body>
</html>