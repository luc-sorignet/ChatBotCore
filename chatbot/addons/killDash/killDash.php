<?php
//Action Command Allow to your bot different command

/**
* This function detect if you have a command to execute
* @param  array $say - the say
* @return $say with command
**/
function killDash($say){
	 
	return str_replace("-", " ", $say);
}



?>