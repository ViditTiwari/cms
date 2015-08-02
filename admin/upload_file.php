<?php
	
	require('header.php');
	$link ="";
	$name = "";
	$location = "";
	$size = 0;
	$path ="";
	$ext =""; $errors = array();	
	if (isset($_FILES['file'])) {

			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$location = $_FILES['file']['tmp_name'];
			$path = $_SERVER['DOCUMENT_ROOT']."/cms/upload";
			 // print_r($_FILES['file']);
			$extensions = array("pdf", "doc", "xls", "doc", "docx", "odt", "rtf",
								 "tex", "txt", "wpd", "wps", "csv", "ppt", "pptx", 
								 "tar", "zip", "xlr", "xlsx", ".7z", "gz", "pkg",
								 "rar", "zipx" );      
			$ext = explode('.', $name);
			$ext = strtolower(end($ext));
			
			if (in_array($ext, $extensions)==false) {
				$errors[] = "extensions not allowed";
			}

			if ($size > 5242880) {
				$errors[] = "File size must be less than 5 MB";
			}

			if (empty($errors)==true) {
				$link = check_file_name($name, $location, $path, $size, $ext);
			
			} else {
				 print_r($errors);
			}

		}

			

	
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Files</h1>
                    <div class="row">
                    <form  role="form" method="post" action="" enctype="multipart/form-data">
			            <div class="col-lg-12">
	          	           	 	<div class="form-group col-lg-4">
	          	           	 		<input type="file" name="file" /> 
	          	           	 		
									<br>																	
								<div>
									<button  type="submit" class="btn btn-success" name="submit" >Upload</button>	
								</div>
								<br>
									<?php echo "Max. size 5 MB"?> 
									<br>						
																										
						</div>
					</form> 	
						 <?php  if($link){ $link = "URL: ".$link; print_r($link);}?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>