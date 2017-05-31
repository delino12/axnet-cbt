<?php
# include question class
include("../__class/class.load_subject_questions.php");

# get subject name 
if($_GET['subject'])
{
	$subject = $_GET['subject'];
}

$load_subject_question = new SubjectQuestions($subject);
$all_question = $load_subject_question->load();

if($all_question == "")
{
	$question = 'none';
	$subject = 'none';
	$opt_a = 'none';
	$opt_b = 'none';
	$opt_c = 'none';
	$opt_d = 'none';
	$opt_e = 'none';
}else{
	while ($details = mysqli_fetch_array($all_question)) {
		# code...
		$id = $details['id'];
		$subject = $details['subject'];
		$question = $details['question'];
		$opt_a = $details['opt_a'];
		$opt_b = $details['opt_b'];
		$opt_c = $details['opt_c'];
		$opt_d = $details['opt_d'];
		$opt_e = $details['opt_e'];
		$answers = $details['answers'];
		$point = $details['point'];
		$date = $details['date'];

		$subject = strtoupper($subject);

		echo '
		<div class="alert alert-info">
			<h5>'.$question.'</h5>
			<br />
			<form method="post">
				<ul class="list-group">
					<li class="list-group-item"> A. '.$opt_a.' </li>
					<li class="list-group-item"> B. '.$opt_b.' </li>
					<li class="list-group-item"> C. '.$opt_c.' </li>
					<li class="list-group-item"> D. '.$opt_d.' </li>
					<li class="list-group-item"> E. '.$opt_e.' </li>
				</ul>
			</form>
		</div>
		';
	}
}

?>