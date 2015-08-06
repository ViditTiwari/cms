<!-- Footer Block 1 -->

<?php
	
	require('header.php');
	
    $msg='';

	if (isset($_POST['action'])) {
		$footer = $_POST['footer'];
		$pagename = $_POST['pagename'];
		$msg= check_footer_page($footer, $pagename);
		 

		}	
?>




<link href="../css/typeahead.css" rel="stylesheet">


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Footer Block</h1>
			           <div class="row">
                    		<form  role="form" method="post" action="">
			            		<div class="col-lg-8">
			            			<h4><?php echo $msg;?></h4>
									<h4>Choose Page to add</h4>
										<input type="hidden" name="action" value="find">	
										<div class="form-group">
											<select class='form-control' name="footer" value=''>										
											<option class='form-control' value="footer1">Footer 1</option>
											<option class='form-control' value="footer2">Footer 2</option>
											<option class='form-control' value="footer3">Footer 3</option>
											</select>
										</div>
										<div class="form-group">
											<div id="the-basics">

											<input class="typeahead" type="text" name="pagename" placeholder="Type the page name">
									
										</div>
											
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success" name="submit" value="Add Page">
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












