<?php 
	function select_table($table){
		global $db;
		$query = $db->query("SELECT * FROM {$table}"); //By table name
		$query = $query->fetchAll();
		return $query;
	}

	function sub_menu($id){
		global $db;
		$query = $db->query("SELECT * FROM sub_menu WHERE m_menu_id=".$id);
		$query = $query->fetchAll();
		return $query;
	}

	function nav_menu(){
		$res = select_table('main_menu1');
		foreach ($res as $row) {
			echo "<li><a href=$row[m_menu_link] > $row[m_menu_name] </a>";
			$res_menu = sub_menu($row['m_menu_id']);
			if ($res_menu) {
			echo "<ul>";
			foreach ($res_menu as $res_sub) {
				echo "<li><a href=$res_sub[s_menu_link]> $res_sub[s_menu_name] </a></li>";
			}
			}
		}
	}
?>
