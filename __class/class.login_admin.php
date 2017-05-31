<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Login Admin Class
*/
class LoginAdmin extends DBconnect
{
	protected $plug;
	protected $username;
	protected $password;

	public function __construct($username, $password)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		$this->username = $username;
		$this->password = $password;
	}

	public function login()
	{
		# check for username valid 

		# load last questions
		$login_admin = " SELECT * FROM admin WHERE ";
		$login_admin .= " (username = '".$this->username."' OR email ='".$this->username."' ";
		$login_admin .= " AND password = '".$this->password."') ";
		$login_admin_query = mysqli_query($this->plug, $login_admin);
		if(!$login_admin_query)
		{
			echo 'Error running login query <br />'.mysqli_error();
		}elseif (!mysqli_num_rows($login_admin_query)) {
			# code...
			echo 'invalid username/password';
		}else{
			while($details = mysqli_fetch_array($login_admin_query))
			{
				$id = $details['id'];
				$username = $details['username'];

				$_SESSION['id'] = $id;
				$_SESSION['username'] = $username;

				echo '
					<script>
						window.location.reload();
					</script>
				';
			}
		}
	}
}

?>