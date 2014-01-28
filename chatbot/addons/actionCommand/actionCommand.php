<?php
//Action Command Allow to your bot different command

/**
* This function detect if you have a command to execute
* @param  array $convoArr - the conversation array
* @return $convoArr with command
**/
function checkCommand($convoArr){
	 //debug($convoArr['send_to_user']);
	$botname=$convoArr['conversation']['bot_name'];
	$username=$convoArr['conversation']['user_name'];
	$conv=$convoArr['response'];
	
	if(commandFound($convoArr['userquery'])){
		$s = explode("[search] ",$convoArr['userquery']);
		$param = $s[1];
		$res=search($param);
		$show="";
 	  	$show .= "<div class=\"usersay\"><strong>$username</strong>: " .$convoArr['userquery']. "</div>";
     	$show .= "<div class=\"botsay\"><strong>$botname</strong>: " .$res. "</div>";
		$convoArr['send_to_user']=$show;
	}else if(commandFound($convoArr['response'])){
		$s = explode("[search] ",$convoArr['response']);
		$param = $s[1];
		$res=search($param);
		$show="";
 	  	$show .= "<div class=\"usersay\"><strong>$username</strong>: " .$convoArr['userquery']. "</div>";
     	$show .= "<div class=\"botsay\"><strong>$botname</strong>: " .$res. "</div>";
		$convoArr['send_to_user']=$show;
	}
	
	//die();
	return $convoArr;
}



function search($item){

$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".urlencode($item);
$ch = curl_init();   
curl_setopt($ch, CURLOPT_URL, $url);   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_REFERER, "Jarvis");
$body = curl_exec($ch);   
curl_close($ch);   
$res=json_decode($body);
$res=$res->responseData->results;
//var_dump($res);
$result="Voici les resultats que j'ai trouvé sur Google (il se peut que les réponses ne soit pas pertinantes): <strong>".$item."</strong>";
$result.='<br><div class="media">';
foreach($res as $r){
//$result.= '<a class="pull-left" href="#"><img class="media-object" src="http://lorempixel.com/50/50/technics" alt="result"></a>';
$result.='<div class="media-body">';
$result.='<a href="'.$r->url.'"><h4 class="media-heading">'.$r->titleNoFormatting.'</h4></a>';
$result.= $r->content;
$result.='</div>';
 }
$result.='</div>';
return $result;

}

function commandFound($str){
	$pattern='/^\[search\]/';
	return preg_match($pattern, $str);
}

function debug($var){
	echo "<pre>".print_r($var)."</pre>";
}
?>