<?php
# include the core connection
include ("../__config/core.php");
include ("../__functions/functions.php");

/**
* Upload Question Class
*/
class SetQuestions extends DBconnect
{
	protected $plug;
	protected $question;
	protected $subject;
	protected $answers;
	protected $optionA;
	protected $optionB;
	protected $optionC;
	protected $optionD;
	protected $optionE;

	# date, point and image 
	protected $date;
	protected $point;
	protected $image;

	function __construct($question, $subject, $answers, $optionA, $optionB, $optionC, $optionD, $optionE)
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();

		# data
		$this->question = $question;
		$this->subject = $subject;
		$this->answers = $answers;
		$this->optionA = $optionA;
		$this->optionB = $optionB;
		$this->optionC = $optionC;
		$this->optionD = $optionD;
		$this->optionE = $optionE;

		# secondary data
		$this->point = 10;
		$this->date = time();
	}

	public function create()
	{
		# save questions to client database
		$create_question = " INSERT INTO questions( ";
		$create_question .= " question, subject, opt_a, opt_b, "; 
		$create_question .= " opt_c, opt_d, opt_e,  ";
		$create_question .= " answers, point, date )";
		$create_question .= " VALUES('".$this->question."', '".$this->subject."', '".$this->optionA."','".$this->optionB."', ";
		$create_question .= " '".$this->optionC."','".$this->optionD."','".$this->optionE."',  ";
		$create_question .= " '".$this->answers."','".$this->point."','".$this->date."' )";
		$create_question_query = mysqli_query($this->plug, $create_question);
		if(!$create_question_query)
		{
			echo 'Error creating question queries <br />'.mysqli_error($this->plug);
		}elseif(mysqli_affected_rows($this->plug)){
			echo 'Question created successfully ! ';
		}
	}
}

?>