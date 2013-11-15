<?php

  /***************************************
  * http://www.program-o.com
  * PROGRAM O
  * Version: 2.3.1
  * FILE: gui/plain/index.php
  * AUTHOR: Elizabeth Perreau and Dave Morton
  * DATE: 19 JUNE 2012
  * DETAILS: simple example gui
  ***************************************/
  $display = "";
  $thisFile = __FILE__;
  if (!file_exists('../../config/global_config.php')) header('Location: ../../install/install_programo.php');
  require_once ('../../config/global_config.php');
  require_once ('../chatbot/conversation_start.php');
  switch ($_SERVER['REQUEST_METHOD'])
  {
    case 'POST':
      $form_vars = filter_input_array(INPUT_POST);
      break;
    case 'GET':
      $form_vars = filter_input_array(INPUT_GET);
      break;
    default:
      $form_vars = array();
  }

  $bot_id = (!empty($form_vars['bot_id'])) ? $form_vars['bot_id'] : 1;
  $convo_id = session_id();
  $format = (!empty($form_vars['format'])) ? $form_vars['format'] : 'html';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../../admin/css/bootstrap.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Program O AIML PHP Chatbot</title>
    <meta name="Description" content="A Free Open Source AIML PHP MySQL Chatbot" />
    <meta name="keywords" content="Open Source, AIML, PHP, MySQL, Chatbot" />
   
  </head>
  <body onload="document.getElementById('say').focus()">
  <div class="container">
    <div class="page-header">
      <h3>J.A.R.V.I.S.</h3>
    </div>
    <form class="form" method="get" action="index.php#end">
      <div id="input">
        <label for="say">Question:</label>
        <input type="text" name="say" id="say" size="70" placeholder="Enter your question here" />
        <input  class="btn btn-primary" type="submit" name="submit" id="say" value="Envoyer" />
        <input type="hidden" name="convo_id" id="convo_id" value="<?php echo $convo_id;?>" />
        <input type="hidden" name="bot_id" id="bot_id" value="<?php echo $bot_id;?>" />
        <input type="hidden" name="format" id="format" value="<?php echo $format;?>" />
      </div>
    </form>
    <div id="responses">
<?php echo $display . '<a id="end"/>' ?>
    </div>

  </div>
    
  </body>
</html>
