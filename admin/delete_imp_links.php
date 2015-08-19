<?php 
require('header.php');
//define page title
$title = 'Admin';

if(isset($_POST['delete_imp_links_page']))
{

    delete_imp_links_page($_POST['url']);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Delete Important Links</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <div class="row">            
                
                        <!-- /.panel-heading -->
                    
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Important Links
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th>Page Title</th>
                                            <th>Page URL</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res=$db->query("SELECT * FROM imp_links");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            
                                                ?>
                                                <tr>
                                                <td><?php echo $i;?></td>    
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['url']; ?></td>
                                                <form action='' method="post">
                                                     <input type="hidden" name="url" value="<?php echo $row['url']; ?>">
                                                     <td><button i class="fa fa-times" type="submit" name="delete_imp_links_page"></i></td>
                                                </form>
                                                 <tr>
                                                
                                                <?php
                                                $i++;
                                            
                                             } ?>
                                    </tbody>
                                </table>
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


