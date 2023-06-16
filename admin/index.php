<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
?>
 
<style>
  .adminpanel{
    color: #999;
    margin: 30px auto 0px;
    padding: 50px;
    border: 1px solid #ddd; 
  }
</style>

<div class="main">
  <h1>Admin Panel</h1>

  <div class="adminpanel">
    <h2>Welcome to Admin Panel.</h2>
    <br>
    <p>
      You can manage your user and online exam systeam for here....
    </p> 
  </div> 


</div>
<?php include 'inc/footer.php'; ?>