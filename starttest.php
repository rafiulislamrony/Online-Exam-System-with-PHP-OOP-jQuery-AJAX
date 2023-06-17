<?php include 'inc/header.php'; ?>

<?php
Session::checkSession();
$question = $exm->getQuestion(); 
$total =  $exm->getTotalRows(); 
?>

<div class="main">
    <h1>Welcome to Online Exam - Start Now</h1>
    <div class="starttest">
        <h2>
            Start Your Exam
        </h2>
        <p>
            This is multiple choice quiz to test your knowladge.
        </p> 
        <ul>
            <li> <strong>Number of question:</strong><?php echo $total; ?> </li> 
            <li> <strong>Question type:</strong>Multiple Choice </li>
        </ul> 
        <a href="test.php?q=<?php echo $question['questionNo']; ?>">Start Test</a>
    </div> 
</div>
<?php include 'inc/footer.php'; ?>
<style>
    .starttest{
       border: 1px solid #f4f4f4;
       margin: 0 auto;
       padding: 20px;
       width: 590px;
    }
    .starttest h2{
        border: 1px solid #ddd;
        font-size: 20px;
        margin-bottom: 10px;
        padding: 10px;
        text-align: center;
    }
  
    .starttest ul{
        margin: 0px;
       padding: 0px;
       list-style: none;
    }
    .starttest li{
       margin-top: 5px;
    } 
    .starttest a {
       width: 100%;
       border: 1px solid #4444443b;
       background: #ddd;
       color: #000;
       display: block;
       text-align: center;
       padding: 7px 10px 7px;
       margin-top: 10px;
       text-decoration: none;
       transition: 0.2s;
    }
    .starttest a:hover{
        background: #b9b9b9; 
    }
</style>