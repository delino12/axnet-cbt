<?php
# include question class
include("../__class/class.add_list.php");

# request from index
$subj_id = $_REQUEST['subjId'];
$subj_type = $_REQUEST['subjType'];

# add list
$add_to_list = new AddList($subj_id, $subj_type);
$add_to_list->add();