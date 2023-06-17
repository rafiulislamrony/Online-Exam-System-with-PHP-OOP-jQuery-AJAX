<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$total = $exm->getTotalRows();
?>

<div class="main">
    <h1>Total
        <?php echo $total; ?> Question Answer
    </h1>
    <div class="test">
        <table>
            <?php
            $getQue = $exm->getQueByOrder();
            if ($getQue) {
                while ($question = $getQue->fetch_assoc()) { ?>

                    <tr>
                        <td colspan="2">
                            <h3 class="que" >Question
                                <?php echo $question['questionNo']; ?>:
                                <?php echo $question['question']; ?>
                            </h3>
                        </td>
                    </tr>

                    <?php
                    $number = $question['questionNo'];
                    $answer = $exm->getAnswer($number);

                    if (isset($answer)) {
                        while ($result = $answer->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <input type="radio" />
                                    <?php
                                    if ($result['rightAnswer'] == '1') {
                                        echo "<span style='color:blue'>" . $result['answerName'] . "</span>";
                                    } else {
                                        echo $result['answerName'];
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                <?php }
            }
            ?>
        </table>

        <a class="start" href="starttest.php">Start Again</a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
<style>
    .start {
        border: 1px solid #4444443b;
        background: #ddd;
        color: #000; 
        display: block;
        text-align: center;
        padding: 7px 10px 7px;
        margin: 10px;
        text-decoration: none;
        transition: 0.2s;
    }

    .start:hover {
        background: #b9b9b9;
    }

    .que{
        margin-top: 20px;
        font-size: 20px;
    }
</style>