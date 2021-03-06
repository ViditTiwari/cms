<?php require('header.php');
?>
<!-- ******CONTENT****** --> 
        <div class="content container">
            <div class="page-wrapper">
                
                <div class="page-content">
                    <div class="row page-row">
                        <div class="course-wrapper col-md-8 col-sm-8">    
                        <header class="page-heading clearfix">
                    <h1 class="heading-title pull-left">Archives</h1>
                    
                </header>                      
                            <article class="course-item">
                              
                                <div class="page-row">
                                  	<?php show_archive();?>
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