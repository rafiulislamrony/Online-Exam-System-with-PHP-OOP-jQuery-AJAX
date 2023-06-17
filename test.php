<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();

if (isset($_GET['q'])) {
	$number = (int) $_GET['q'];
} else {
	header("Location:exam.php");
}
$total = $exm->getTotalRows();
$question = $exm->getQuestionByNumber($number);
?>

<div class="main">
	<h1>Question
		<?php echo $question['questionNo']; ?> of
		<?php echo $total; ?>
	</h1>
	<div class="test">
		<form method="post" action="">
			<table>
				<tr>
					<td colspan="2">
						<h3>Question
							<?php echo $question['questionNo']; ?>:
							<?php echo $question['question']; ?>
						</h3>
					</td>
				</tr>

				<?php
				$answer = $exm->getAnswer($number);

				if (isset($answer)) {
					while ($result = $answer->fetch_assoc()) { ?>
						<tr>
							<td>
								<input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['answerName']; ?>
							</td>
						</tr>
					<?php }
				}
				?>
				<tr>
					<td>
						<input type="submit" name="submit" value="Next Question" />
						<input type="hidden" name="number" value="<?php echo $number; ?>" />
					</td>
				</tr>

			</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>