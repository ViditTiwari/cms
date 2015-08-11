<?php
	
	require('header.php');
	$msg = "";
	$old_main_menu = "";
	$old_sub_menu = "";
	$_id = $_id1 = "";
	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'edit_main':
				$old_main_menu = $_POST['main_menu'];
				$_id = find_menu_id($old_main_menu);
				break;
			case 'edit_sub':
			    
				$old_sub_menu= $_POST['sub_menu'];
				
				$_id1 = find_submenu_id($old_sub_menu);
				break;
			case 'update_main':
				$name = $_POST['new_main_name'];
				$edit_id = $_POST['edit_id'];
				$msg = update_mainmenu($name, $edit_id);
				break;
			case 'update_sub':
				$name = $_POST['new_sub_name'];
				$edit_id = $_POST['edit_id'];
				$msg = update_submenu($name, $edit_id);
				# code...
				break;
		}
	}
?>
<link href="../css/typeahead.css" rel="stylesheet">
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Menu</h1>
                </div>               
            </div>
            <!-- /.row -->

        <div class="row">            
                <div class="col-lg-6">
                      <h3> Edit Main Menu</h3>
                      
                        <!-- /.panel-heading -->
                        <form role="form" method="post" action="">
                        			<input type="hidden" class="form-control" name="action" value="edit_main">
									<div class="form-group">
											<div id="the-basics">
  												<input class="typeahead" type="text" name="main_menu" placeholder="Type the menu name">
											</div>
											</div>
											<input type="submit" class="btn btn-success" name="submit" value="Edit">
                        </form>
                        <div>
      					<form role="form" method="post" action="">
      							<input type="hidden" name="edit_id" value="<?php echo $_id; ?>">
      							<input type="hidden" class="form-control" name="action" value="update_main">
      							<div class="form-group">
      								<input class="form-control" type="text" name="new_main_name" value="<?php echo $old_main_menu;?>">
      							</div>
      							<input type="submit" class="btn btn-success" name="submit" value="Update">
											<?php echo $msg;?>
      					</form>
      					</div>
                    </div>

                    <!-- /.panel -->
                

                    
        <div class="col-lg-6">
        	<h3>Edit Submenu</h3>
                <!-- /.panel-heading -->
                       <form role="form" method="post" action="">
                        			<input type="hidden" class="form-control" name="action" value="edit_sub">
									<div class="form-group">
											<div id="the-basics1">
  												<input class="typeahead" type="text" name="sub_menu" placeholder="Type the submenu name">
											</div>
											</div>
											<input type="submit" class="btn btn-success" name="submit" value="Edit">
											
                        </form>
                        <div>
      					<form role="form" method="post" action="">
      							<input type="hidden" name="edit_id" value="<?php echo $_id1; ?>">
      							<input type="hidden" class="form-control" name="action" value="update_sub">
      							<div class="form-group">
      								<input class="form-control" type="text" name="new_sub_name" value="<?php echo $old_sub_menu;?>">
      							</div>
      							<input type="submit" class="btn btn-success" name="submit" value="Update">
											 <?php echo $msg;?>
      					</form>
      					</div>
      

                </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


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

<?php 
	  $result1 = get_sub_menu();
 ?>
																					

var states1 = [<?php foreach ($result1 as $res1){ 
				echo " '$res1[s_menu_name]',";
			}
		    ?>
];


$('#the-basics1 .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states1',
  source: substringMatcher(states1)
});

</script>

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

<?php $result = get_main_menu(); 
	  
 ?>
																					
											
var states = [<?php foreach ($result as $res){ 
				echo " '$res[m_menu_name]',";
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