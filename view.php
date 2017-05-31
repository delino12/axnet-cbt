<?php
include("__config/core.php");

# check login user
$auth_login = new AuthLogin();
$login = $auth_login->login();
if($login == false)
{
	header("Location: login.php");
}


# get subjects 
if(isset($_GET['subject']))
{
	$subject = $_GET['subject'];
}else{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Axnet CBT System</title>
	<?php
		# load external link
		include("includes/external-links.php");
	?>
</head>

<body>
<?php 
# inlcude navigation
include ("includes/navigation.php");
?>
<br /><br /><br />

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $subject; ?>
			<input type="hidden" id="subject" value="<?php echo $subject; ?>" name="">
		</div>
	</div>
</div>

<hr />
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<p class="lead">Questions</p>
			<hr />
			<div id="load-subject-questions"></div>
		</div>
		<div class="col-md-4">
			<p class="lead">Recent Questions</p>
			<div id="load-recent-added"></div>
		</div>
	</div>
</div>

<hr />
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title">ALL QUESTIONS </h1>
		</div>
	</div>
</div>

<script type="text/javascript">
	var subject = $("#subject").val();
	$("#load-subject-questions").load("__factory/load-subject-questions.php?subject="+subject);
</script>

<hr />
<div class="container">
	<div class="row">
		<div class="footer">
			<div> 
				Copyright protected &copy; <?= date("Y"); ?> Design and Developed by Ama Technology Team 
				<a href="https://www.amatechteam.com">www.amatechteam.com</a>
			</div>
		</div>	
	</div>
</div>
<br />
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>