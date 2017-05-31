<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Add question to list
*/
class GenerateExamLink extends DBconnect
{
	protected $plug;
	protected $total_users;
	protected $exam_subject;

	# user id
	protected $user_id;

	# generate data
	protected $exam_link;
	protected $score;
	protected $start_time;
	protected $stop_time;
	protected $date;

	function __construct($total_users, $exam_subject, $exam_link)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id 
		$this->user_id = $_SESSION['id'];
		$this->total_users = $total_users;
		$this->exam_subject = $exam_subject;
		$this->exam_link = $exam_link;
		$this->score = 10;

		# timer 
		$this->start_time = 0;
		$this->stop_time = 0;

		# date 
		$this->date = time();
	}

	public function create()
	{

		# for loop for each users
		for ($i=0; $i < $this->total_users; $i++) {

			# users
			$username = 'AXNET-'.rand(111,999).rand(333,999).'SXF';
			$password = randomString();
	
			# insert username and passwords
			$add_cbt_exam = " INSERT INTO exams(exam_by, username, ";
			$add_cbt_exam .= " password, link, date) ";
			$add_cbt_exam .= " VALUES('".$this->user_id."','".$username."', ";
			$add_cbt_exam .= " '".$password."','".$this->exam_link."','".$this->date."') ";
			$add_cbt_exam_query = mysqli_query($this->plug, $add_cbt_exam);
			if(!$add_cbt_exam_query)
			{
				echo 'Error running cbt exam link query '.mysqli_error($this->plug);
			}
		}

		echo '
		File created ! <a href="exams/cbt/index.php?link_token='.$this->exam_link.'">Download Examinations Logins & Link</a> <br />
		Copy & save url <br />
		<b>http://www.cbt.axnet.com/exams/cbt/index.php?link_token='.$this->exam_link.'</b> 
		';
	}
}

?>