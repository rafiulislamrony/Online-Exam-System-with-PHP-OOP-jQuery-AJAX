<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php'); 
include_once($filepath . '/../helpers/Format.php');


//Admin Classs

class User{ 
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
 
    public function getAdminData($data)
    {
        $adminname = $this->fm->validation($data['adminUser']);
        $adminpassword = $this->fm->validation($data['adminPass']);

        $adminname = mysqli_real_escape_string($this->db->link, $adminname);
        $adminpassword = mysqli_real_escape_string($this->db->link, md5($adminpassword));

        // if (empty($adminname) || empty($adminpassword)) {
        //     $message = "<span class='error'>Field Must not be Empty!</span>";
        //     return $message;
        // } else {
        //     $query = "SELECT * FROM tbl_admin WHERE adminUser='$adminname' AND adminPass='$adminpassword' ";
        //     $result = $this->db->select($query);

        //     if ($result != false) {
        //         $value = $result->fetch_assoc();
        //         Session::init();
        //         Session::set("adminLogin", true);
        //         Session::set("adminUser", $value['adminUser']);
        //         Session::set("adminId", $value['adminId']);
        //         header("Location:Index.php");
        //     } else {
        //         $message = "<span class='error'>Username or password not match.</span>";
        //         return $message;
        //     }
        // }
    }  

    public function getUserData(){
        $query = "SELECT * FROM tbl_user ORDER BY userid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function disableUser($userid){
        $query = "UPDATE tbl_user 
        SET
        status = '1'
        WHERE userid ='$userid'";
        $result = $this->db->update($query);
        if($result){
            $message = "<span class='success'>User Disable.</span>"; 
            return $message ; 
        } else{
            $message = "<span class='success'>User not Disable.</span>";
            return $message;
        }
    }
    public function enableUser($userid){
        $query = "UPDATE tbl_user 
        SET
        status = '0'
        WHERE userid ='$userid'";
        $result = $this->db->update($query);
        if($result){
            $message = "<span class='success'>User Enable.</span>"; 
            return $message ; 
        } else{
            $message = "<span class='success'>User not Enable.</span>";
            return $message;
        }
    }
    public function deleteUser($userid){
        $query = "DELETE FROM tbl_user WHERE userid ='$userid'";
        $result = $this->db->delete($query);
        if($result){
            $message = "<span class='success'>User Deleted Successfully.</span>"; 
            return $message ; 
        } else{
            $message = "<span class='success'>User not Deleted.</span>"; 
            return $message;
        }
    }



} 
?>