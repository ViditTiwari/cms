<!-- Footer Block 1 -->

<?php
  
  require('header.php');
  $link ="";
  $name = "";
  $location = "";
  $size = 0;
  $path ="";
  $ext ="";
  $msg1 = $msg2='';
  $new=0;


  if (isset($_POST['action'])) {
    
    $pagename = $_POST['pagename'];
    $description = $_POST['description'];
    if(isset($_POST['new']))
    $new = $_POST['new'];
    $msg1= check_news_page($pagename, $description, $new);
     

    } 

   $errors = array();  
  if (isset($_FILES['file'])) {

      $name = $_FILES['file']['name'];
      $size = $_FILES['file']['size'];
      $location = $_FILES['file']['tmp_name'];
      $path = $_SERVER['DOCUMENT_ROOT']."/cms/upload";
            $extensions = array("pdf", "doc", "xls", "doc", "docx", "odt", "rtf",
                 "tex", "txt", "wpd", "wps", "csv", "ppt", "pptx", 
                 "tar", "zip", "xlr", "xlsx", ".7z", "gz", "pkg",
                 "rar", "zipx" );      
      $ext = explode('.', $name);
      $ext = strtolower(end($ext));
      
      if (in_array($ext, $extensions)==false) {
        $errors[] = "extensions not allowed";
      }

      if ($size > 5242880) {

        $errors[] = "File size must be less than 5 MB";
      }

      if (empty($errors)==true) {
        
        $link = check_file_name($name, $location, $path, $size, $ext);
        $msg2= add_news_file($_POST['Title'], $_POST['Description'], $link);
      } else {
         print_r($errors);
      }

    }

      

?>


<link href="../css/typeahead.css" rel="stylesheet">


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Latest News</h1>
                
                 <div class="row">             
                  <div class="col-lg-6">
                 <form  role="form" method="post" action="">
                      
                        <h4><?php echo $msg1;?></h4>
                  <h4>Choose Page to add</h4>
                    <input type="hidden" name="action" value="find">  
                    
                    <div class="form-group">
                     <input class="form-control" type="text" name="description" placeholder="Type the Latest News Description">
                  
                    </div>
                    <div class="form-group">
                      <div id="the-basics">

                      <input class="typeahead" type="text" name="pagename" placeholder="Type the page name">
                  
                    </div>

                    <div class="checkbox">
                    <label><input type="checkbox" name="new" value="1">New</label>
                    </div>
                      
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-success" name="submit" value="Add Page">
                    </div>
            </form>
                        
           </div>

           <div style="margin-top:5px;" class="col-lg-6">
            <form  role="form" method="post" action="" enctype="multipart/form-data">
                        <h4><?php echo $msg2;?></h4>
                  <h4>Add file</h4>
                    <div class="form-group">
                     <input class="form-control" type="text" name="Description" placeholder="Type the Latest News Description">
                  
                    </div>
                    <div class="form-group">
                     <input class="form-control" type="text" name="Title" placeholder="Title">
                  
                    </div>
                    <div class="form-group">
                    <input type="file" name="file" id="control"/> 
                     </div>
                     <div class="form-group">
                       <button id="clear">Clear</button>
                     </div>         
                                                  
                <div>
                  <button  type="submit" class="btn btn-success" name="submit">Upload</button>
                </div>
                <br>
                  <?php echo "Max. size 5 MB"?> 
                 <br>                                                      
          </form>   
             
           </div>
          

            
            
            
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

var control = $("#control");

$("#clear").on("click", function () {
    control.replaceWith( control = control.clone( true ) );
});
</script>


</body>

</html>












