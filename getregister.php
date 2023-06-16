<?php 
$filepath = realpath(dirname(__FILE__));  
include_once($filepath.'/classes/User.php');
$usr = new User(); 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

    $name     = $_POST['name'];
    $username = $_POST['username'];
    $email    = $_POST['email']; 
    $password = $_POST['password'];
    $userregi = $usr->userResgistration($name,$username, $password, $email); 
   
} 

?>