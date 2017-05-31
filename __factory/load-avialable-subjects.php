<?php
# include question class
include("../__class/class.load_subjects.php");

# load available subject
$load_subjects = new LoadSubjects();

?>

<ul class="list-group">
	<?php $load_subjects->load(); ?>
</ul>