<?php 

//define page title
$title = 'Admin';

if(isset($_POST['add_main_menu']))
{  
   add_main_menu($_POST['menu_name'], $_POST['mn_link']);

}
if(isset($_POST['add_sub_menu']))
{ 
    add_sub_menu($_POST['parent'], $_POST['sub_menu_name'], $_POST['sub_menu_link'] );
    
}
require('header.php');

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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Add Main Menu</h3>
                                    <form role="form" action="" method="post">
                                       
                                        <div class="form-group">
                                            <label>Menu Title</label>
                                            <input class="form-control" placeholder="Menu Title" name="menu_name">
                                        </div>
                                         <div class="form-group">
                                            <label>Menu Link</label>
                                            <input class="form-control" placeholder="Menu Link" name="mn_link">
                                        </div>
                                     
                                       
                                        <button type="submit" class="btn btn-success" name="add_main_menu">Add main menu</button>
                                        
                                       
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h3>Add Sub-Menu</h3>
                                   
                                   <form role="form" action="" method="post">
                                   
                                        <div class="form-group" >
                                            <label>Select Parent Menu</label>
                                            <select class="form-control" name="parent">
                                                
                                                <option selected="selected">Select parent menu</option>
                                                
                                                <?php
                                                
                                                $res=$db->query("SELECT * FROM main_menu1");
                                                while($row=$res->fetch())
                                                {
                                                    ?>
                                                    <option value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['m_menu_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Sub-Menu Title</label>
                                            <input class="form-control" placeholder="Sub-Menu Title" name="sub_menu_name">
                                        </div>
                                         <div class="form-group">
                                            <label>Sub-Menu Link</label>
                                            <input class="form-control" placeholder="Sub-Menu Link" name="sub_menu_link">
                                        </div>                           
                                      
                                       
                                        <button type="submit" name="add_sub_menu" class="btn btn-success">Add Sub-Menu</button>
                                        
                                    </form>
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>


