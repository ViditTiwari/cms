<?php require('header.php');
?>
<?php
	
	if (isset($_POST['submit'])) {
		if (isset($_POST['keyword'])) {
			$keyword = addslashes($_POST['keyword']);
			$list = explode(" ", $keyword);
			$flag = 0;
			$KEYWORD = "";
			for ($i=0; $i < count($list); $i++) { 
				$in_database = $db->query("SELECT word_word FROM word WHERE word_word = \"$list[$i]\"");
				$in_database = $in_database->fetchAll();
				foreach ($in_database as $key) {
					if ($key['word_word']) {
						$flag = 1;
						$KEYWORD = $list[$i];
					} else {
						$flag =0;
					}
				}
			}

			if ($flag = 1) {
			$result = $db->query(" SELECT p.url AS url,
									p.contents AS content,
									p.title AS title,
									COUNT(*) AS occurrences
									FROM page p, word w, occurrence o
									WHERE p.id = o.page_id AND 
									w.word_id = o.word_id AND 
									w.word_word = \"$KEYWORD\"
									GROUP BY p.id
									ORDER BY occurrences DESC");
			$result = $result->fetchAll();
			// echo "<h2>Search results for '".$_POST['keyword']."':</h2>\n";
			
		} 
		}
	}

?>
 <div class="content container">
            <div class="page-wrapper">
                <div class="page-content">
                    <div class="row page-row">
                        <div class="course-wrapper col-md-8 col-sm-7">                         
                            <article class="course-item">
                                <div class="page-row">
                                <?php 
                                    if ($keyword =="") {
                                        echo "<h2>Please Enter a keyword to search for...</h2>";
                                    } else {
                                	$i =1;
                                    if ($result) {
                                        echo "<h2>You searched for '$keyword':</h2>";
                                    	foreach ($result as $row) {
										$string = strip_tags($row['content']);
										echo "<h3>$i. <a href=$row[url]>$row[title]</a></h3>\n";
										echo "(occurrences: $row[occurrences])<br><br>\n";
										if (strlen($string) > 100) {
											$stringCut = substr($string, 0, 100);
											$string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
										}
										echo "<p>$string........<a href=$row[url]>Read More</a></p>";
										// echo "<a href=$row[url]>$row[url]</a>\n";
										$i++;
									} 
                                } else {
                                    echo "<h2>Nothing found for '$keyword'<h2/>";
                                }
                                }
						           ?>    
            				
                                 </div><!--//page-row-->                   
                            </article><!--//course-item-->                                              
                        </div><!--//course-wrapper-->
                        <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">     
                                        <!-- Here begin Sidebar -->
            

                <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Latest News</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Graduate Open Day at the Ruskin</a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#">12 January 2014</a></span> with <span><a href="#">3 comments</a></span></p>
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                <div class="blog-list-post clearfix">
                                   
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Visiting Artists: Giles Bailey</a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#">12 January 2014</a></span> with <span><a href="#">3 comments</a></span></p>
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                 <div class="blog-list-post clearfix">
                                   
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Visiting Artists: Giles Bailey</a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#">12 January 2014</a></span> with <span><a href="#">3 comments</a></span></p>
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                 
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Workshop: Theories of the Image</a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#">12 January 2014</a></span> with <span><a href="#">3 comments</a></span></p>
                                    </div>
                                </div> <!-- /.blog-list-post -->
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->

                         <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Important Links</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Graduate Open Day at the Ruskin</a></h5>
                                        
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Graduate Open Day at the Ruskin</a></h5>
                                        
                                    </div>
                                </div> <!-- /.blog-list-post -->
                               

                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Visiting Artists: Giles Bailey</a></h5>
                                       
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Visiting Artists: Giles Bailey</a></h5>
                                       
                                    </div>
                                </div> <!-- /.blog-list-post -->
                                <div class="blog-list-post clearfix">
                                   
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a href="blog-single.html">Workshop: Theories of the Image</a></h5>
                                        
                                    </div>
                                </div> <!-- /.blog-list-post -->
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->

                      </div>
                    </div><!--//page-row-->
                </div><!--//page-content-->
            </div><!--//page--> 
        </div><!--//content-->
    </div><!--//wrapper-->
<?php require('footer.php');
?>
		

