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

<hr />
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<p class="lead">Generating Question</p>

			<p class="alert alert-info">
				Generate question, select subject and numbers of students. click on the <i><b>button link</b></i> below to <b>start</b> generating logins for students. 
			</p>

			<hr />
			<div class="row">
				<div class="col-md-12">
					<p class="alert alert-success">Subject Set for CBT Exam</p>
					<div id="load-avialable-subjects">loading.......</div>
				</div>
				<script type="text/javascript">
					$("#load-avialable-subjects").load("__factory/load-avialable-subjects.php");
				</script>
			</div>
			<br />

			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary" onclick="loadOption()">Upload and Generate Exam Link</button>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-12">
					<div id="basic-option" style="display: none;">
						<div class="panel panel-success">
							<div class="panel-heading">Specify the total number of student</div>
							<div class="panel-body">
								<form method="post" onsubmit="return generateUser()">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<p>How many student ?</p>
												<input type="hidden" id="exam_subject" name="" value="<?php echo $subject; ?>">
												<input type="text" id="no_of_student" maxlength="1000" name="" placeholder="000" class="form-control" required="">
											</div>
											<div class="form-group">
												<button class="btn btn-primary">Generate Login Details</button>
											</div>
										</div>
									</div>
								</form>
								<div class="well">
									<div id="generate-stats"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function loadOption()
				{
					$("#basic-option").show();
				}

				function generateUser()
				{
					var totalUsers = $("#no_of_student").val();
					var examSubject = $("#exam_subject").val();

					$.ajax({
						type: "POST",
						url: "__factory/generate-users.php",
						data: {
							totalUsers:totalUsers,
							examSubject:examSubject
						},
						cache: false,
						success: function (data)
						{
							$("#generate-stats").html(data);
						}
					});
					return false;
				}
			</script>
		</div>
	</div>
</div>

<script type="text/javascript">
	var subj = $("#subject").val();
	$("#load-generated-question").load("__factory/load-generated-questions.php?subject="+subj);
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