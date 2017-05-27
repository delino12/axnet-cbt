<?php
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

	protected $lock;

	public function __construct($id, $username)
	{
		# code...
		$this->id = $id;
		$this->username = $username;
		$this->lock = false;
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
?>