<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Upload Question Class
*/
class LoadGeneratedQuestion extends DBconnect
{
	protected $plug;
	protected $user_id;

	function __construct()
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $_SESSION['id'];
	}

	public function load($subject)
	{
		# load last questions
		$show_generate_question = " SELECT * FROM questions WHERE ";
		$show_generate_question .= "(user_id ='".$this->user_id."' "; 
		$show_generate_question .= " AND subject = '".$subject."') ";
		$show_generate_question_query = mysqli_query($this->plug, $show_generate_question);
		if(!$show_generate_question_query)
		{
			echo 'Error running show generated question query '.mysqli_error($this->plug);
		}elseif (!mysqli_num_rows($show_generate_question_query)) {
			# code...
			echo 'No question found !, upload a question <br />';
		}else{
			return $show_generate_question_query;
		}
	}
}

?>