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
			<h1 class="lead">You can create C-B-T question in 30 seconds </h1>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p>
				<b>Note:</b> Each question is charge (40.00) QC credits, Please read the 
				<a class="btn-link" href="private/axnet_terms_and_conditions.pdf">Terms & Conditions </a> 
				before proceeding to our payment gateway service. 
				<br />
				Contact our customer care via email <a class="btn-link" href="mail_to:info@cbt.axnet.com">info@axnet.com</a> 
			</p>
		</div>
		<div class="col-md-6">
			<p class="lead">
				  	
			</p>
		</div>
	</div>
</div>

<hr />
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					Create your question with simplicity
				</div>
				<div class="panel-body">
					<div id="question-set">
						<form method="post" role="form" onsubmit="return uploadQuestion()">
							<div class="form-group">
								<select id="subj" class="form-control">
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
							<div class="form-group">
								<textarea id="question" cols="40" rows="3" placeholder="paste your question here" class="form-control" required=""></textarea>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-1">
										<label>A</label>
									</div>
									<div class="col-sm-3">
										<input type="text" id="a" name="a" placeholder="A option" class="form-control col-md-2" required="">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-sm-1">
								<label>B</label>
								</div>
								<div class="col-sm-3">
								<input type="text" id="b" name="b" placeholder="B option" class="form-control col-md-2" required="">		
								</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-sm-1">
								<label>C</label>
								</div>
								<div class="col-sm-3">
								<input type="text" id="c" name="c" placeholder="C option" class="form-control col-md-2" required="">		
								</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-sm-1">
								<label>D</label>
								</div>
								<div class="col-sm-3">
								<input type="text" id="d" name="d" placeholder="D option" class="form-control col-md-2" required="">		
								</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
								<div class="col-sm-1">
								<label>E</label>
								</div>
								<div class="col-sm-3">
								<input type="text" id="e" name="e" placeholder="E option" class="form-control col-md-2" required="">		
								</div>
								</div>				
							</div>

							<hr />
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label>Specify the correct answer</label>
										<select class="form-control" id="ans">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
										</select>
									</div>
								</div>
							</div>

							<hr />
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<button class="btn btn-info">Create Question Now</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="question-stat"></div>
				</div>
				<div class="panel-heading">Axnet Ama Tech CBT Question System </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Preview Question</div>
				<div class="panel-body">
					<div id="load-last-question"></div>
					<script type="text/javascript">
						$("#load-last-question").load("__factory/load-questions.php");
					</script>
				</div>
				<div class="panel-heading">Axnet Ama Tech CBT Question System </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function uploadQuestion()
	{
		var subject = $("#subj").val();
		var question = $("#question").val();
		var optionA = $("#a").val();
		var optionB = $("#b").val();
		var optionC = $("#c").val();
		var optionD = $("#d").val();
		var optionE = $("#e").val();
		var answer = $("#ans").val();

		$.ajax({
			type: "POST",
			url: "__factory/upload-question.php",
			data: {
				subject:subject,
				question:question,
				optionA:optionA,
				optionB:optionB,
				optionC:optionC,
				optionD:optionD,
				optionE:optionE,
				answer:answer
			},
			cache:false,
			success: function (data)
			{
				$("#question-set").hide();
				$("#question-stat").html(data);
			}
		});	
		return false;
	}
</script>

<?php
	# include footer and scripts
	include("includes/footer.php");
?>
</body>
</html>