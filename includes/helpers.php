<?php

/** 
 Renders template
 */
 function render($template, $data = array())
 {
 	$path= '/opt/lampp/htdocs/Profile_Website_MVC/views/templates/'.$template.'.php';
 	if(file_exists($path))
 	{
 		extract($data);
 		require($path);
 	}
 }
 function render_controller($template, $data = array())
 {
 	$path= '/opt/lampp/htdocs/Profile_Website_MVC/views/'.$template.'.php';
 	if(file_exists($path))
 	{
 		extract($data);
 		require($path);
 	}
 }
 ?>