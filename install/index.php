<?PHP

  /***************************************
  * http://www.program-o.com
  * PROGRAM O
  * Version: 2.3.1
  * FILE: index.php
  * AUTHOR: Elizabeth Perreau and Dave Morton
  * DATE: 02-13-2013
  * DETAILS: Switchboard for the install folder
  ***************************************/
  $thisFile = __FILE__;
  if (!file_exists('../config/global_config.php'))
    header('location: install_programo.php');
  require_once ('../config/global_config.php');
  if (!defined('SCRIPT_INSTALLED')) header('location: install_programo.php');
  //header('Location: ' . _ADMIN_URL_);
?>
<!DOCTYPE html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset ?>" />
    <title>ChatBotCore</title>
    <link rel="stylesheet" href="<?php echo _ADMIN_URL_ ?>css/bootstrap.css" media="screen" type="text/css" />

  </head>
  <body>
  <div class="container">
  	<div class="page-header">
       	    <h1>ChatBotCore</h1>	
    </div>

		<div class="alert alert-warning">
		<h2>Warning </h2>
		<p>
			 It appears that  ChatBotCore is already installed. If you wish to run the install script again,
		          <a href="install_programo.php">click here</a>. Otherwise, you can go to the
		          <a href="<?php echo _ADMIN_URL_ ?>">admin page</a>, or check out your chatbot, <a href="<?php echo _BASE_URL_ ?>">here</a>.
		   </p> 
		</div>
         
      <hr>
      <footer>
    	<p>&#169; 2011-2013  ChatBotCore based on program-o an open-source AIML interpreter </p>
      </footer>
          
       

  </body>
</html>
