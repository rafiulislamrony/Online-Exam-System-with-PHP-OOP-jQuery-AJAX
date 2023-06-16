<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/User.php');
$usr = new User();
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminData = $ad->getAdminData($_POST);
}

?>

<style>
    a{
        text-decoration: none;
    }
</style>

<div class="main">
    <h1>Admin Panel</h1>

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
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['name'];?> </td>
                        <td><?php echo $result['username'];?></td>
                        <td><?php echo $result['email'];?></td>
                        <td>

                            <a href="dis=<?php echo $result['userid'];?>" onclick="return confirm('Are you sure to Disable?')">Disable</a>||
                             
                            <a href="ena=<?php echo $result['userid'];?>" onclick="return confirm('Are you sure to Enable?')">Enable</a>||
                             
                            <a href="del=<?php echo $result['userid'];?>" onclick="return confirm('Are you sure to Remove?')">Remove</a>
                             
                        </td>
                    </tr>

             <?php }  } ?>

        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
