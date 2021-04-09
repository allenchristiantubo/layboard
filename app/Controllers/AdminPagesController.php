<?php namespace App\Controllers;

use \DateTime;
use App\Libraries\Common_utils;
use App\Models\Admins_model;

class AdminPagesController extends BaseController
{
	public function index()
	{
		
		
			//css and js files to load...
			$data['load_css'] = array("fontawesome/css/all.min.css", "fullpage/fullpage.css", "sweetalert/sweetalert2.min.css", "style.css");
			$data['load_js'] = array("fullpage/fullpage.js", "sweetalert/sweetalert2.min.js", "app_uiux/index_uiux.js", "app_data/index_data.js");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/index', $data);
			echo view('templates/footer', $data);
		}
	public function dashboard()
	{
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_widget()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_widget', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_simptables()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_simptables', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_datatables()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_datatables', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_jsgridtables()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_jsgridtables', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_calendar()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_calendar', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_inbox()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_inbox', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_compose()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_compose', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_read()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_read', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projects()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projects', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectadd()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectadd', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectedit()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectedit', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectdetail()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectdetail', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectcontact()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectcontact', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectsimpsearch()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectsimpsearch', $data);
			echo view('templates/footer', $data);
	}	
	public function dashboard_projectensearch()
	{	
			$data['load_css'] = array("fontawesome/css/all.min.css");
			//views to load...
			echo view('templates/header', $data);
			echo view('admins/dashboard_projectensearch', $data);
			echo view('templates/footer', $data);
	}	


}
?>