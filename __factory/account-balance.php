<?php
# include question class
include("../__class/class.account_balance.php");

# check account balance 
$check_balance = new AccountBalance();
$check_balance->load();