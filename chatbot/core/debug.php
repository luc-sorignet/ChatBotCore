<?php
	function debug($var){


		 $debug=debug_backtrace();
         echo '<p>&nbsp;</p><p><a href="#"  ><strong>'.__FILE__.' </strong> l .'.__LINE__.'</a></p>';
         echo '<ol>';
                  foreach ($debug as $k => $v) {
 
            if($k>0){
                        echo'<li><strong>'.$v['file'].'</strong> l.'.$v['line'].'</li>';
 
 
            }
         }
         echo '</ol>';
         echo'<pre>';
         var_dump($var);
         echo'</pre>';
	}



?>