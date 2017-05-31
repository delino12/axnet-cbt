<?php

# validate username
function validateUsername($username)
{
	if(!preg_match("#^[a-zA-Z0-9 ]+$#", $username))
	{
		echo $username;
	}else{
		echo '<span class="alert-danger">invalid username, username must be letters and number only</span>';
		echo '<span class="alert-danger">invalid username, username must be letters and number only</span>';
	}
}


# filter Stings
function sanitizeString($data)
{
	$data = strip_tags($data);
	$data = stripslashes($data);
	$data = trim($data);

	return $data;
}

# random Strings Functions 
function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

?>