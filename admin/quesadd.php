<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
?>

<style>
    .adminpanel {
        color: #999;
        margin: 30px auto 0px;
        padding: 10px;
        border: 1px solid #ddd;
    }
</style>

<div class="main">
    <h1>Add Question</h1>
    <div class="adminpanel">
        <form action="" method="POST">
            <table class="tbleone" >
                <tr>
                    <th>Question No </th>
                    <th>:</th>
                    <th> <input type="number" value="" name="questionNo"/> </th>
                </tr>
                <tr>
                    <th>Question </th>
                    <th>:</th>
                    <th> <input type="text" name="question" placeholder="Enter Question"/> </th>
                </tr> 
                <tr>
                    <th>Choice One </th>
                    <th>:</th>
                    <th> <input type="text" name="ans1" placeholder="Enter Choice One....."/> </th>
                </tr> 
                <tr>
                    <th>Choice Two </th>
                    <th>:</th>
                    <th> <input type="text" name="ans2" placeholder="Enter Choice Two....."/> </th>
                </tr> 
                <tr>
                    <th>Choice Three </th>
                    <th>:</th>
                    <th> <input type="text" name="ans3" placeholder="Enter Choice Three....."/> </th>
                </tr> 
                <tr>
                    <th>Choice Four </th>
                    <th>: </th>
                    <th> <input type="text" name="ans4" placeholder="Enter Choice Four....."/> </th>
                </tr> 
                <tr>
                    <th>Correct No. </th>
                    <th>: </th>
                    <th> <input type="number" name="rightAnswer"/> </th>
                </tr> 
                <tr>
                    <th colspan="3" > <input type="submit" value="submit"/> </th>
                </tr> 
            </table>
        </form>
       
    </div>
</div>
<?php include 'inc/footer.php'; ?>