<?php require('header.php');
    $msg = "";
    $_id ="";
    $_title = "";
    $_content = "";
    
    if (isset($_GET['page'])) {
            $page_url= htmlspecialchars($_GET['page']);
            list($_id, $_title, $_content) = find_page_by_url($page_url);
        }   
    if (isset($_GET['submenu']) and isset($_GET['menu'])) {
       $page_url= $_GET['menu']."/".$_GET['submenu'];
       $page_url = htmlspecialchars($page_url);
       list($_id, $_title, $_content) = find_page_by_url($page_url);
    }

?>
 <!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                
                <div class="page-content">
                    <div class="row page-row">
                        <div class="course-wrapper col-md-8 col-sm-8">    
                        <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left"><?php echo $_title;?></h1>
                    
                </header>                      
                            <article class="course-item">
                              
                                <div class="page-row">
                                    <p><?php echo $_content;?></p>
                                 </div>                   
                            </article><!--//course-item-->                                              
                        </div><!--//course-wrapper-->
                        
                        <div class="col-md-4 col-sm-4 ">     
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
