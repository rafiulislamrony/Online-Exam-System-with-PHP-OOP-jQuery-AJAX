<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exm = new Exam();
?>

<style>
    .adminpanel {
        color: #999;
        margin: 30px auto 0px;
        padding: 10px;
        border: 1px solid #ddd;
    }
</style>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addQue = $exm->addQuestion($_POST);
}
// Get Total Guestion
$total = $exm->getTotalRows(); 
$next = $total +1;
?>

<div class="main">
    <h1>Add Question</h1>
    <?php 
    if(isset($addQue)){
        echo $addQue;
    }
    ?>
    <div class="adminpanel">
        <form action="" method="POST">
            <table class="tbleone">
                <tr>
                    <th>Question No </th>
                    <th>:</th>
                    <th> <input type="number" value="<?php 
                    if(isset($next)){
                        echo $next; 
                    } 
                    ?>" name="questionNo"/> </th>
                </tr>
                <tr>
                    <th>Question </th>
                    <th>:</th>
                    <th> <input type="text" name="question" placeholder="Enter Question" /> </th>
                </tr>
                <tr>
                    <th>Choice One </th>
                    <th>:</th>
                    <th> <input type="text" name="ans1" placeholder="Enter Choice One....." /> </th>
                </tr>
                <tr>
                    <th>Choice Two </th>
                    <th>:</th>
                    <th> <input type="text" name="ans2" placeholder="Enter Choice Two....." /> </th>
                </tr>
                <tr>
                    <th>Choice Three </th>
                    <th>:</th>
                    <th> <input type="text" name="ans3" placeholder="Enter Choice Three....." /> </th>
                </tr>
                <tr>
                    <th>Choice Four </th>
                    <th>: </th>
                    <th> <input type="text" name="ans4" placeholder="Enter Choice Four....." /> </th>
                </tr>
                <tr>
                    <th>Correct No. </th>
                    <th>: </th>
                    <th> <input type="number" name="rightAnswer" /> </th>
                </tr>
                <tr>
                    <th colspan="3"> <input type="submit" value="submit" /> </th>
                </tr>
            </table>
        </form>

    </div>
</div>
<?php include 'inc/footer.php'; ?>