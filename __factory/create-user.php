<?php
# include question class
include("../__class/class.create_user.php");

# request from index
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$phone = $_REQUEST['phone'];

# encrypt password
$password = md5(sha1($password));

# signup user 
$new_user = new CreateUser($username, $email, $password, $phone);
$new_user->create();
$new_user->sendWelcomeMsg();
$new_user->sendActivation();
$new_user->createQcAccount();
