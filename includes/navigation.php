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
      <a class="navbar-brand" href="index.php">Axnet CBT</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
      	<li class="active"><a href="javascript:void(0);"> <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
        <li><a href="account.php"><div id="account-balance"></div></a></li>
        <li><a href="list.php"><i class="fa fa-list"></i> Queue List</a></li>
        <li><a href="profile.php"><i class="fa fa-cog"></i> Setting</a></li>
        <li><a href="contact.php"><i class="fa fa-volume-control-phone"></i> Contact Us</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout <span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<script type="text/javascript">
	$("#account-balance").load("__factory/account-balance.php");
</script>