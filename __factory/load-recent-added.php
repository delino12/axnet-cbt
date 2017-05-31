<?php
# include question class
include("../__class/class.load_list.php");

# add list
$add_to_list = new LoadList($subj_id, $subj_type);
$add_to_list->recent();