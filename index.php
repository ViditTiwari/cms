<?php require('header.php');
?>

    <div class="container">
        <div class="row">
            
            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">
            <div class="col-md-12">
                <div class="main-slideshow">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="images/principal.JPG" />
                                <div class="slider-caption">
                                    <h2><a href="blog-single.html">Dr. Inderjeet Dagar</a></h2>
                                    <p>Principal of College of Vocational Studies</p>
                                </div>
                            </li>
                            <li>
                                <img src="images/college.jpg" />
                                <div class="slider-caption">
                                    <h2><a href="blog-single.html">College Building</a></h2>
                                    <p>Beautiful surrounding! </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/annual.jpg" />
                                <div class="slider-caption">
                                    <h2><a href="blog-single.html">Vocational Annual Day</a></h2>
                                    <p>Annual Day celebrations!</p>
                                </div>
                            </li>
                        </ul> <!-- /.slides -->
                    </div> <!-- /.flexslider -->
                </div> <!-- /.main-slideshow -->
            </div> <!-- /.col-md-12 -->
        </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="widget-item-new">
                        <div class="border"></div>
                        <div class="widget-item">
                         
                            

                            <h2 class="welcome-text">Introduction</h2>

    

                            <p><strong>Founded: 1972</strong></br></br>The College Of Vocational Studies, a maintained institution of Delhi University, was founded in 1972. It makes a small beginning in a great change in the field of higher education making it more meaningful and diversified. Through this experiment, we seek to break new ground by bridging the gap between static university education and the social environment.</br></br>Vivamus mattis nibh vitae dui egestas posuere. Maecenas a est at enim blandit interdum. Cras eget ipsum ac nunc tristique tincidunt sit amet nec quam. Vivamus sed suscipit enim, et dignissim tellus.</p>
                        </div> <!-- /.widget-item -->
                    </div>
                   
                    
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

                <div class="row">
                    
                    <!-- Show Latest Blog News -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            
                        <div class="border"></div>
                        
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
                    </div> <!-- /col-md-6 -->

                    <!-- Show Latest Events List -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            
                        <div class="border"></div>
                        
                            <div class="widget-main-title">
                                <h4 class="widget-title">Events</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class='widget-inner'>
                                <?php show_event()?>
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /.col-md-6 -->
                    
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
            
            <!-- Here begin Sidebar -->
            
            <div class="col-md-4">
            <div class="widget-main">
                    <div class="border"></div>
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
                    <div class="border"></div>
                    <div class="widget-main-title">
                        <h4 class="widget-title">Principal's Desk</h4>
                    </div>
                    <div class="widget-inner">
                        <div id="slider-testimonials">
                            <ul>
                                <li>
                                    <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="images/pr.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Dr. Inder Jeet Dagar</h5>
                                <p class="small-text">Sed ut lectus ac lacus molestie posuere non tincidunt arcu.</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                                </li>
                                <li>
                                    <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="images/prof/prof1.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                                <p class="small-text">Sed ut lectus ac lacus molestie posuere non tincidunt arcu.</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                                </li>
                                <li>
                                    <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="images/prof/prof1.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                                <p class="small-text">Sed ut lectus ac lacus molestie posuere non tincidunt arcu.</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                                </li>
                            </ul>
                            <a class="prev fa fa-angle-left" href=""></a>
                            <a class="next fa fa-angle-right" href=""></a>
                        </div>
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->

                <div class="widget-main">
                    <div class="border"></div>
                    <div class="widget-main-title">
                        <h4 class="widget-title">Our Gallery</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="gallery-small-thumbs clearfix">
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery1.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/trophy.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery2.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/trophy1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery3.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery4.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery5.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image3.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery6.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image6.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery7.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image4.jpg" alt="" />
                                </a>
                            </div>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="images/gallery/gallery8.jpg" title="Gallery Tittle One">
                                    <img src="images/gallery/image5.jpg" alt="" />
                                </a>
                            </div>
                        </div> <!-- /.galler-small-thumbs -->
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->

            </div>
        </div>
    </div>
</div>

<?php require('footer.php');
?>
