<?php 
require('header.php');
//define page title
$title = 'Admin';

if(isset($_POST['delete_main_menu']))
{

    delete_main_menu($_POST['menu_name']);
}

if(isset($_POST['delete_sub_menu']))
{

   delete_sub_menu($_POST['sub_menu_name']);
}


?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <div class="row">            
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete Main Menu
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
                                        $res=$db->query("SELECT * FROM main_menu1");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            ?>
                                            <tr>
                                            <td><?php echo $i;?></td>    
                                            <td><?php echo $row['m_menu_name']; ?></td>
                                            <form action='' method="post">
                                                <input type="hidden" name="menu_name" value="<?php echo $row['m_menu_name']; ?>">
                                                <td><?php echo $row['m_menu_link']; ?></td>
                                                <td><button i class="fa fa-times" type="submit" name="delete_main_menu"></i></td>
                                            </form>
                                            <tr>

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

                    
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete Sub-Menu
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Main Menu</th>
                                            <th>Sub Menu</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res=$db->query("SELECT * FROM main_menu1");
                                        $i=1;
                                        while($row=$res->fetch())
                                        {   
                                            $res_pro=$db->query("SELECT * FROM sub_menu WHERE m_menu_id=".$row['m_menu_id']);
                                            
                                            while($pro_row=$res_pro->fetch())
                                            {
                                                ?>
                                                <tr>
                                                <td><?php echo $i;?></td>    
                                                <td><?php echo $row['m_menu_name']; ?></td>
                                                <td><?php echo $pro_row['s_menu_name']; ?></td>
                                                <form action='' method="post">
                                                     <input type="hidden" name="sub_menu_name" value="<?php echo $pro_row['s_menu_name']; ?>">
                                                     <td><button i class="fa fa-times" type="submit" name="delete_sub_menu"></i></td>
                                                </form>
                                                 <tr>
                                                
                                                <?php
                                                $i++;
                                            }
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


