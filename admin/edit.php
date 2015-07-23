<!-- Edit Page -->

<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	$msg = "";
	$_id = "";
	$_title ="";
	$_content = "";

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'find':
				$id = $_POST['post'];
				list($_id, $_title, $_content) = find_page_by_id($id);
				break;
			case 'edited':
				$edit_id = $_POST['edit_id'];
				$content = $_POST['content'];
				$content = stripcslashes($content);
				$content = mysql_real_escape_string($content);
				$edit_id = mysql_real_escape_string($edit_id);
				$msg = update_page($content, $edit_id);
				break;
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
		<form method="post" action="">
			<label>Choose page to edit</label><br/><br/>
			<input type="hidden" name="action" value="find">	
			<?php 
			$result = get_page_and_id();
			echo "<select name=post value=''>PostName";
			while ($res = mysql_fetch_array($result)) {
				echo "<option value=$res[id]> $res[title]</option>";
			}
			echo "</select>";
			?>
			<input type="submit" name="submit1" value="Edit">
		</form>

		<form method="post" style="width:60%;" action="">
			Page Title: <br/>
			<input type="text" name="title" value="<?php echo $_title;?>" readonly /> 
			<br/> <br/>  
		    <textarea name="content" style="cursor:text;" rows="20" cols="40"><?php echo $_content;?></textarea>
		    <br/> <br/>
		    <input type="hidden" name="edit_id" value="<?php echo $_id; ?>">
		    <input type="hidden" name="action" value="edited">
		   <button type="submit" name="submit2" >Update</button>
		    <?php echo $msg ;?>
		</form>
	<div><br/>

</body>
</htm>












