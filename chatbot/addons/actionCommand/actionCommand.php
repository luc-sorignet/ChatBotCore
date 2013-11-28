<?php
//Action Command Allow to your bot different command

/**
* This function detect if you have a command to execute
* @param  array $convoArr - the conversation array
* @return $convoArr with command
**/
function checkCommand($convoArr){
	 //debug($convoArr['response']);
	$botname=$convoArr['conversation']['bot_name'];
	$conv=$convoArr['response'];

	//die();
	return $convoArr;
}



function search($item){
	$url="https://www.google.com/search?q=".$item;
	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_URL, $mon_url);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$recup_html = curl_exec ($ch);
 	echo $recup_html;

}

function debug($var){
	echo "<pre>".print_r($var)."</pre>";
}
?>