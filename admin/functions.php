<!-- All Functions -->

<?php 
	function add_page($title, $content){
		
		$query = mysql_query("INSERT INTO page (title, contents) VALUES ('$title', '$content')") or die(mysql_error());

		return "Page Added";
	}

	function update_page($content, $edit_id){
		$update = mysql_query("UPDATE page SET contents = '$content' WHERE id='$edit_id' ");
		if (!$update) {
				echo mysql_error();
			} else {
				return "Content Updated";
			}
	}

	function delete_page($id){
		$query = mysql_query("DELETE FROM page WHERE id = $id LIMIT 1");
		return "Deleted";
	}

	function find_page_by_id($id){
		$query = mysql_query("SELECT * FROM page WHERE id=$id" );
		while ($temp = mysql_fetch_array($query)) {
				$_id = $temp['id'];
				$_title = $temp['title'];
				$_content = $temp['contents'];
			}
		return array($_id, $_title, $_content);
	}

	function get_page_and_id(){
		$query = mysql_query("SELECT id, title FROM page ORDER BY title");
		return $query;
	}
?>