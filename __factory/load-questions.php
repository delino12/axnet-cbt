<?php
# include question class
include("../__class/class.load_questions.php");

# load questions 
$load_last_question = new LoadLastQuestion();
$results = $load_last_question->load();
if($results == "")
{
	$question = 'none';
	$opt_a = 'none';
	$opt_b = 'none';
	$opt_c = 'none';
	$opt_d = 'none';
	$opt_e = 'none';
}else{
	while ($details = mysqli_fetch_array($results)) {
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

	}
}
?>
<div class="well">
	<p class="lead"><b><?= $subject; ?></b></p>
</div>
<div class="well">
	<?php echo $question; ?>
</div>
<div class="well">
	<form method="post">
		<ul class="list-group">
			<li class="list-group-item"> A. <?= $opt_a; ?> </li>
			<li class="list-group-item"> B. <?= $opt_b; ?> </li>
			<li class="list-group-item"> C. <?= $opt_c; ?> </li>
			<li class="list-group-item"> D. <?= $opt_d; ?> </li>
			<li class="list-group-item"> E. <?= $opt_e; ?> </li>
		</ul>
		<div class="small">
			<a href="" class="pull-right"><button class="btn btn-primary"><i class="fa fa-pencil"></i> delete</button></a>
			<a href=""><button class="btn btn-primary"><i class="fa fa-edit"></i> edit </button></a>
			<a href=""><button class="btn btn-primary"><i class="fa fa-edit"></i> add to queue </button></a>
		</div>
	</form>
</div>