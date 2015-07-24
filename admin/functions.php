<!-- All Functions -->
<? php
 require_once('../includes/config.php'); 
 ?>
 
<?php 
	
	function add_page($Title, $content){
		global $db;
		$query = $db->query("INSERT INTO page (title, contents) VALUES ('$Title', '$content')");

		if (!$query) {
				return $db->errorInfo();;
			} else {
				return "Published";
			}
	}

	function update_page($content, $edit_id){
		global $db;
		$update = $db->query("UPDATE page SET contents = '$content' WHERE id='$edit_id' ");
		if (!$update) {
				echo mysql_error();
			} else {
				return "Content Updated";
			}
	}

	function delete_page($id){
		global $db;
		$query = $db->query("DELETE FROM page WHERE id = $id LIMIT 1");
		return "Deleted";
	}

	function find_page_by_id($id){
		global $db;
		$query = $db->query("SELECT * FROM page WHERE id=$id" );
		$query = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($query as $row) {
				$_id = $row['id'];
				$_title = $row['title'];
				$_content = $row['contents'];
			}
		
		return array($_id, $_title, $_content);
	}

	function get_page_and_id(){
		global $db;
		$query = $db->query("SELECT id, title FROM page ORDER BY title");
		$query = $query->fetchAll(PDO::FETCH_ASSOC);
		if (!$query) {
				return $db->errorInfo();;
			} else {
				return $query;
			}
	}
?>