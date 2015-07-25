<?php
	require('header.php');
	$msg = "";
	$_id ="";
	$_title = "";
	$_content = "";
	if (isset($_POST['action'])== 'view') {
			$id= $_POST['post'];
			list($_id, $_title, $_content) = find_page_by_id($id);
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
			<label>View Page</label><br/><br/>
			<input type="hidden" name="action" value="view">	
			<?php 
			$result = get_page_and_id();
			echo "<select name=post value=''>PostName";
			while ($res = mysql_fetch_array($result)) {
				echo "<option value=$res[id]> $res[title]</option>";
			}
			echo "</select>";
			?>
			<input type="submit" name="submit" value="View">
		</form>
	<br/>
	<div>
		<?php echo $_title;?>
	</div>
	<div>
		<?php echo $_content;?>
	</div>

</body>
</htm>