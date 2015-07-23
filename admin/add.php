<!-- Add Page -->

<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	//if not logged in redirect to login page
	if(!$user->is_logged_in()){ header('Location: index.php'); } 

	//define page title
	$title = 'Admin'; 
?>

<?php 

	$msg ="";
	if (isset($_POST['submit'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];
		$content = stripcslashes($content);
		$content = mysql_real_escape_string($content);
		$title = mysql_real_escape_string($title);

		if($title and $content){
			$msg = add_page($title, $content); //Call Add page
		} else {
			if(!$title){
				$msg ="Please Add Title";
			} else if(!$content){
				$msg ="Please Type something";
			}
		}
	}
	
?>

<html>
<head>
	<title>Admin</title>
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../js/tinymce.js"></script>
</head>
<body>

	<div>
		<form method="post" style="width:50%;" action="">
			<label><b>Add New Page</b></label><br/><br/>
			Page Title: <br/>
			<input type="text" name="title" /> 
			<br/> <br/>  
			Page Content:
		    <textarea name="content" style="cursor:text;" rows="20" cols="40"></textarea>
		    <br/> <br/>
		   <button type="submit" name="submit" >Submit</button>
		    <?php echo $msg ;?>
		</form>
	<div>

</body>
</htm>