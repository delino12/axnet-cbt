<?php
# include question class
include("../__class/class.login_admin.php");

# login admin
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

# login
$login_admin = new LoginAdmin();
$login_login->login();