<?php
//include config
require_once('../includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: admin.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($user->login($username,$password)){ 
        $_SESSION['username'] = $username;
        header('Location: admin.php');
        exit;
    
    } else {
        $error[] = 'Wrong username or password or your account has not been activated.';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello Admin</title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>

body{
    margin-top: 15px;
    padding-top: 15px;
}

.panel-title{
    text-align: center;
}
}

</style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Hello Admin, Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <?php


                                //check for any errors
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<p class="bg-danger">'.$error.'</p>';
                                    }
                                }

                                if(isset($_GET['action'])){

                                    //check the action
                                    switch ($_GET['action']) {
                                        case 'active':
                                            echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
                                            break;
                                        case 'reset':
                                            echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                            break;
                                        case 'resetAccount':
                                            echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
                                            break;
                                    }

                                }

                                
                                ?>
                                <div class="form-group">
                                    
                                    <input class="form-control" id="username" name="username" required="required" type="text" placeholder="myusername"  autofocus value="<?php if(isset($error)){ echo $_POST['username']; } ?>"/>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
