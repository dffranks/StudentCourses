<?php

class Student {

	private $fname = "";
	private $lname = "";
	private $password = "";
	private $major = "";
	private $errMsg = "";	
	private $courseNum = 0;

	function __construct($fn, $ln, $pw, $maj, $cn) {
		$fnameErr = $this->set_fname($fn) == FALSE ? 'FALSE,' : 'TRUE,';
		$lnameErr = $this->set_lname($ln) == FALSE ? 'FALSE,' : 'TRUE,';
		$pwErr = $this->set_pw($pw) == FALSE ? 'FALSE,' : 'TRUE,';
		$majErr = $this->set_maj($maj) == FALSE ? 'FALSE,' : 'TRUE,';

		$this->errMsg = $fnameErr . $lnameErr . $pwErr . $majErr;

	}

	##### SETS #####
	function set_fname($fn) {
		$errMsg = FALSE;
		(ctype_alpha($fn) && strlen($fn) <= 20) ? $this->fname = $fn : $this->error_message = TRUE;
		return $this->error_message;
	}

	function set_lname($ln)

	##### GETS #####

}