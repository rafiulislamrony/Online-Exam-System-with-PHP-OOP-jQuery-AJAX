<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/Exam.php');
$exm = new Exam();
?>

<?php
if (isset($_GET['delque'])) {
    $quesNo = (int) $_GET['delque'];
    $quesNo = $fm->validation($quesNo);
    $quesNo = mysqli_real_escape_string($db->link, $quesNo);
    $delQue = $exm->deleteQuestion($quesNo);
}
?>

<div class="main">
    <h1>Question List</h1>
    <?php
    if (isset($delQue)) {
        echo $delQue;
    }
    ?> 
    <div class="questionlist">

        <table class="tblone">
            <tr>
                <th>No</th>
                <th>Questions </th>
                <th>Action</th>
            </tr>
            <?php
            $getData = $exm->getQueByOrder();
            if ($getData) {
                $i = 0;
                while ($result = $getData->fetch_assoc()) {
                    $i++; ?>

                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <?php echo $result['question']; ?>
                        </td>
                        <td>
                            <a href="?delque=<?php echo $result['questionNo']; ?>"
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