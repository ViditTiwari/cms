<!-- View Page -->

<?php
	//define page title

	require('header.php');
	$title = 'Admin'; 
	

	
?>

<link href="../css/dataTables.bootstrap.css" rel="stylesheet">
<link href="../css/dataTables.responsive.css" rel="stylesheet">

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Pages</h1>
                    
                <!-- /.col-lg-12 -->
            </div>
            <div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pages Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Page Number</th>
                                            <th>Page Title</th>
                                            <th>Page URL</th>           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php

                                    	$res=$db->query("SELECT * FROM page");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>    
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['url']; ?></td>
                                            
                                                
                                            </tr>

                                            <?php $i++;} ?>
                                        
                                            
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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

   <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>