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

// Add new Page
function add_page($Title, $content, $url){
	global $db;
	
	$query = $db->query("INSERT INTO page (title, contents, url) VALUES ('$Title', '$content', '$url')");
	if (!$query) {
			return $db->errorInfo();;
		} else {
			return "Published";
		}
}

// Check whether url exists in menu and page table
function check_url($table, $col, $link){
	global $db;
	$query = $db->query("SELECT {$col} FROM {$table} WHERE {$col} = '$link'"); 
	$query = $query->fetchAll();
	if (empty($query)) {
		return 1;
	} else {
		return 0; 
	}
}

// Check a page with given menu url exists or not, if not then ask create page first.
function page_exist($link){
	$col = 'url';
	$table = 'page';
	if (!check_url($table, $col, $link)) {	
		return 1;
	} else {
		return 0;
	}
}

// Check for menu or submenu link already exist
function check_mn($link){
	$col = 'm_menu_link';
	$table = 'main_menu1';
	$tmp = check_url($table, $col, $link);
	if ($tmp) {
		$tmp = check_url('sub_menu', 's_menu_link', $link);
	} else {
		return $tmp;
	}
	return $tmp;
}

// Update page
function update_page($content, $edit_id){
	global $db;
	$update = $db->query("UPDATE page SET contents = '$content' WHERE id='$edit_id' ");
	if (!$update) {
			echo mysql_error();
		} else {
			return "Content Updated";
		}
}

// Delete page
function delete_page($title){
	global $db;
	$query = $db->query("DELETE FROM page WHERE id = '$title' LIMIT 1");
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

function find_page_by_name($pagename){
	global $db;
	$query = $db->query("SELECT * FROM page WHERE title= '$pagename'" );
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

// delete any uploaded file
function delete_file($name, $path){
	global $db;
	$path = $path."/".$name;
	if (file_exists($path)) {
		if (unlink($path)) {
			$query = $db->query("DELETE FROM downloads WHERE name = '$name' LIMIT 1");
			return "Success";
		} else {
			return "fail";
		}
	}
	

}

// Upload file with allowed extensions
function upload($name, $location, $path, $size, $ext) {
	global $db;
	$url = $path."/$name";
	move_uploaded_file($location, $url);
	$sql = $db->query("INSERT INTO downloads(name, size, type, url) VALUES('$name', '$size', '$ext', '$url')");
	return $url;
}

// File name unique or not
function check_file_name($name, $location, $path, $size, $ext) {
	// Check if the file name exist already
	global $db, $flag;
	$query = $db->query("SELECT name FROM downloads WHERE name = '$name'");
	$query = $query->fetchAll();
	if (empty($query)) {
		return upload($name, $location, $path, $size, $ext);
	} else {
		$todays_date = date("mdYHis");
	    // $name = str_replace(',', '' , $name);
	    $new_filename = $todays_date.'_'.$name;
	    rename($name, $new_filename);
		return upload($new_filename, $location, $path, $size, $ext);
	}
	
}

function add_footer($footer, $pagename){
	global $db;
	$no=0;
	if($footer=='footer1')
	{
     $no=1;
	}
	else if($footer=='footer2')
	{
		$no=2;
	}
	else
	{
		$no=3;
	}

	$query = $db->query("SELECT title, url FROM page WHERE title= '$pagename'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			
			$_title = $row['title'];
			$_url = $row['url'];
			$db->query("INSERT INTO footer_pages(num,title,url) VALUES ($no,'$_title','$_url')");
		}
	
	return "Page Added to the Footer";
}

function check_footer_page($footer, $pagename)
{
	$col = 'title';
	$table = 'footer_pages';
	if (!check_url($table, $col, $pagename)) {	
		return "This page already exists in Footer";
	} else {
		return add_footer($footer, $pagename);
	}
}

function delete_footer_page($url){

	global $db;
	$sql = $db->query (sprintf ( "DELETE FROM footer_pages WHERE url='$url'", mysql_real_escape_string ( $url)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}

?>