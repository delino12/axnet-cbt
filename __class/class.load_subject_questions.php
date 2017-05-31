<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Upload Question Class
*/
class SubjectQuestions extends DBconnect
{
	protected $plug;
	protected $user_id;
	protected $subject;

	function __construct($subject)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# user id
		$this->user_id = $_SESSION['id'];
		$this->subject = strtolower($subject);
	}

	public function load()
	{
		# lower letters

		# load last questions
		$show_subject_questions = " SELECT * FROM questions WHERE ";
		$show_subject_questions .= " (user_id ='".$this->user_id."' ";
		$show_subject_questions .= " AND subject = '".$this->subject."' ) ";
		$show_subject_questions_query = mysqli_query($this->plug, $show_subject_questions);
		if(!$show_subject_questions_query)
		{
			echo 'Error running subject question query '.mysqli_error($this->plug);
		}elseif (!mysqli_num_rows($show_subject_questions_query)) {
			# code...
			echo 'No question found !, upload a question <br />';
		}else{
			return $show_subject_questions_query;
		}
	}
}

?>