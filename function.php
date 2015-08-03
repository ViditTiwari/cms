<?php 
	function select_table($table){
		global $db;
		$query = $db->query("SELECT * FROM {$table}"); //By table name
		$query = $query->fetchAll();
		return $query;
	}

	function sub_menu($id){
		global $db;
		$query = $db->query("SELECT * FROM sub_menu WHERE m_menu_id=$id");
		$query = $query->fetchAll();
		return $query;
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
	
	function nav_menu(){
		$res = select_table('main_menu1');
        foreach ($res as $row) {
                $res_menu = sub_menu($row['m_menu_id']);
            	if ($res_menu) {
               		echo "<li class='nav-item dropdown'>";
		            echo "<a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false' href=$row[m_menu_link]>$row[m_menu_name]<i class='fa fa-angle-down'></i></a>";
		            echo "<ul class='dropdown-menu'>";
		            foreach ($res_menu as $res_sub) {
		            	echo "<li><a href=$res_sub[s_menu_link]>$res_sub[s_menu_name]</a></li>";
		            }        
		            echo "</ul>";
		            echo "</li>";
		     } else {
                echo "<li class='nav-item'><a href=$row[m_menu_link]>$row[m_menu_name]</a>";
                echo "</li>";
            }
        }                          
    }
?>
       
   