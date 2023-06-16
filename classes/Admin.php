<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '../lib/Database.php');
include_once($filepath . '../lib/Session.php');
include_once($filepath . '../helpers/Format.php');
 

//Admin Classs

class Admin{

    private $db;
    private $fm;

    function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }

    public function getAdminData($data){

    }



}










?>