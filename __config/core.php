<?php
ob_start();
session_start();
/**
* Connection class
*/
class DBconnect
{
	protected $host;
	protected $user;
	protected $pass;
	protected $db;
	
	public function __construct()
	{
		# code...
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "";
		$this->db = "axnet_db";
	}

	public function iConnect()
	{
		$iConnect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if(!$iConnect)
		{
			echo "Error creating connection ".mysqli_error($iConnect);
		}
		
		return $iConnect;
	}
}

/**
* Login connector
*/
class AuthLogin
{
	protected $id;
	protected $username;

	public function __construct()
	{
		# code...
	}

	public function login()
	{
		if(isset($_SESSION['id']) && !empty($_SESSION['id']))
		{
			if(isset($_SESSION['username']) && !empty($_SESSION['username']))
			{
				return true;
			}else{
				return false;
			}
		}
	}
}

/**
* Core User Details
*/
class UserInfo extends DBconnect
{
	protected $plug;
	protected $user_id;


	public function __construct($user_id)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $user_id;
	}

	public function load()
	{
		$show_user_information = " SELECT * FROM admin WHERE(id ='".$this->plug."') ";
		$show_user_information_query = mysqli_query($this->plug, $show_user_information);
		if($show_user_information_query)
		{
			echo 'Error running show user query ...'.mysqli_error($this->plug);
		}else{
			while($details = mysqli_fetch_array($show_user_information_query))
			{
				return $details;
			}
		}
	}
}

/**
* Core Get Balance Details
*/
class GetBalance extends DBconnect
{
	protected $plug;
	protected $user_id;


	public function __construct($user_id)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $user_id;
	}

	public function load()
	{
		# check remaining balance
		$check_balance = " SELECT * FROM account WHERE ";
		$check_balance .= " (user_id = '".$this->user_id."' )";
		$check_balance_query = mysqli_query($this->plug, $check_balance);
		if(!$check_balance_query)
		{
			echo 'Error running the check balance '.mysqli_error($this->plug);
		}else{
			while ($details = mysqli_fetch_array($check_balance_query)) {
				# code...
				return $details;
			}
		}
	}

	public function updateBalance($new_balance)
	{
		# update balance 
		$update_balance = " UPDATE account SET credits = '".$new_balance."' ";
		$update_balance .= " WHERE(user_id = '".$this->user_id."') ";
		$update_balance_query = mysqli_query($this->plug, $update_balance);
		if (!$update_balance_query) {
			# code...
			echo 'Error running update balance query <br />'.mysqli_error($this->plug);
		}elseif (mysqli_affected_rows($this->plug)) {
			# 
		}
	}
}


/**
* Core Get Balance Details
*/
class CountSubject extends DBconnect
{
	protected $plug;
	protected $user_id;
	protected $subject;


	public function __construct($user_id)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $user_id;
		//$this->subject = $subject;
	}

	public function load()
	{
		# load count question
		$count_subjects = " SELECT COUNT(subject) FROM lists WHERE ";
		$count_subjects .= " (user_id = '".$this->user_id."' )";
		//$count_subjects .= " AND subject = '".$this->subject."' ) ";
		$count_subjects_query = mysqli_query($this->plug, $count_subjects);
		if(!$count_subjects_query)
		{
			echo 'Error running count subject query '.mysqli_error($this->plug);
		}else{
			while ($details = mysqli_fetch_array($count_subjects_query)) {
				# code...
				$total_count = $details['COUNT(subject)'];
				return $total_count;
			}
		}
	}

	public function listSubjects($total_subject)
	{

	}
}


/**
* Core Get Balance Details
*/
class CountQuestion extends DBconnect
{
	protected $plug;
	protected $user_id;
	protected $subject;


	public function __construct($user_id, $subject)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $user_id;
		$this->subject = $subject;
	}

	public function load()
	{
		# load count question
		$count_question = " SELECT COUNT(*) FROM lists WHERE ";
		$count_question .= " (user_id = '".$this->user_id."' ";
		$count_question .= " AND subject = '".$this->subject."' ) ";
		$count_question_query = mysqli_query($this->plug, $count_question);
		if(!$count_question_query)
		{
			echo 'Error running count question query '.mysqli_error($this->plug);
		}else{
			while ($details = mysqli_fetch_array($count_question_query)) {
				# code...
				$total_count = $details['COUNT(*)'];
				return $total_count;
			}
		}
	}
}



?>