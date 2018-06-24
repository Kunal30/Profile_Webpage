<?php
require_once('/opt/lampp/htdocs/Profile_Website_MVC/includes/helpers.php');


if(isset($_GET['page']))
	$page=$_GET['page'];
else
	$page='proj';


switch ($page) {
	case 'index':
		render('templates/header',array('title' => 'Welcome to the official homepage of Kunal Suthar'));
		render_controller($page);
		render('templates/footer');
		break;
	
	case 'courses':
		render('templates/header',array('title' => 'Courses'));
		render_controller($page);
		render('templates/footer');
		break;

	case 'proj':
		render('templates/header',array('title' => 'Projects'));
		render_controller($page);
		render('templates/footer');
		break;

    case 'movie':
		render('templates/header',array('title' => 'Movies Watched'));
		render_controller($page);
		render('templates/footer');
		break;
	case 'wanna':
		render('templates/header',array('title' => 'Wannabe'));
		render_controller($page);
		render('templates/footer');
		break;
	case 'sound':
		render('templates/header',array('title' => 'My Soundtrack'));
		render_controller($page);
		render('templates/footer');
		break;
	case 'pikcha':
		render('templates/header',array('title' => 'Picture Gallery'));
		render_controller($page);
		render('templates/footer');
		break;
	case 'contact':
		render('templates/header',array('title' => 'Contact Me'));
		render_controller($page);
		render('templates/footer');
		break;
		
		
	
}



?>