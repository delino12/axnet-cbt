<?php
include("__config/core.php");

session_unset();
session_destroy();
header("Location: login.php");
?>