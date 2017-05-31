<?php
# include question class
include("../__class/class.login_admin.php");

# login admin
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

# encrypt password
$password = md5(sha1($password));

# login
$login_admin = new LoginAdmin($username, $password);
$login_admin->login();