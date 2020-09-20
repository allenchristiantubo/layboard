<?php namespace App\Controllers;

class PagesController extends BaseController
{
	//view function for viewing of main pages
	public function index()
	{
		if(!file_exists(APPPATH.'views/pages/index.php'))
        {
            show_404();
		}

		//index page or login and registration page
		$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "fullpage/fullpage.css", "sweetalert/sweetalert2.min.css", "style.css");
		$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "fullpage/fullpage.js", "sweetalert/sweetalert2.min.js", "app/index.js");
		echo view('templates/header', $data);
		echo view('pages/index', $data);
	}

	public function hello()
	{
		echo "Hello";
	}

	public function home()
	{
		$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css");
		$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "sweetalert/sweetalert2.min.js");
		
		$session = session();
		$usertype = $session->get('user_type');

		echo view('templates/header', $data);
		echo view('pages/home', $data);
	}

	//--------------------------------------------------------------------

}
