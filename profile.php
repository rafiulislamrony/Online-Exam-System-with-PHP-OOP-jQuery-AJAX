<?php include 'inc/header.php'; ?>

<style>
    .profile {
        width: 530px;
        margin: 0px auto;
        border: 1px solid #ddd;
        padding: 50px;

    }
</style>

<?php
Session::checkSession();
$userid = Session::get("userid");
?>

<div class="main">
    <h1>Your Profile</h1>
    <div class="profile">
        <form action="" method="post">
            <?php
            $getData = $usr->getUserDataById($userid);
            if ($getData) {
                while ($result = $getData->fetch_assoc()) { ?>

                    <table class="tbl">
                        <tr>
                            <td>Name</td>
                            <td><input name="name" value="<?php echo $result['name']; ?>" type="text"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input name="username" value="<?php echo $result['username']; ?>" type="text"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input name="email" value="<?php echo $result['email']; ?>" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Update">
                            </td>
                        </tr>
                    </table>
                <?php }
            }
            ?>
        </form>

    </div>

</div>
<?php include 'inc/footer.php'; ?>