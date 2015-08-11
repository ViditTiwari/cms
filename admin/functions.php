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
	$id = find_menu_id($menu_name);

	$sql = $db->query (sprintf ( "DELETE FROM main_menu1 WHERE m_menu_name='%s'", mysql_real_escape_string ( $menu_name)));
	$db->query("DELETE FROM sub_menu WHERE m_menu_id = $id");
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
	$page_id = $db->lastInsertId(); 
	if (!$query) {
			return $db->errorInfo();;
		} else {
			return array($page_id, "Published");;
		}
}

function get_sub_menu(){
	global $db;
	$query = $db->query("SELECT s_menu_name FROM sub_menu ORDER BY s_menu_name");
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!$query) {
			return $db->errorInfo();;
		} else {
			return $query;
		}
}

function get_main_menu(){
	global $db;
	$query = $db->query("SELECT m_menu_name FROM main_menu1 ORDER BY m_menu_name");
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!$query) {
			return $db->errorInfo();;
		} else {
			return $query;
		}
}
// Find submenu id
function find_submenu_id($name){

	global $db;

	$query = $db->query("SELECT * FROM sub_menu WHERE s_menu_name='$name'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			$_id = $row['s_menu_id'];
		}
	return $_id;
}

// Find Main Menu by Id
function find_menu_id($name){
	global $db;
	$query = $db->query("SELECT * FROM main_menu1 WHERE m_menu_name='$name'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			$_id = $row['m_menu_id'];
		}
	
	return $_id;
}

// Update main menu
function update_mainmenu($new, $id){
	global $db;
	$query = $db->query("UPDATE main_menu1 SET m_menu_name = '$new' WHERE m_menu_id= '$id'");
	if (!$query) {
			echo mysql_error();
		} else {
			return "Menu Updated";
		}
}
// Update sub menu
function update_submenu($new, $id){
	global $db;
	$query = $db->query("UPDATE sub_menu SET s_menu_name = '$new' WHERE s_menu_id= '$id'");
	if (!$query) {
			echo mysql_error();
		} else {
			return "Sub Menu Updated";
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

function check_menu_name($name){
	global $db;
	$sql =$db->query("SELECT * FROM main_menu1 WHERE m_menu_name = '$name'");
	$sql = $sql->fetchAll();
	if ($sql) {
		return 0;
	} else {
		return 1;
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

function check_dropdown($link){
	if ($link == "#") {
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
	$query = $db->query("DELETE FROM page WHERE title = '$title' LIMIT 1");
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
	$sql = $db->query (sprintf ( "DELETE FROM footer_pages WHERE url='%s'", mysql_real_escape_string ( $url)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}

function check_imp_links_page($pagename)
{
	$col = 'title';
	$table = 'imp_links';
	if (!check_url($table, $col, $pagename)) {	
		return "This page already exists in Important Links";
	} else {
		return add_imp_links( $pagename);
	}
}

function add_imp_links($pagename){
	global $db;

	$query = $db->query("SELECT title, url FROM page WHERE title= '$pagename'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			
			$_title = $row['title'];
			$_url = $row['url'];
			$db->query("INSERT INTO imp_links(title,url) VALUES ('$_title','$_url')");
		}
	
	return "Page Added to the Footer";
}

function delete_imp_links_page($url){

	global $db;
	$sql = $db->query (sprintf ( "DELETE FROM imp_links WHERE url='%s'", mysql_real_escape_string ( $url)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}

function check_events_page($pagename, $description, $date)
{
	$col = 'title';
	$table = 'events';
	if (!check_url($table, $col, $pagename)) {	
		return "This page already exists in Important Links";
	} else {
		return add_events($pagename, $description, $date);
	}
}

function add_events($pagename, $description, $date){
	global $db;

	$query = $db->query("SELECT title, url FROM page WHERE title= '$pagename'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			
			$_title = $row['title'];
			$_url = $row['url'];
			$db->query("INSERT INTO events(event_date, description,title,url) VALUES ('$date', '$description', '$_title','$_url')");
		}
	
	return "Page Added to the Events";
}

function delete_events($url){

	global $db;
	$sql = $db->query (sprintf ( "DELETE FROM events WHERE url='%s'", mysql_real_escape_string ( $url)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}

function check_news_page($pagename, $description)
{
	$col = 'title';
	$table = 'news';
	if (!check_url($table, $col, $pagename)) {	
		return "This page already exists in Latest News";
	} else {
		return add_news($pagename, $description);
	}
}

function add_news($pagename, $description){
	global $db;

	$query = $db->query("SELECT title, url FROM page WHERE title= '$pagename'" );
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($query as $row) {
			
			$_title = $row['title'];
			$_url = $row['url'];
			$db->query("INSERT INTO news(description,title,url) VALUES ('$description', '$_title','$_url')");
		}
	
	return "Page Added to the Latest News";
}

function delete_news($url){

	global $db;
	$sql = $db->query (sprintf ( "DELETE FROM news WHERE url='%s'", mysql_real_escape_string ( $url)));

// Check for errors
if (!$sql) {
  
  echo "Deleting record failed: (" . $dbcon->errno . ") " . $dbcon->error;

}

}


function Index($page_id){
		
	global $db;

	$needles = array("/\ba\b/i","/\bable\b/i","/\babout\b/i","/\bacross\b/i","/\bafter\b/i","/\ball\b/i","/\balmost\b/i","/\balso\b/i","/\bam\b/i","/\bamong\b/i","/\ban\b/i","/\band\b/i","/\bany\b/i","/\bare\b/i","/\bas\b/i","/\bat\b/i","/\bbe\b/i","/\bbecause\b/i","/\bbeen\b/i","/\bbut\b/i","/\bby\b/i","/\bcan\b/i","/\bcannot\b/i","/\bcould\b/i","/\bdear\b/i","/\bdid\b/i","/\bdo\b/i","/\bdoes\b/i","/\beither\b/i","/\belse\b/i","/\bever\b/i","/\bevery\b/i","/\bfor\b/i","/\bfrom\b/i","/\bget\b/i","/\bgot\b/i","/\bhad\b/i","/\bhas\b/i","/\bhave\b/i","/\bhe\b/i","/\bher\b/i","/\bhers\b/i","/\bhim\b/i","/\bhis\b/i","/\bhow\b/i","/\bhowever\b/i","/\bi\b/i","/\bif\b/i","/\bin\b/i","/\binto\b/i","/\bis\b/i","/\bit\b/i","/\bits\b/i","/\bjust\b/i","/\bleast\b/i","/\blet\b/i","/\blike\b/i","/\blikely\b/i","/\bmay\b/i","/\bme\b/i","/\bmight\b/i","/\bmost\b/i","/\bmust\b/i","/\bmy\b/i","/\bneither\b/i","/\bno\b/i","/\bnor\b/i","/\bnot\b/i","/\bof\b/i","/\boff\b/i","/\boften\b/i","/\bon\b/i","/\bonly\b/i","/\bor\b/i","/\bother\b/i","/\bour\b/i","/\bown\b/i","/\brather\b/i","/\bsaid\b/i","/\bsay\b/i","/\bsays\b/i","/\bshe\b/i","/\bshould\b/i","/\bsince\b/i","/\bso\b/i","/\bsome\b/i","/\bthan\b/i","/\bthat\b/i","/\bthe\b/i","/\btheir\b/i","/\bthem\b/i","/\bthen\b/i","/\bthere\b/i","/\bthese\b/i","/\bthey\b/i","/\bthis\b/i","/\btis\b/i","/\bto\b/i","/\btoo\b/i","/\btwas\b/i","/\bus\b/i","/\bwants\b/i","/\bwas\b/i","/\bwe\b/i","/\bwere\b/i","/\bwhat\b/i","/\bwhen\b/i","/\bwhere\b/i","/\bwhich\b/i","/\bwhile\b/i","/\bwho\b/i","/\bwhom\b/i","/\bwhy\b/i","/\bwill\b/i","/\bwith\b/i","/\bwould\b/i","/\byet\b/i","/\byou\b/i","/\byour\b/i","/\bain't\b/i","/\baren't\b/i","/\bcan't\b/i","/\bcould've\b/i","/\bcouldn't\b/i","/\bdidn't\b/i","/\bdoesn't\b/i","/\bdon't\b/i","/\bhasn't\b/i","/\bhe'd\b/i","/\bhe'll\b/i","/\bhe's\b/i","/\bhow'd\b/i","/\bhow'll\b/i","/\bhow's\b/i",
	"/\bi'd\b/i","/\bi'll\b/i","/\bi'm\b/i","/\bi've\b/i","/\bisn't\b/i","/\bit's\b/i","/\bmight've\b/i",
	"/\bmightn't\b/i","/\bmust've\b/i","/\bmustn't\b/i","/\bshan't\b/i","/\bshe'd\b/i","/\bshe'll\b/i",
	"/\bshe's\b/i","/\bshould've\b/i","/\bshouldn't\b/i","/\bthat'll\b/i","/\bthat's\b/i","/\bthere's\b/i",
	"/\bthey'd\b/i","/\bthey'll\b/i","/\bthey're\b/i","/\bthey've\b/i","/\bwasn't\b/i","/\bwe'd\b/i",
	"/\bwe'll\b/i","/\bwe're\b/i","/\bweren't\b/i","/\bwhat'd\b/i","/\bwhat's\b/i","/\bwhen'd\b/i",
	"/\bwhen'll\b/i","/\bwhen's\b/i","/\bwhere'd\b/i","/\bwhere'll\b/i","/\bwhere's\b/i","/\bwho'd\b/i",
	"/\bwho'll\b/i","/\bwho's\b/i","/\bwhy'd\b/i","/\bwhy'll\b/i","/\bwhy's\b/i","/\bwon't\b/i",
	"/\bwould've\b/i","/\bwouldn't\b/i","/\byou'd\b/i","/\byou'll\b/i","/\byou're\b/i","/\byou've\b/i");

        $query = $db->query("SELECT contents FROM page WHERE id =$page_id");
        $page_contents = $query->fetchAll(PDO::FETCH_ASSOC);
        

        foreach ($page_contents as $row) {
                
        $utf8_text = strip_html_tags( $row['contents']);
        $utf8_text = html_entity_decode( $utf8_text, ENT_QUOTES, "UTF-8" );
        $text = strip_punctuation( $utf8_text );
        $text = strip_symbols( $text );
        $text = strip_numbers( $text );
        $text = mb_strtolower( $text, "utf-8" );
        $words = explode(' ', $text);
     
        $keywordCounts = array_count_values( $words );
        arsort( $keywordCounts, SORT_NUMERIC );
        $uniqueKeywords = array_keys( $keywordCounts );
        $uniqueKeywords = preg_replace($needles, "", $uniqueKeywords); //Remove stop words
        // print_r($uniqueKeywords);

        for ($i=0; $i < count($uniqueKeywords) ; $i++) { 
            if ($uniqueKeywords[$i]!="") {
                $cur_word = addslashes(strtolower($uniqueKeywords[$i]));
                $query = $db->query("SELECT word_id FROM word WHERE word_word='$cur_word'");
                $row = $query->fetchAll();      
                
                if ($row) {
                	if ($row[0]['word_id']) {
                    $word_id = $row[0]['word_id'];
                	}
                 }
                 else {
                    $query = $db->query("INSERT INTO word (word_word) VALUES ('$cur_word')");
                    $word_id = $db->lastInsertId(); 
                                  
            }
                 $db->query("INSERT INTO occurrence (word_id,page_id) VALUES ($word_id,$page_id)");
                
            } 
        }

}
return "Index";
}

	function strip_html_tags( $text ){

        $text = preg_replace(
            array(
              // Remove invisible content
                '@<head[^>]*?>.*?</head>@siu',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu',
              // Add line breaks before and after blocks
                '@</?((address)|(blockquote)|(center)|(del))@iu',
                '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                '@</?((table)|(th)|(td)|(caption))@iu',
                '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                "\n\$0", "\n\$0",
            ),
            $text );
        return strip_tags( $text );
    }

function strip_punctuation( $text ){
        
        $urlbrackets    = '\[\]\(\)';
        $urlspacebefore = ':;\'_\*%@&?!' . $urlbrackets;
        $urlspaceafter  = '\.,:;\'\-_\*@&\/\\\\\?!#' . $urlbrackets;
        $urlall         = '\.,:;\'\-_\*%@&\/\\\\\?!#' . $urlbrackets;
     
        $specialquotes  = '\'"\*<>';
     
        $fullstop       = '\x{002E}\x{FE52}\x{FF0E}';
        $comma          = '\x{002C}\x{FE50}\x{FF0C}';
        $arabsep        = '\x{066B}\x{066C}';
        $numseparators  = $fullstop . $comma . $arabsep;
     
        $numbersign     = '\x{0023}\x{FE5F}\x{FF03}';
        $percent        = '\x{066A}\x{0025}\x{066A}\x{FE6A}\x{FF05}\x{2030}\x{2031}';
        $prime          = '\x{2032}\x{2033}\x{2034}\x{2057}';
        $nummodifiers   = $numbersign . $percent . $prime;
     
        return preg_replace(
            array(
            // Remove separator, control, formatting, surrogate,
            // open/close quotes.
                '/[\p{Z}\p{Cc}\p{Cf}\p{Cs}\p{Pi}\p{Pf}]/u',
            // Remove other punctuation except special cases
                '/\p{Po}(?<![' . $specialquotes .
                    $numseparators . $urlall . $nummodifiers . '])/u',
            // Remove non-URL open/close brackets, except URL brackets.
                '/[\p{Ps}\p{Pe}](?<![' . $urlbrackets . '])/u',
            // Remove special quotes, dashes, connectors, number
            // separators, and URL characters followed by a space
                '/[' . $specialquotes . $numseparators . $urlspaceafter .
                    '\p{Pd}\p{Pc}]+((?= )|$)/u',
            // Remove special quotes, connectors, and URL characters
            // preceded by a space
                '/((?<= )|^)[' . $specialquotes . $urlspacebefore . '\p{Pc}]+/u',
            // Remove dashes preceded by a space, but not followed by a number
                '/((?<= )|^)\p{Pd}+(?![\p{N}\p{Sc}])/u',
            // Remove consecutive spaces
                '/ +/',
            ),
            ' ',
            $text );
}

 function strip_symbols( $text )
        {
            $plus   = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
            $minus  = '\x{2012}\x{208B}\x{207B}';
         
            $units  = '\\x{00B0}\x{2103}\x{2109}\\x{23CD}';
            $units .= '\\x{32CC}-\\x{32CE}';
            $units .= '\\x{3300}-\\x{3357}';
            $units .= '\\x{3371}-\\x{33DF}';
            $units .= '\\x{33FF}';
         
            $ideo   = '\\x{2E80}-\\x{2EF3}';
            $ideo  .= '\\x{2F00}-\\x{2FD5}';
            $ideo  .= '\\x{2FF0}-\\x{2FFB}';
            $ideo  .= '\\x{3037}-\\x{303F}';
            $ideo  .= '\\x{3190}-\\x{319F}';
            $ideo  .= '\\x{31C0}-\\x{31CF}';
            $ideo  .= '\\x{32C0}-\\x{32CB}';
            $ideo  .= '\\x{3358}-\\x{3370}';
            $ideo  .= '\\x{33E0}-\\x{33FE}';
            $ideo  .= '\\x{A490}-\\x{A4C6}';
         
            return preg_replace(
                array(
                // Remove modifier and private use symbols.
                    '/[\p{Sk}\p{Co}]/u',
                // Remove mathematics symbols except + - = ~ and fraction slash
                    '/\p{Sm}(?<![' . $plus . $minus . '=~\x{2044}])/u',
                // Remove + - if space before, no number or currency after
                    '/((?<= )|^)[' . $plus . $minus . ']+((?![\p{N}\p{Sc}])|$)/u',
                // Remove = if space before
                    '/((?<= )|^)=+/u',
                // Remove + - = ~ if space after
                    '/[' . $plus . $minus . '=~]+((?= )|$)/u',
                // Remove other symbols except units and ideograph parts
                    '/\p{So}(?<![' . $units . $ideo . '])/u',
                // Remove consecutive white space
                    '/ +/',
                ),
                ' ',
                $text );
        }

        function strip_numbers( $text )
        {
            $urlchars      = '\.,:;\'=+\-_\*%@&\/\\\\?!#~\[\]\(\)';
            $notdelim      = '\p{L}\p{M}\p{N}\p{Pc}\p{Pd}' . $urlchars;
            $predelim      = '((?<=[^' . $notdelim . '])|^)';
            $postdelim     = '((?=[^'  . $notdelim . '])|$)';
         
            $fullstop      = '\x{002E}\x{FE52}\x{FF0E}';
            $comma         = '\x{002C}\x{FE50}\x{FF0C}';
            $arabsep       = '\x{066B}\x{066C}';
            $numseparators = $fullstop . $comma . $arabsep;
            $plus          = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
            $minus         = '\x{2212}\x{208B}\x{207B}\p{Pd}';
            $slash         = '[\/\x{2044}]';
            $colon         = ':\x{FE55}\x{FF1A}\x{2236}';
            $units         = '%\x{FF05}\x{FE64}\x{2030}\x{2031}';
            $units        .= '\x{00B0}\x{2103}\x{2109}\x{23CD}';
            $units        .= '\x{32CC}-\x{32CE}';
            $units        .= '\x{3300}-\x{3357}';
            $units        .= '\x{3371}-\x{33DF}';
            $units        .= '\x{33FF}';
            $percents      = '%\x{FE64}\x{FF05}\x{2030}\x{2031}';
            $ampm          = '([aApP][mM])';
         
            $digits        = '[\p{N}' . $numseparators . ']+';
            $sign          = '[' . $plus . $minus . ']?';
            $exponent      = '([eE]' . $sign . $digits . ')?';
            $prenum        = $sign . '[\p{Sc}#]?' . $sign;
            $postnum       = '([\p{Sc}' . $units . $percents . ']|' . $ampm . ')?';
            $number        = $prenum . $digits . $exponent . $postnum;
            $fraction      = $number . '(' . $slash . $number . ')?';
            $numpair       = $fraction . '([' . $minus . $colon . $fullstop . ']' .
                $fraction . ')*';
         
            return preg_replace(
                array(
                // Match delimited numbers
                    '/' . $predelim . $numpair . $postdelim . '/u',
                // Match consecutive white space
                    '/ +/u',
                ),
                ' ',
                $text );
        }    
        

?>