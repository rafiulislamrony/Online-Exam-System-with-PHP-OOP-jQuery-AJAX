<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/User.php');

$usr = new User();

?>
 
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

            <tr>
                <td>01</td>
                <td>Name </td>
                <td>Username</td>
                <td>Email</td>
                <td>
                    <a href="">Remove</a>
                </td>
            </tr>

        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>