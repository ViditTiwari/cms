<?php
	require_once('../includes/config.php'); 
	require_once('functions.php');
	require('header.php');
	$msg = "";

	if (isset($_POST['action']) == 'delete') {
		$id = $_POST['post'];
		$msg = delete_page($id, $db);
	}	
?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Delete Page</h1>
                    	<div class="row">
                    		<form  role="form" method="post" action="">
			            		<div class="col-lg-4">
									<input type="hidden" class="form-control" name="action" value="delete">	
									<?php $result = get_page_and_id($db); ?>
									<select class='form-control' name=post value=''>											
										<?php foreach ($result as $res){ 
											echo "<option class='form-control' value=$res[id]>$res[title]</option>";
										}
										?>
									</select>
								</div>
			<!-- /.col-lg-4 -->
						<div class="col-lg-8">
							<input type="submit" class="btn btn-success" name="submit" value="Delete">
							<h4><?php echo $msg;?></h4>
						</div>
							</form>
						</div>
				</div>
			</div>
</div>

