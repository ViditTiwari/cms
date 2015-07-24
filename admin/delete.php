<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	require('header.php');
	$msg = "";

	if (isset($_POST['action']) == 'delete') {
		$id = $_POST['post'];
		$msg = delete_page($id);
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
		<form method="post" action="">
			<label>Delete Page</label><br/><br/>
			<input type="hidden" name="action" value="delete">	
			<?php 
			$result = get_page_and_id();
			echo "<select name=post value=''>PostName";
			while ($res = mysql_fetch_array($result)) {
				echo "<option value=$res[id]> $res[title]</option>";
			}
			echo "</select>";
			?>
			<input type="submit" name="submit" value="Delete">
		</form>
	<br/>
	<div>
		<?php echo $msg;?>
	</div>

</body>
</htm>