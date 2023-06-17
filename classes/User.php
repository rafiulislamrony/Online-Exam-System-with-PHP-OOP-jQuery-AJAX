<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');

//User Classes
class User
{
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function userResgistration($data)
    {
        $name = $this->fm->validation($data['name']);
        $username = $this->fm->validation($data['username']);
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);

        $name = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, md5($password));

        if (empty($name) || empty($username) || empty($email) || empty($password)) {
            echo "<span class='error'>Field Must not be Empty!</span>";
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='error'>Invalid Email Address.</span>";
            exit();
        } else {
            $checkquery = "SELECT * FROM tbl_user WHERE email='$email'";
            $chkresult = $this->db->select($checkquery);
            if ($chkresult != false) {
                echo "<span class='error'>Email Address Already Exist!</span>";
                exit();
            } else {
                $query = "INSERT INTO tbl_user(name, username, password, email) values('$name', '$username', '$password','$email')";
                $insert_row = $this->db->insert($query);
                if ($insert_row) {
                    echo "<span class='success'>Registration Successfull.</span>";
                    exit();
                } else {
                    echo "<span class='success'>Something Error.</span>";
                    exit();
                }

            }
        }
    }
    public function userLogin($data)
    {
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, md5($password));

        if (empty($email) || empty($password)) {
            echo "empty";
            exit();
        } else {
            $query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                if ($value['status'] == '1') {
                    echo "disable";
                    exit();
                } else {
                    Session::init();
                    Session::set("login", true);
                    Session::set("userid", $value['userid']);
                    Session::set("username", $value['username']);
                    Session::set("name", $value['name']);
                }
            } else {
                echo "error";
                exit();
            }
        }
    }

    public function getUserDataById($userid)
    {
        $query = "SELECT * FROM tbl_user WHERE userid='$userid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getUserData()
    {
        $query = "SELECT * FROM tbl_user ORDER BY userid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function disableUser($userid)
    {

        $query = "UPDATE tbl_user 
        SET
        status = '1'
        WHERE userid ='$userid'";
        $result = $this->db->update($query);
        if ($result) {
            $message = "<span class='success'>User Disable.</span>";
            return $message;
        } else {
            $message = "<span class='success'>User not Disable.</span>";
            return $message;
        }
    }
    public function enableUser($userid)
    {
        $query = "UPDATE tbl_user 
        SET
        status = '0'
        WHERE userid ='$userid'";
        $result = $this->db->update($query);
        if ($result) {
            $message = "<span class='success'>User Enable.</span>";
            return $message;
        } else {
            $message = "<span class='success'>User not Enable.</span>";
            return $message;
        }
    }

    public function updateProfile($userid, $data)
    {
        $name = $this->fm->validation($data['name']);
        $username = $this->fm->validation($data['username']);
        $email = $this->fm->validation($data['email']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);

        if (empty($name) || empty($username) || empty($email)) {
            $message = "<span class='error'>Field Must not be Empty!</span>";
            return $message; 
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "<span class='error'>Invalid Email Address.</span>";
            return $message; 
        } else {
            $query = "UPDATE tbl_user SET name = '$name', username = '$username', email = '$email' WHERE userid ='$userid'";
            $result = $this->db->update($query);
            if ($result) {
                $message = "<span class='success'>Profile Updated.</span>";
                return $message;
            } else {
                $message = "<span class='success'>Profile not Updated.</span>";
                return $message;
            }
        } 
    }


    public function deleteUser($userid)
    {
        $query = "DELETE FROM tbl_user WHERE userid ='$userid'";
        $result = $this->db->delete($query);
        if ($result) {
            $message = "<span class='success'>User Deleted Successfully.</span>";
            return $message;
        } else {
            $message = "<span class='success'>User not Deleted.</span>";
            return $message;
        }
    }


}
?>