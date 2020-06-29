<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<?php 
if(!empty($error_message))
{

?>
<h5><?php echo $error_message; ?></h5>
<?php 
}
?>
<form method="POST" action="<?php echo base_url(); ?>index.php/login/log" enctype="multipart/form-data">
	User<input type="text" name="uname"><?php echo form_error('uname'); ?><br>
	Pass<input type="text" name="upass"><?php echo form_error('upass'); ?><br>

	<input type="submit" name="submit" value="LOGIN">
</form>
</body>
</html>