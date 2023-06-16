<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/User.php');
$usr = new User();
?>
<?php
if (isset($_GET['dis'])) {
    $disableId = (int)$_GET['dis'];
    $disableId = $fm->validation($disableId);
    $disableId = mysqli_real_escape_string($db->link, $disableId); 
    $disUser = $usr->disableUser($disableId); 
} 
if (isset($_GET['ena'])) {
    $enableId = (int)$_GET['ena'];
    $enableId = $fm->validation($enableId);
    $enableId = mysqli_real_escape_string($db->link, $enableId); 
    $enaUser = $usr->enableUser($enableId); 
} 
if (isset($_GET['del'])) {
    $delId = (int)$_GET['del'];
    $delId = $fm->validation($delId);
    $delId = mysqli_real_escape_string($db->link, $delId); 
    $deleteUser = $usr->deleteUser($delId); 
} 
?>

 
<div class="main">
    <h1>Manage User</h1>
    <?php  
    if(isset($disUser)){
        echo $disUser;
    }
    if(isset($enaUser)){
        echo $enaUser;
    }
    if(isset($deleteUser)){
        echo $deleteUser;
    }
    ?>

    <div class="manageuser">

        <table class="tblone">
            <tr>
                <th>No</th>
                <th>Name </th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
            $userData = $usr->getUserData();

            if ($userData) {
                $i = 0;
                while ($result = $userData->fetch_assoc()) {
                    $i++; ?>

                    <tr>
                        <td>
                            <?php  
                            if($result['status'] == '1'){
                                echo "<span class='error'>".$i."</span>";
                            }else{
                                echo $i;
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $result['name']; ?>
                        </td>
                        <td>
                            <?php echo $result['username']; ?>
                        </td>
                        <td>
                            <?php echo $result['email']; ?>
                        </td>
                        <td>

                            <?php
                            if ($result['status'] == '0') { ?>
                                <a href="?dis=<?php echo $result['userid']; ?>"
                                    onclick="return confirm('Are you sure to Disable?')">Disable</a>||
                            <?php } else { ?>
                                <a href="?ena=<?php echo $result['userid']; ?>"
                                    onclick="return confirm('Are you sure to Enable?')">Enable</a>||
                            <?php } ?>

                            <a href="?del=<?php echo $result['userid']; ?>"
                                onclick="return confirm('Are you sure to Remove?')">Remove</a>
                        </td>
                    </tr>

                <?php }
            } ?>

        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
<style>
    a {
        text-decoration: none;
    }
    
</style>