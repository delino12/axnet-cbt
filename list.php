<?php
include("__config/core.php");

# check login user
$auth_login = new AuthLogin();
$login = $auth_login->login();
if($login == false)
{
	header("Location: login.php");
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
		<div class="col-md-12">
			<p class="lead">Scan subject to see questions set !</p>
		</div>
		<div class="col-md-6">
			<form method="post">
				<div class="form-group">
					<select id="subj" onchange="scanQuestion()" class="form-control">
						<option value="general">General Paper</option>
						<option value="english">English</option>
						<option value="mathematics">Maths</option>
						<option value="economics">Economics</option>
						<option value="account">Financial Account</option>
						<option value="commerce">Commerce</option>
						<option value="biology">Biology</option>
						<option value="chemistry">Chemistry</option>
						<option value="pyhsics">Physics</option>
						<option value="agriculture">Agric</option>
					</select>
				</div>
			</form>
		</div>
	</div>
</div>

<hr />
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="load-list"></div>
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
	function scanQuestion()
	{
		var subject = $("#subj").val();
		$("#load-list").load("__factory/load-list.php?subj="+subject);
		//$("#load-recent-added").load("__factory/load-recent.php");

		return false;
	}
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