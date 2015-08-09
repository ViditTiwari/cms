<?php
	
	require('header.php');
	$msg = "";
  $_id = "";
	if (isset($_POST['action']) == 'delete') {
		$title = $_POST['title'];
		$query = $db->query("SELECT * FROM page WHERE title = '$title'");
    foreach ($query->fetchAll() as $row) {
      $_id = $row['id'];
    }
    $query = $db->query("DELETE FROM occurrence WHERE page_id = '$_id'");
    $msg = delete_page($title);
	}	
?>



<link href="../css/typeahead.css" rel="stylesheet">


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Delete Page</h1>
                    	<div class="row">
                    		<form  role="form" method="post" action="">
			            		<div class="col-lg-6">
									<input type="hidden" class="form-control" name="action" value="delete">	
									<div class="form-group">
											<div id="the-basics">
  
											<input class="typeahead" type="text" name="title" placeholder="Type the page name">
									
										</div>
											
										</div>
								</div>
			<!-- /.col-lg-4 -->
						<div class="col-lg-6">
							<input type="submit" class="btn btn-success" name="submit" value="Delete">
							<h4><?php echo $msg;?></h4>
						</div>
							</form>
						</div>
				</div>
			</div>
</div>


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
