<!-- Edit Page -->

<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	require('header.php');
	$msg = "";
	$_id = "";
	$_title ="";
	$_content = "";

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'find':
				$id = $_POST['post'];
				list($_id, $_title, $_content) = find_page_by_id($id, $db);
				break;
			case 'edited':
				$edit_id = $_POST['edit_id'];
				$content = $_POST['content'];
				$content = stripcslashes($content);
				$content = mysql_real_escape_string($content);
				$edit_id = mysql_real_escape_string($edit_id);
				$msg = update_page($content, $edit_id, $db);
				break;
		}
	}	
?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Page</h1>
			           <div class="row">
                    		<form  role="form" method="post" action="">
			            		<div class="col-lg-8">
									<h4>Choose Page to Edit</h4>
										<input type="hidden" name="action" value="find">	
										<div class="form-group">
											<?php $result = get_page_and_id($db); ?>
											<select class='form-control' name=post value=''>											
											<?php foreach ($result as $res){ 
												echo "<option class='form-control' value=$res[id]>$res[title]</option>";
											}
											 ?>
											</select>
											
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success" name="submit" value="Edit">
										</div>
						</form>

						<form role="form" method="post"  action="">
								<h4>Page title</h4>
								<div class="form-group">
									<input type="text" class="form-control" name="title" value="<?php echo $_title;?>" readonly /> 
								</div>
								<div class="form-group">
								    <textarea name="content" style="cursor:text;" rows="20" cols="40"><?php echo $_content;?></textarea>
							    </div>
							    <input type="hidden" name="edit_id" value="<?php echo $_id; ?>">
							    <input type="hidden" name="action" value="edited">						   
						
						</div>
						<!-- /.col-lg-8 -->
						<div class="col-lg-4">
							<button type="submit" class="btn btn-success" name="submit2" >Update Page</button>
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













