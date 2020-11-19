<?php namespace App\Controllers;


use App\Models\Freelancers_model;
use App\Models\Employers_model;
class PagesController extends BaseController
{
	//view function for viewing of main pages
	public function index()
	{
		//index page or login and registration page...

		//start session...
		$session = session();
		//check if already have session...
		if($session->has('user_slug'))
		{
			//if have some session redirect to dashboard page...
			return redirect()->to(base_url() . "/dashboard");
		}
		else
		{
			//css and js files to load...
			$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "fullpage/fullpage.css", "sweetalert/sweetalert2.min.css", "style.css");
			$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "fullpage/fullpage.js", "sweetalert/sweetalert2.min.js", "app/index.js");
			//views to load...
			echo view('templates/header', $data);
			echo view('pages/index');
			echo view('templates/footer', $data);
		}
	}

	public function privacy()
	{
		$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "sweetalert/sweeatlert2.min.css", "style.css");
		$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "sweetalert/sweetalert2.min.js");

		echo view('templates/header', $data);
		echo view('pages/privacy', $data);
		echo view('templates/footer', $data);
	}

	public function terms()
	{
		
	}

	public function profile($usertype,$userslug)
	{
		
		$session = session();
		$data['user'] = array($usertype,$userslug);
		$data['load_css'] = array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css");
		$data['load_js'] = array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "sweetalert/sweetalert2.min.js", "app/profile.js");

		if($usertype == "freelancer")
		{
			
			$freelancersModel = new Freelancers_model();
			
			$accountExistsResult = $freelancersModel->profile_exists($userslug);
			if($accountExistsResult)
			{
				$data['freelancer_info'] = $freelancersModel->get_info($userslug);
				$data['freelancer_image'] = $freelancersModel->get_image($userslug);
				
				$sessionUserSlug = $_SESSION['user_slug'];
				$data['session_slug'] = $sessionUserSlug;
				if($userslug === $sessionUserSlug)
				{
					echo view('templates/header', $data);
					echo view('templates/navbar');
					echo view('freelancers/current_freelancer_profile', $data);
					echo view('templates/footer', $data);
				}
				else
				{
					echo view('templates/header', $data);
					echo view('templates/navbar');
					echo view('freelancers/freelancer_profile', $data);
					echo view('templates/footer', $data);
				}
			}
			else
			{
				throw new \CodeIgniter\Exceptions\PageNotFoundException('The page you requested cannot be found.');
			}
			
		}else if($usertype == "employer")
		{

			$employerID = $session->get("employer_id");
			echo view('templates/header', $data);
			echo view('employers/employer_profile', $data);
			echo view('templates/footer', $data);
		}
	}
	
	public function dashboard()
	{
		$session = session();

		if($session->has('user_slug'))
		{
			// css and js files to load...
			$data = array(
				'load_css' => array("bootstrap/bootstrap.min.css", "fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
				'load_js' => array("jquery/jquery-3.5.1.min.js", "bootstrap/popper.min.js", "bootstrap/bootstrap.min.js", "sweetalert/sweetalert2.min.js", "app/profile.js")
			);

			$sessionUserType = $session->get("user_type");
			$sessionUserSlug = $session->get("user_slug");

			if($sessionUserType == "freelancer")
			{
				$freelancersModel = new Freelancers_model();

				echo view('templates/header',$data);
				echo view('templates/navbar');
				echo view('freelancers/dashboard', $data);
				echo view('templates/footer', $data);
			}
			else if($sessionUserType == "employer")
			{
				$employersModel = new Employers_model();
			}
		}
		else
		{
			return redirect()->to(base_url());
		}
	}

	//--------------------------------------------------------------------

}
