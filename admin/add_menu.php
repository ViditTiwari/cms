<?php 
//define page title
require('header.php');
$title = 'Admin';
$msg = $sub_msg = "";
if(isset($_POST['add_main_menu']))
    {   
        $link = strtolower($_POST['mn_link']);
        $link = str_replace(' ', '-', $link);
        // page for mn_link exist or not.
        
        if(page_exist($link)) {
       // mn_link unique or not
        
            if(check_mn($link)) {
                 add_main_menu($_POST['menu_name'], $link);
                 $msg = "Menu Added";
             } else {
                $msg = "menu link already exist";
                } 
        } else {
                
                if (check_dropdown($link)) {
                    if (check_menu_name($_POST['menu_name'])) {
                        add_main_menu($_POST['menu_name'], $link);
                        $msg = "Menu Added";    
                    } else {
                        $msg = "Menu with this name already exist!";
                    }
                    
                } else {
                    $msg = "Type #, if you want to create submenu also";
                }
              
        }
    }
        
if(isset($_POST['add_sub_menu'])) {

    $link = strtolower($_POST['sub_menu_link']);
    $link = str_replace(' ', '-', $link);
    // page for sub_menu_link exist or not.

    if(page_exist($link)) {
       // sub_menu_link unique or not

            if(check_mn($link)) {
                add_sub_menu($_POST['parent'], $_POST['sub_menu_name'], $link);
                $sub_msg = "Sub Menu Added";
            } else {
                $sub_msg = "sub menu link already exist";
                } 
        } else {
               $sub_msg ="No page for this URL, first create a page";
        }
   
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
                                        <?php echo $msg;?>
                                       
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
                                        <?php echo $sub_msg;?>
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


