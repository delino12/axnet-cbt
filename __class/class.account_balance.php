<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Add question to list
*/
class AccountBalance extends DBconnect
{
	protected $plug;
	protected $user_id;

	function __construct()
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# data
		$this->user_id = $_SESSION['id'];
	}

	public function load()
	{
		
		# get user account balance
		$show_balance = " SELECT * FROM account WHERE ";
		$show_balance .= " (user_id = '".$this->user_id."') ";
		$show_balance_query = mysqli_query($this->plug, $show_balance);
		if(!$show_balance_query)
		{
			echo 'Error running show balance query <br /> '.mysqli_error($this->plug);
		}else{
			while($details = mysqli_fetch_array($show_balance_query))
			{
				$id = $details['id'];
				$user_id = $details['user_id'];
				$owner_id = $details['owner_id'];
				$credits = $details['credits'];
				$date = $details['date'];

				if($credits == 0)
				{
					$credits = ' <i class="fa fa-database"></i> 00.00QC';
				}else{
					$credits = ' <i class="fa fa-database"></i> '.$credits.'.00QC';
				}

				echo 'Balance <b>'.$credits.'</b> ';

			}
		}
	}
}

?>