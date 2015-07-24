<!-- All Functions -->

<?php 
	
	function add_page($Title, $content, $db){
		
		$query = $db->query("INSERT INTO page (title, contents) VALUES ('$Title', '$content')");

		if (!$query) {
				return $db->errorInfo();;
			} else {
				return "Published";
			}
	}

	function update_page($content, $edit_id, $db){
		$update = mysql_query("UPDATE page SET contents = '$content' WHERE id='$edit_id' ");
		if (!$update) {
				echo mysql_error();
			} else {
				return "Content Updated";
			}
	}

	function delete_page($id, $db){
		$query = mysql_query("DELETE FROM page WHERE id = $id LIMIT 1");
		return "Deleted";
	}

	function find_page_by_id($id, $db){
		$query = mysql_query("SELECT * FROM page WHERE id=$id" );
		while ($temp = mysql_fetch_array($query)) {
				$_id = $temp['id'];
				$_title = $temp['title'];
				$_content = $temp['contents'];
			}
		return array($_id, $_title, $_content);
	}

	function get_page_and_id($db){
		$query = mysql_query("SELECT id, title FROM page ORDER BY title");
		return $query;
	}
?>