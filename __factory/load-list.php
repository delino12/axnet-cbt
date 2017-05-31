<?php
# include question class
include("../__class/class.load_list.php");

# get subject
if($_GET['subj']){
	$subject = $_GET['subj'];

	# capitalize
	$subject = strtoupper($subject);
}

# add list
$load_list = new LoadList();
?>
<p class="lead">Question List</p>
<table class="table">
	<thead>
		<tr>
			<th>SUBJECT</th>
			<th>NO. OF QUESTION</th>
			<th>DATE</th>
			<th>OPTION</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $load_list->load($subject); ?>
	</tbody>
</table>