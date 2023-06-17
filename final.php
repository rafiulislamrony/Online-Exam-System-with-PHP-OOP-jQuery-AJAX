<?php include 'inc/header.php'; ?>

<?php
Session::checkSession();
?>

<div class="main">
    <h1>You are done.</h1>
    <div class="starttest" style="text-align:center;"> 
        <p>
           Congrats! You have just complited the test.
        </p>
        <p>
           Final Score: 
           <strong> 
           <?php 
           if(isset($_SESSION['score'])){
            echo $_SESSION['score'];
            unset($_SESSION['score']);
           } else{}
           ?>
           </strong>
        </p>
        
        <a href="viewans.php">View Answer Test</a>
        <a href="starttest.php">Start Again</a>
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