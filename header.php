<?php
require_once('includes/config_new.php'); 

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>College of Vocational Studies</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:700' rel='stylesheet' type='text/css'>-->
    <!-- Global CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="css/font-awesome.css">
    
    
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <link href="css/style-new.css" rel="stylesheet" media="screen">
 
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header">  
            <div class="top-bar">
                <div class="container">              
                   
                    <form class="pull-right search-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search the site...">
                        </div>
                        <button type="submit" class="btn btn-theme">Go</button>
                    </form>         
                </div>      
            </div><!--//to-bar-->
            <div class="header-main container">
                <div class="logo col-md-2 col-sm-2">
                    
                </div><!--//logo-->           
                <div class="col-md-8 col-sm-8">
                    <h1 class="college">College of Vocational Studies</h1> 
                        <h1 class="university">University of Delhi</h1>
                    
                    
                <div class="col-md-2 col-sm-2">
                </div>
                   
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item"><a href="index.html">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Courses <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="courses.html">Course List</a></li>
                                <li><a href="course-single.html">Single Course (with image)</a></li>
                                <li><a href="course-single-2.html">Single Course (with video)</a></li>  
                                <li class="dropdown-submenu">
                                    <a class="trigger" tabindex="-1" href="#">Menu Levels <i class="fa fa-angle-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="#">Submenu Level 2</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="trigger" href="#">Submenu Level 2 <i class="fa fa-angle-right"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Submenu Level 3</a></li>
                                              <li><a href="#">Submenu Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Submenu Level 2</a></li>
                                        <li><a href="#">Submenu Level 2</a></li>
                                    </ul>
                                </li>           
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">News <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="news.html">News List</a></li>
                                <li><a href="news-single.html">Single News (with image)</a></li>   
                                <li><a href="news-single-2.html">Single News (with video)</a></li>          
                            </ul>
                        </li>
                        <li class="nav-item"><a href="events.html">Events</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="team.html">Leadership Team</a></li>
                                <li><a href="jobs.html">Jobs</a></li>
                                <li><a href="job-single.html">Single Job</a></li>
                                <li><a href="gallery.html">Gallery (3 columns)</a></li>
                                <li><a href="gallery-2.html">Gallery (4 columns)</a></li>
                                <li><a href="gallery-3.html">Gallery (2 columns)</a></li>
                                <li><a href="gallery-4.html">Gallery (with sidebar)</a></li>
                                <li><a href="gallery-album.html">Single Gallery</a></li>
                                <li><a href="gallery-album-2.html">Single Gallery (with sidebar)</a></li>
                                <li><a href="faq.html">FAQ</a></li>                                
                                <li><a href="privacy.html">Privacy Policy</a></li> 
                                <li><a href="terms-and-conditions.html">Terms & Conditions</a></li>                   
                            </ul>
                        </li><!--//dropdown-->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Shortcodes <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html"><i class="fa fa-file-text"></i> Typography</a></li>
                                <li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
                                <li><a href="buttons.html"><i class="fa fa-star"></i> Buttons</a></li>
                                <li><a href="components.html"><i class="fa fa-rocket"></i> Components</a></li> 
                                <li><a href="icons.html"><i class="fa fa-heart"></i> Icons</a></li>                                                 
                            </ul>
                        </li><!--//dropdown-->
                        <li class="nav-item"><a href="contact.html">Contact</a></li>
                    </ul><!--//nav-->
                    
                </div><!--//navabr-collapse-->

            </div><!--//container-->
        </nav><!--//main-nav-->
        
        