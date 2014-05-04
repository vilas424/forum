<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_NAME']) || (trim($_SESSION['SESS_MEMBER_NAME']) == ''))
            {
		header("location: access-denied.php");
		exit();
             }
?>