<!-- Edit Page -->

<?php
	
	require('header.php');
	$msg = "";
	$_id = "";
	$_title ="";
	$_content = "";
	$index = "";
	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'find':
				$pagename = $_POST['pagename'];
				list($_id, $_title, $_content) = find_page_by_name($pagename);
				$query = $db->query("DELETE FROM occurrence WHERE page_id = '$_id'");
				break;
			case 'edited':
				$edit_id = $_POST['edit_id'];
				$content = $_POST['content'];
				$content = stripcslashes($content);
				$content = mysql_real_escape_string($content);
				$edit_id = mysql_real_escape_string($edit_id);
				$msg = update_page($content, $edit_id);
				$index = Index($edit_id);
				// delete indexes for $_id
				

				// create indexes for $edit_id
				break;
		}
	}	
?>




<link href="../css/typeahead.css" rel="stylesheet">


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
											<div id="the-basics">
  
											<input class="typeahead" type="text" name="pagename" placeholder="Type the page name">
									
										</div>
											
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <script  type="text/javascript" src="../js/typeahead.min.js"></script>

    <script type="text/javascript">
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

<?php $result = get_page_and_id(); ?>
																					
											
var states = [<?php foreach ($result as $res){ 
				echo " '$res[title]',";
			}
		    ?>
];

$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});

</script>

</body>

</html>












