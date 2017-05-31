<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Upload Question Class
*/
class CreateUser extends DBconnect
{
	protected $plug;
	protected $username;
	protected $email;
	protected $password;
	protected $phone;

	protected $date;

	protected $owner_id;
	protected $credits;

	function __construct($username, $email, $password, $phone)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->phone = $phone;

		$this->date = time();

		# account information
		$this->owner_id = 'AXNET-'.rand(999,000).rand(444,888);
		$this->credits = 0;
	}

	public function create()
	{
		# check if user already sign up
		$check_email = " SELECT * FROM admin WHERE ";
		$check_email .= " (email = '".$this->email."') ";
		$check_email_query = mysqli_query($this->plug, $check_email);
		if(!$check_email_query)
		{
			echo 'Error checking email query <br />'.mysqli_error($this->plug);
		}elseif (mysqli_num_rows($check_email_query)) {
			# code...
			echo ' <b>'.$this->email.'</b> already exits !';
		}else{
			# check if phone number already exits
			$check_phone = " SELECT * FROM admin WHERE ";
			$check_phone .= " (phone = '".$this->phone."') ";
			$check_phone_query = mysqli_query($this->plug, $check_phone);
			if(!$check_phone_query)
			{
				echo 'Error running phone check query <br />'.mysqli_error($this->plug);
			}elseif (mysqli_num_rows($check_phone_query)) {
				# code...
				echo ' <b>'.$this->phone.'</b> already exits !';
			}else{
				# sign up user 
				$add_user = " INSERT INTO admin ";
				$add_user .= " (username, email, password, phone, date ) ";
				$add_user .= " VALUES('".$this->username."', '".$this->email."', ";
				$add_user .= " '".$this->password."', '".$this->phone."', '".$this->date."') ";
				$add_user_query = mysqli_query($this->plug, $add_user);
				if(!$add_user_query)
				{
					echo 'Error running add user query <br />'.mysqli_error($this->plug);
				}elseif(mysqli_affected_rows($this->plug))
				{
					echo ' Thanks for signing up. <br />';
					echo ' Activation code has been sent! ';
				}
			}
		}
	}

	public function sendWelcomeMsg()
	{
		# welcome message to user.
	}

	public function sendActivation()
	{
		# activation code to user
	}

	public function createQcAccount()
	{
		# get user information 
		# create and initilize account;
		$get_user_id = " SELECT id FROM admin WHERE(username ='".$this->username."') ";
		$get_user_id_query = mysqli_query($this->plug, $get_user_id);
		if(!$get_user_id_query)
		{
			echo 'Error running the get user id query '.mysqli_error($this->plug);
		}else{
			# code...
			while($details = mysqli_fetch_assoc($get_user_id_query))
			{
				$account_user_id = $details['id'];

				# create account 
				$create_account = " INSERT INTO account(user_id, owner_id, credits, date) ";
				$create_account .= " VALUES('".$account_user_id."','".$this->owner_id."', "; 
				$create_account .= " '".$this->credits."', '".$this->date."') ";
				$create_account_query = mysqli_query($this->plug, $create_account);
				if(!$create_account_query)
				{
					echo 'Error running the create account query <br />'.mysqli_error($this->plug); 
				}else{
					echo '<hr />';
					echo 'Account created! your owner id is <b>'.$this->owner_id.'</b>';
				}
			}
		}
	}
}

?>