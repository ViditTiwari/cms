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
// Nav Bar
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

// Latest News
    function show_latest_news(){
        $result = select_table('news');

        
        foreach ($result as $row) {



        echo '<div class="blog-list-post clearfix">';
                                    
        echo '<div class="blog-list-details">';
                
        echo "<h5 class='blog-list-title'><a href=$row[url]>$row[title]</a></h5>";
        echo "<p class='blog-list-meta small-text'>$row[description]</p>";


        echo '</div>';
        echo '</div>';
    }  

    }

// Events
    function show_event(){

        $result = select_table('events');
        foreach ($result as $row) {
            $date = explode('-', $row['event_date']);
            $month = $date[1];
            $month = get_month($month);
            $month = substr($month, 0, 3);  //Strip January to Jan
            $day = $date[2];
            
                    echo "<div class='event-small-list clearfix'>";
                            
            echo "<div class='calendar-small'>";
                echo "<span class='s-month'>$month</span>";
                echo "<span class='s-date'>$day</span>";
            echo "</div> ";
            echo "<div class='event-small-details'>";
                echo "<h5 class='event-small-title'><a href=$row[url]>$row[title]</a></h5>";
                echo "<p class='event-small-meta small-text'>$row[description]</p>";
            echo "</div> ";
            echo "</div>";
    }
    
    }
// Links

    function show_important_link(){

       $result = select_table('imp_links');
       foreach ($result as $row) {
            
            echo '<div class="blog-list-post clearfix">';
                                    
            echo '<div class="blog-list-details">';
                                        
                                    
            echo "<h5 class='blog-list-title'><a href=$row[url]>$row[title]</a></h5>";

            echo '</div>';
            echo '</div>';
            } 
    }
    
    function show_footer_link($footer)
    {
        global $db;
        $query = $db->query("SELECT title, url FROM footer_pages WHERE num= $footer" );
        $query = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($query as $row) {

                echo '<li><a href="'.$row['url'].'"><i class="fa fa-caret-right"></i>'.$row['title'].'</a></li>';
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
                echo "<ul><li><a href='archive/$year/$key'>".get_month($key)."</a>(".$occurences[$key].")</li></ul>";
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
       
   