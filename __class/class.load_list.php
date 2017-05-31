<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Add question to list
*/
class LoadList extends DBconnect
{
	protected $plug;

	# user id
	protected $user_id;

	function __construct()
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id 
		$this->user_id = $_SESSION['id'];
	}

	public function checkList()
	{

	}

	public function load($subject)
	{
		# load list
		$show_list = " SELECT * FROM lists WHERE ";
		$show_list .= " (user_id = '".$this->user_id."'  ";
		$show_list .= " AND subject = '".$subject."') ";
		$show_list_query = mysqli_query($this->plug, $show_list);
		if(!$show_list_query){
			echo 'Error running show list query '.mysqli_error($this->plug);
		}elseif(!mysqli_num_rows($show_list_query)){
			echo 'No question has been added !';
		}else{
			while($details = mysqli_fetch_array($show_list_query))
			{
				$id = $details['id'];
				$user_id = $details['user_id'];
				$subject = $details['subject'];
				$question_id = $details['question_id'];
				$date = $details['date'];

				# date configuration
				$date = date(" M D Y h:s A", $date);
			}
			# capitalize
			$subject = strtoupper($subject);

			# count question
			$count_question = new CountQuestion($this->user_id, $subject);
			$total_count = $count_question->load();

			echo '
			<tr>
				<td>'.$subject.'</td>
				<td>'.$total_count.' Ready </td>
				<td>'.$date.'</td>
				<td><a href="view.php?subject='.$subject.'">View</a></td>
				<td><a href="generate.php">Generate</a></td>
			</tr>';
		}
	}

	public function recent()
	{
		
		echo 'loading recent......';
	}
}

?>