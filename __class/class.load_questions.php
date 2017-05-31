<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Upload Question Class
*/
class LoadLastQuestion extends DBconnect
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

	public function load()
	{
		# load last questions
		$show_last_question = " SELECT * FROM questions WHERE ";
		$show_last_question .= "(user_id ='".$this->user_id."') ORDER BY id DESC LIMIT 1 ";
		$show_last_question_query = mysqli_query($this->plug, $show_last_question);
		if(!$show_last_question_query)
		{
			echo 'Error running show question query '.mysqli_error($this->plug);
		}elseif (!mysqli_num_rows($show_last_question_query)) {
			# code...
			echo 'No question found !, upload a question <br />';
		}else{
			return $show_last_question_query;
		}
	}
}

?>