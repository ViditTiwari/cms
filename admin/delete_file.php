<?php 
require('header.php');
//define page title
$title = 'Admin';
$msg ="";
$path = $_SERVER['DOCUMENT_ROOT']."/cms/upload";

if(isset($_POST['delete_file']))
{

    $msg = delete_file($_POST['file_name'], $path);
}



?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Uploaded Files</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <div class="row">            
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete File
                        </div>
                        <!-- /.panel-heading -->

                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Main-Menu</th>
                                            <th>Link</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res=$db->query("SELECT * FROM downloads");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            ?>
                                            <tr>
                                            <td><?php echo $i;?></td>    
                                            <td><?php echo $row['name']; ?></td>
                                            <form action='' method="post">
                                                <input type="hidden" name="file_name" value="<?php echo $row['name']; ?>">
                                                <td><?php echo $row['url']?></td>
                                                <td><button i class="fa fa-times" type="submit" name="delete_file"></i></td>
                                            </form>
                                            <tr>

                                            <?php $i++;} ?>
                                        
                                    </tbody>
                                </table>
                                <?php print_r($msg);?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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

</body>

</html>


