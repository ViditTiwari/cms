<!-- Add Page -->

<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	require('header.php');
	//if not logged in redirect to login page
	if(!$user->is_logged_in()){ header('Location: index.php'); } 

	//define page title
	$title = 'Admin'; 
	$msg ="";

	if (isset($_POST['submit'])) {
		$Title = $_POST['Title'];
		$content = $_POST['content'];
		$content = stripcslashes($content);
		$content = mysql_real_escape_string($content);
		$Title = mysql_real_escape_string($Title);

		if($Title and $content){
			$msg = add_page($Title, $content, $db); //Call Add page
		} else {
			if(!$Title){
				$msg ="Please Add Title";
			} else if(!$content){
				$msg ="Please Some content";
			}
		}
	}
	
?>

<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce.js"></script>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Page</h1>
                    <div class="row">
                    <form  role="form" method="post" action="">
			            <div class="col-lg-9">
			          		<h3>Page Title</h3>
					            	 	<div class="form-group">
											<input type="text" class="form-control " name="Title" placeholder="Page title" /> 
										</div>
										<div class="form-group">
											<h4>Page Content</h4>
										</div>
										<div class="form-group">
									    	<textarea  class="form-control" name="content" style="cursor:text;" rows="20" cols="40"></textarea>
										</div>									  
										 
						</div>
						<!-- /.col-lg-9 -->
						<div class="col-lg-3">
							 <button type="submit" class="btn btn-success" name="submit" >Publish</button>
							  <h4><?php echo $msg ;?></h4>
							 
						</div>
					</form>
						
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


