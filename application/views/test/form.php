<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
</head>
<body>
<form method="POST" action="<?php echo base_url(); ?>index.php/testc/add" enctype="multipart/form-data">
	Username<input type="text" name="uname"><?php echo form_error('uname'); ?><br>
	Password<input type="text" name="upass"><?php echo form_error('upass'); ?><br>
	Image<input type="file" name="img"><?php echo form_error('img'); ?><br>
	<input type="submit" value="Add">
</form>

</body>
</html>