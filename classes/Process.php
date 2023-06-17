<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/Session.php");
include_once($filepath . '/../lib/Database.php'); 
include_once($filepath . '/../helpers/Format.php');


//Admin Classs

class Process{ 
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    } 

    public function processData($data){
        $selectedAns = $this->fm->validation($data['ans']); 
        $number      = $this->fm->validation($data['number']);   
        $number      = mysqli_real_escape_string($this->db->link, $number);
        $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);

        $next = $number+1; 

        if(!isset($_SESSION['score'])){
            $_SESSION['score'] = '0';

        }
        $total = $this->getTotal(); 
        $right = $this->rightAnswer($number);  
        if($right == $selectedAns){
            $_SESSION['score']++;
        }
        if($number == $total){
            header("Location: final.php");
            exit();
        }else{
            header("Location: test.php?q=".$next);
            exit();
        }

    }

    private function rightAnswer($number){
        $query = "SELECT * FROM tbl_answer WHERE questionNo='$number' AND rightAnswer='1' "; 
        $getData = $this->db->select($query)->fetch_assoc(); 
        $result = $getData['id'];  
        return $result; 
    }
    private function getTotal(){
        $query = "SELECT * FROM tbl_question";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;  
    }


} 
?>