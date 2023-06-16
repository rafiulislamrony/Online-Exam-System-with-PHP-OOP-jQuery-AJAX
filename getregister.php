<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/classes/User.php');
$usr = new User();
 
$userregi = $usr->userResgistration($_POST);
?>