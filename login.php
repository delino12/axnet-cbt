<?php
include("__config/core.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Question Bank</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Axnet CBT</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Signup</a></li>
        <li class="active"><a href="./">Guest <span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<br />
 
<hr />
<div class="container">
	<div class="col-md-12">
		<h4 class="lead">We inspired our students</h4>
		<p>The cbt axnet is a web application which create and store unique question for test, class assignment, exams and lot's more. we emerged to give our student the very best insight to acquire more knowledge and to study more for further educational pursuit and also to advance in the eLearning education technology improvement. </p>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					Login Admin
				</div>
				<div class="panel-body">
					<div id="login-form">
						<form method="post" role="form" onsubmit="return loginAdmin()">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Username</label>
										<input type="text" id="username" class="form-control" name="" placeholder="username/email" required="">
									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" id="password" class="form-control" name="" placeholder="password" required="">
									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group"><button class="btn btn-info">Login</button>
									<a class="btn btn-link" href="password-reset.php">Forget password !</a>
								</div>
								</div>
							</div>
						</form>
					</div>
					<div id="login-stat"></div>
					<script type="text/javascript">
						function loginAdmin()
						{
							var username = $("#username").val();
							var password = $("#password").val();

							$.ajax({
								type: "POST",
								url: "__factory/login-admin.php",
								data: {
									username:username,
									password:password
								},
								cache:false,
								success: function (data)
								{
									$("#login-stat").html(data);
								}
							});
							return false;
						}
					</script>
				</div>
				<div class="panel-heading">Axnet Ama Tech CBT Question System </div>
			</div>
		</div>
		<div class="col-md-6">
			<img src="img/edm.png" class="img img-square" height="100%" width="100%">
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