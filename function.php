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

	function find_page_by_url($page_url){
		global $db;
		$query = $db->query("SELECT * FROM page WHERE url='$page_url'" );
		$query = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($query as $row) {
				$_id = $row['id'];
				$_title = $row['title'];
				$_content = $row['contents'];
			}
		return array($_id, $_title, $_content);
	}
	
	function Match($requestUri){
	$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
	if ($current_file_name == $requestUri) 
        return "active";
	}

	function nav_menu(){
		$res = select_table('main_menu1');
        foreach ($res as $row) {
                $res_menu = sub_menu($row['m_menu_id']);
            	if ($res_menu) {
            		echo "<li class='nav-item dropdown'>";
		            echo "<a class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false' href=#>$row[m_menu_name]<i class='fa fa-angle-down'></i></a>";
		            echo "<ul class='dropdown-menu'>";
		            foreach ($res_menu as $res_sub) {
		            	echo "<li><a href=$res_sub[s_menu_link]>$res_sub[s_menu_name]</a></li>";
		            }        
		            echo "</ul>";
		            echo "</li>";
		     } else {
                echo "<li class='".Match($row['m_menu_link'])." nav-item'><a href=$row[m_menu_link]>$row[m_menu_name]</a>";
                echo "</li>";
            }
        }   

    function get_month($key){
    	switch ($key) {
    				case '01':
    						return "January";
    					break;
    				case '02':
    						return "Febuary";
    					break;
    				case '03':
    						return "March";
    					break;
    				case '04':
    						return "April";
    					break;
    				case '05':
    						return "May";
    					break;
    				case '06':
    						return "June";
    					break;
    				case '07':
    						return "July";
    					break;
    				case '08':
    						return "August";
    					break;
    				case '09':
    						return  "September";
    					break;
    				case '10':
    						return "October";
    					break;
    				case '11':
    						return  "November";
    					break;
    				case '12':
    						return "December";
    					break;
    			}
    }

    function create_archive($date){
    	foreach ($date as $year => $month) {
            $occurences = array_count_values($month);
    		echo "<li><a href='#'>$year</a></li>";
            $month = array_unique($month);
            asort($month);
    		foreach ($month as $key) {
                echo "<ul><li><a href='archive_month.php?year=$year&month=$key'>".get_month($key)."</a>(".$occurences[$key].")</li></ul>";
    			
    		}
    	}
 
    }

    function show_archive(){
     	global $db;
     	$query = $db->query("SELECT Time FROM page");
     	$query = $query->fetchAll();
     	$tmp_arr =array();
     	foreach ($query as $time) {
            $tmp = explode('-', $time['Time']);
     		$year = $tmp[0];
     		$month = $tmp[1];
            if (!isset($tmp_arr[$year])) {
                $tmp_arr[$year] = array();
            }
    		array_push($tmp_arr[$year], $month);
    		// $tmp_arr[$year] = array_unique($tmp_arr[$year]);
    		// print_r($tmp_arr);
     	}
     	create_archive($tmp_arr);
     }
    }
?>
       
   