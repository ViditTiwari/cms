<?php
require_once('includes/config_new.php'); 
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang='en' class='ie8'> <![endif]-->  
<!--[if IE 9]> <html lang='en' class='ie9'> <![endif]-->  
<!--[if !IE]><!--> <html lang='en'> <!--<![endif]-->  
<head>
    <title>College of Vocational Studies</title>
    <!-- Meta -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>    
    <link rel='shortcut icon' href='favicon.ico'>  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel='stylesheet' href='/cms/css/bootstrap.min.css'>   
    <!-- Plugins CSS -->    
    <link rel='stylesheet' href='/cms/css/font-awesome.css'>
    <link rel='stylesheet' href='/cms/css/flexslider.css'>
    <link rel='stylesheet' href='/cms/css/prettyPhoto.css'>

    <link href='/cms/css/animate.css' rel='stylesheet' media='screen'>
    <link href='/cms/css/style-new.css' rel='stylesheet' media='screen'>
 
    <!-- Theme CSS -->  
    <link id='theme-style' rel='stylesheet' href='/cms/css/styles.css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
      <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->
</head> 

<body class='home-page'>
    <div class='wrapper'>
        <!-- ******HEADER****** --> 
        <header class='header'>  
            <div class='top-bar'>
                <div class='container'>              
                   
                    <form class='pull-right search-form' role='search' method='post' action='search.php'>
                        <div class='form-group'>
                            <input type='text' class='form-control' name='keyword' placeholder='Search the site...'>
                        </div>
                        <button type='submit' name='submit' class='btn btn-theme'>Go</button>
                    </form>         
                </div>      
            </div><!--//to-bar-->
            <div class='header-main container'>
                <div class='logo col-md-2 col-sm-2'>
                    
                </div><!--//logo-->           
                <div class='col-md-8 col-sm-8'>
                    <h1 class='college'>College of Vocational Studies</h1> 
                        <h1 class='university'>University of Delhi</h1>
                    
                    
                <div class='col-md-2 col-sm-2'>
                </div>
                   
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        
        <!-- ******NAV****** -->
        <nav class='main-nav' role='navigation'>
            <div class='container'>
                <div class='navbar-header'>
                    <button class='navbar-toggle' type='button' data-toggle='collapse' data-target='#navbar-collapse'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class='navbar-collapse collapse' id='navbar-collapse'>
                    <ul class='nav navbar-nav'>
                    <li class='active nav-item'><a href='/cms/index.php'>Home</a></li>
                        <?php nav_menu();?>
                    </ul><!--//nav-->
                  </div><!--//navabr-collapse-->

            </div><!--//container-->
        </nav><!--//main-nav-->
           
               
          
                      