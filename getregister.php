<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php'); 
include_once($filepath . '/../helpers/Format.php');

include_once($filepath . '/../classes/User.php');

$usr = new User();
$db = new Database();
$fm = new Format(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $fm->validation($_POST['name']);
	$username = $fm->validation($_POST['username']);
	$email = $fm->validation($_POST['email']);
	$password = md5($fm->validation($_POST['password']));

    $userregi = $usr->userResgistretion($_POST);

}



?>