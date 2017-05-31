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
			<p class="lead">Contact us</p>
			<hr />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<form method="post" onsubmit="return sendMessage()">
				<div class="form-group">
					<label>Please Specify Contact Name</label>
					<input type="text" class="form-control" placeholder="Full name" name="">
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" placeholder="Email address" class="form-control" name="">
				</div>
				<div class="form-group">
					<p>Tell us more about your experience with us, we will be glad to respond to our value customer </p>
					<textarea class="form-control" cols="20" rows="4" id="message" placeholder="tell us what you think"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Send Message</button>
				</div>
				<div class="form-group">
					<p>Help share and developed the Axnet Community. </p>				
					<ul class="list-inline">
						<li><a href=""><i class="fa fa-facebook"></i> facebook</li> </a>
						<li><a href=""><i class="fa fa-twitter"></i> twitter</li> </a>
						<li><a href=""><i class="fa fa-instagram"></i> instagram</li> </a>
						<li><a href=""><i class="fa fa-google"></i> google+</li> </a>
						<li><a href=""><i class="fa fa-whatsapp"></i> whatsapp</li> </a>
						<li><a href=""><i class="fa fa-quora"></i> quora</li> </a>
					</ul>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4"><p class="lead">Contact us via voice call <hr /></p>
			</div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4"><i class="fa fa-phone"></i> +2348127160258</div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4"><i class="fa fa-phone"></i> +2349092367163</div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4"><i class="fa fa-envelope"></i> <a href="">info@axnet.com</a></div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4"><i class="fa fa-envelope"></i> <a href="">supports@axnet.com</a></div>
			</div>
			<hr />
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4">
					<i class="fa fa-location-arrow"></i>
					16a Cardoso lane, off Mechanic Ajegunle Apapa Lagos,
				</div>
			</div>
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