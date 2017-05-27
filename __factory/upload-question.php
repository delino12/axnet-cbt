<?php
# include question class
include("../__class/class.upload_questions.php");


# request from server
$subject = $_REQUEST['subject'];
$question = $_REQUEST['question'];
$optionA = $_REQUEST['optionA'];
$optionB = $_REQUEST['optionB'];
$optionC = $_REQUEST['optionC'];
$optionD = $_REQUEST['optionD'];
$optionE = $_REQUEST['optionE'];
$answer = $_REQUEST['answer'];


# create new questions 
$create_questions = new SetQuestions($question, $subject, $answer, $optionA, $optionB, $optionC, $optionD, $optionE);
$create_questions->create();

?>