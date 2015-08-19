<?php require('header.php');

	if (isset($_GET['month']) and isset($_GET['year'])) {
		$_month = $_GET['month'];
		$_year = $_GET['year'];
		$_month = $_year."-".$_month;
		$result = $db->query("SELECT url, title FROM page WHERE Time = '$_month'");
		$result = $result->fetchAll();
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
                                    $i =1;
                                    if ($result) {
                                        
                                    	foreach ($result as $row) {
										echo "<h3>$i. <a href=$row[url]>$row[title]</a></h3>\n";
										
										echo "<a href=$row[url]>$row[url]</a>\n";
										$i++;
									} 
                                } else {
                                    echo "<h2>Nothing Found<h2/>";
                                }
                                
						           ?>    
            				
                                 </div><!--//page-row-->                   
                            </article><!--//course-item-->                                              
                        </div><!--//course-wrapper-->
                        <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">     
                                        <!-- Here begin Sidebar -->
                           

                     <div class="widget-main sidebar">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Latest News</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                                <div class="blog-list-post clearfix">
                                    
                                    <div class="blog-list-details">
                                    <?php show_latest_news();?>
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
                                    <?php show_important_link();?>
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
