<?php
# include question class
include("../__class/class.generate_exam_link.php");

# request from index
$total_users = $_REQUEST['totalUsers'];
$exam_subject = $_REQUEST['examSubject'];

# generate link 
$exam_link = 'anxet-cbt-exam-'.rand(333,999).rand(222,555).rand(111,999);

# generate login and exam link:
$new_link = new GenerateExamLink($total_users, $exam_subject, $exam_link);
$new_link->create();

?>