<!-- All Functions -->
<?php 
function add_main_menu($menu_name, $menu_link){
	global $db;

	$sql=$db->query("INSERT INTO main_menu1(m_menu_name,m_menu_link) VALUES('$menu_name','$menu_link')");
}

function add_sub_menu($parent, $proname, $menu_link)
{
	global $db;
	$sql=$db->query("INSERT INTO sub_menu(m_menu_id,s_menu_name,s_menu_link) VALUES('$parent','$proname','$menu_link')");
}

function delete_main_menu($menu_name){

	global $db;
	$sql = $db->query (sprintf ( "DELETE FROM main_menu1 WHERE m_menu_name='%s'", mysql_real_escape_string ( $menu_name)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}
function delete_sub_menu($proname)
{       
		global $db;
		$sql = $db->query (sprintf ( "DELETE FROM sub_menu WHERE s_menu_name='%s'", mysql_real_escape_string ( $proname)));
}
	
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

	function upload($name, $location, $path, $size, $ext) {
		global $db;
		$url = $path."/$name";
		move_uploaded_file($location, $url);
		$sql = $db->query("INSERT INTO downloads(name, size, type, url) VALUES('$name', '$size', '$ext', '$url')");
		return $url;
	}

	function check_file_name($name, $location, $path, $size, $ext) {
		// Check if the file name exist already
		global $db, $flag;
		$query = $db->query("SELECT name FROM downloads WHERE name = '$name'");
		$query = $query->fetchAll();
		if (empty($query)) {
			return upload($name, $location, $path, $size, $ext);
		} else {
			// $newfilename = round(microtime(true).'.'.$ext);
			$todays_date = date("mdYHis");
		    $name = str_replace(',', '' , $name);
		    $new_filename = $todays_date.'_'.$name;
		    rename($name, $new_filename);
			return upload($new_filename, $location, $path, $size, $ext);
		}
		
	}
?>