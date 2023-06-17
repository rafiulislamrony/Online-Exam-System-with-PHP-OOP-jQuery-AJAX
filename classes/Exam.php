<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');


//Admin Classs

class Exam
{
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addQuestion($data)
    {
        $questionNo = $this->fm->validation($data['questionNo']);
        $question = $this->fm->validation($data['question']);
        $ans1 = $this->fm->validation($data['ans1']);
        $ans2 = $this->fm->validation($data['ans2']);
        $ans3 = $this->fm->validation($data['ans3']);
        $ans4 = $this->fm->validation($data['ans4']);
        $rightAnswer = $this->fm->validation($data['rightAnswer']);

        $answer = array();
        $answer[1] = $ans1;
        $answer[2] = $ans2;
        $answer[3] = $ans3;
        $answer[4] = $ans4;

        $questionNo = mysqli_real_escape_string($this->db->link, $questionNo);
        $question = mysqli_real_escape_string($this->db->link, $question);
        $rightAnswer = mysqli_real_escape_string($this->db->link, $rightAnswer);
 
        $query = "INSERT INTO tbl_question(questionNo, question) values('$questionNo', '$question')";
        $insert_row = $this->db->insert($query);

        if($insert_row){ 
 
            foreach($answer as $key => $value){ 
                if($value != ''){
                    if($rightAnswer == $key){
                        $rquery = "INSERT INTO tbl_answer(questionNo, rightAnswer, answerName) values('$questionNo', '1', '$value')"; 
                    }else{
                        $rquery = "INSERT INTO tbl_answer(questionNo, rightAnswer, answerName) values('$questionNo', '0', '$value')";
                    }
                    $result = $this->db->insert($rquery);
                    if($result){
                        continue;
                    }else{
                        die('Errror...');
                    }
                } else{
                    $message = "<span class='error'>Field Must not be Empty.</span>";
                    return $message; 
                }
            }
            $message = "<span class='success'>Question Added Successfully.</span>";
            return $message; 
         } 
    }

    public function getQueByOrder()
    {
        $query = "SELECT * FROM tbl_question ORDER BY questionNo ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function deleteQuestion($quesNo)
    {
        $tables = array("tbl_question", "tbl_answer");
        foreach ($tables as $table) {
            $query = "DELETE FROM $table WHERE questionNo='$quesNo'";
            $result = $this->db->delete($query);
        }
        if ($result) {
            $message = "<span class='success'>Question Deleted Successfully.</span>";
            return $message;
        } else {
            $message = "<span class='success'>Question not Deleted.</span>";
            return $message;
        }
    }
    public function getTotalRows()
    {
        $query = "SELECT * FROM tbl_question";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;
    }

    public function getQuestion()
    {
        $query = "SELECT * FROM tbl_question";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }
    public function getQuestionByNumber($number)
    {
        $query = "SELECT * FROM tbl_question WHERE questionNo='$number' ";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }
    public function getAnswer($number)
    {
        $query = "SELECT * FROM tbl_answer WHERE questionNo='$number' ";
        $result = $this->db->select($query); 
        return $result;
    }


}
?>