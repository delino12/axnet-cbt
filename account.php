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
		<div class="col-md-12">
      <p>Account Summary</p>
    </div>
	</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <p class="lead">QC Credits price list. </p>
      <div class="panel panel-info">
        <div class="panel-heading">Price list for QC Credits </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Price (N)</th>
                <th>Rate </th>
                <th>QC Credits</th>
                <th>Discount</th>
                <th>Amount (N)</th>
                <th>QC Balance</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>N2.00</td>
                <td><i class="fa fa-database"></i> 1QC</td>
                <td>N2.00 *  <i class="fa fa-database"></i> 1000 QC</td>
                <td>10%</td>
                <td>N2000.00</td>
                <td><i class="fa fa-database"></i> 1000QC + <i class="fa fa-database"></i> 100QC </td>
                <td><a class="btn-link" href="">Buy Now</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>N2.00</td>
                <td><i class="fa fa-database"></i> 1QC</td>
                <td>N2.00 *  <i class="fa fa-database"></i> 1500 QC</td>
                <td>12%</td>
                <td>N3000.00</td>
                <td><i class="fa fa-database"></i> 1500QC + <i class="fa fa-database"></i> 180QC</td>
                <td><a class="btn-link" href="">Buy Now</a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>N2.00</td>
                <td><i class="fa fa-database"></i> 1QC</td>
                <td>N2.00 *  <i class="fa fa-database"></i> 2000 QC</td>
                <td>15%</td>
                <td>N4000.00</td>
                <td><i class="fa fa-database"></i> 2000QC + <i class="fa fa-database"></i> 300QC</td>
                <td><a class="btn-link" href="">Buy Now</a></td>
              </tr>
              <tr>
                <td>4</td>
                <td>N2.00</td>
                <td><i class="fa fa-database"></i> 1QC</td>
                <td>N2.00 *  <i class="fa fa-database"></i> 3000 QC</td>
                <td>20%</td>
                <td>N6000.00</td>
                <td><i class="fa fa-database"></i> 3000QC + <i class="fa fa-database"></i> 600QC</td>
                <td><a class="btn-link" href="">Buy Now</a></td>
              </tr>
              <tr>
                <td>5</td>
                <td>N2.00</td>
                <td><i class="fa fa-database"></i> 1QC</td>
                <td>N2.00 *  <i class="fa fa-database"></i> 4000 QC</td>
                <td>25%</td>
                <td>N8000.00</td>
                <td><i class="fa fa-database"></i> 4000QC + <i class="fa fa-database"></i> 1000QC</td>
                <td><a class="btn-link" href="">Buy Now</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="panel-footer">Ama Technology (ATT) Secure Web Application </div>
      </div>
    </div>
    <div class="col-md-3">
      <p class="lead">Add Payment Information</p>
      <div class="panel panel-success">
        <div class="panel-heading">Payment</div>
        <div class="panel-body">
          <p class="lead">
            Payment information here
          </p>
        </div>
        <div class="panel-footer">Choose a Payment Method</div>
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