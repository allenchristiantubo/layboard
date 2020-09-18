<?php namespace App\Controllers;

class PagesController extends BaseController
{
	//view function for viewing of main pages
	public function view($page = 'index')
	{
		$data['title'] = ucfirst($page);
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
		}

		//index page or login and registration page
		if($page == "index")
		{
			$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "fullpage/fullpage.css", "sweetalert/sweetalert2.min.css", "style.css");
			$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "fullpage/fullpage.js", "sweetalert/sweetalert2.min.js");
			echo view('templates/header', $data);
			echo view('pages/'.$page, $data);
		}
		else
		{
			
		}
	}

	public function hello()
	{
		echo "Hello";
	}

	//--------------------------------------------------------------------

}
