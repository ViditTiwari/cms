<?php require('../includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 

//define page title
$title = 'Admin';

?>

<?php require('header.php');
?>

