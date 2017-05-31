<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Add question to list
*/
class AddList extends DBconnect
{
	protected $plug;
	protected $subj_id;
	protected $subject;
	protected $date;

	# user id
	protected $user_id;

	function __construct($subj_id, $subject)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# data
		$this->subj_id = $subj_id;
		$this->subject = $subject;
		$this->date = time();

		# user id 
		$this->user_id = $_SESSION['id'];
	}

	public function add()
	{
		
		# verify if client has QC credit balance left
		$check_balance = new GetBalance($this->user_id);
		$bal = $check_balance->load();

		$main_balance = $bal['credits'];
		if($main_balance < 40 || $main_balance = 0)
		{
			echo '<span class="alert-danger"><b>Insuficient QC credit to create question list</b></span> <br />';
			echo 'Your Credits Balance is low, <a href="account.php">Top up your QC credits now</a>';
		}else{

			# check if question already added 
			$check_list = " SELECT * FROM lists WHERE ";
			$check_list .= " (question_id = '".$this->subj_id."') ";
			$check_list_query = mysqli_query($this->plug, $check_list);
			if(!$check_list_query){
				echo 'Error running check list query '.mysqli_error($this->plug);
			}elseif (mysqli_num_rows($check_list_query)) {
				# code...
				echo '<span class="alert-danger">Question already exits</span> <br /> System can not <b>duplicate</b> same question. ';
			}else{
				# create question and set new balance 
				$add_list = " INSERT INTO lists (user_id, subject, question_id, date) ";
				$add_list .= " VALUES('".$this->user_id."','".$this->subject."', "; 
				$add_list .=  " '".$this->subj_id."','".$this->date."' ) ";
				$add_list_query = mysqli_query($this->plug, $add_list);
				if(!$add_list_query){
					echo 'Error running add list query <br />'.mysqli_error($this->plug);
				}elseif (mysqli_affected_rows($this->plug)) {
					# code...
					echo 'Question has been added !';

					# cost for single question 
					$cost = 40; // per question
					$new_balance = $bal['credits'] - $cost;

					# update account
					$check_balance->updateBalance($new_balance);
				}
			}
		}
	}
}

?>