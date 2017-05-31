<?php
# include question class
include("../__class/class.load_questions.php");

# request from index
$subj_id = $_REQUEST['subjId'];

# add list
$delete_question = new DeleteQuestion($subj_id);
$delete_question->delete();