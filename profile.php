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
<br />
<hr />
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div id="basic-information"></div>
			<script type="text/javascript">
				$("#basic-information").load("__factory/check-information.php");
			</script>
		</div>
	</div>
	<br /><br />
	<div class="row">
		<div class="col-md-6">
			<p class="lead">
				Basic Contact Information 
			</p>
			<hr />
			<div id="load-basic-information"></div>
		</div>
	</div>
</div>

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