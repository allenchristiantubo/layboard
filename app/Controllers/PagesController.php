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
			$data['load_css'] = array("fontawesome/css/all.min.css", "fullpage/fullpage.css", "sweetalert/sweetalert2.min.css", "style.css");
			$data['load_js'] = array("fullpage/fullpage.js", "sweetalert/sweetalert2.min.js", "app/index.js");
			//views to load...
			echo view('templates/header', $data);
			echo view('pages/index');
			echo view('templates/footer', $data);
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url());
		
	}

	public function privacy()
	{
		$data['load_css'] = array("fontawesome/css/all.min.css", "sweetalert/sweeatlert2.min.css", "style.css");
		$data['load_js'] = array("sweetalert/sweetalert2.min.js");

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

		if($session->has('user_slug'))
		{
			$sessionUserType = $session->get('user_type');
			$sessionUserSlug = $session->get('user_slug');
			//$sessionUserId = $session->get('user_id');

			if($usertype == "freelancer")
			{
				$freelancersModel = new Freelancers_model();

				$accountExistsResult = $freelancersModel->profile_exists($userslug);
				if($accountExistsResult)
				{
					$data = array(
						'load_css' => array("fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
						'load_js' => array("sweetalert/sweetalert2.min.js", "app/profile.js"),
						'user_slug' => $sessionUserSlug,
						'user_type' => $sessionUserType
					);
					
					$data['user_info'] = $freelancersModel->get_info($userslug);
					$data['user_image'] = $freelancersModel->get_image($userslug);
					$data['freelancer_skills'] = $freelancersModel->get_skills($userslug);
					if($userslug === $sessionUserSlug)
					{
						
	
						echo view('templates/header', $data);
						echo view('templates/navbar', $data);
						echo view('freelancers/current_freelancer_profile', $data);
						echo view('freelancers/current_freelancer_profile_modal');
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
					throw new \CodeIgniter\Exceptions\PageNotFoundException();
				}
			}
			else if($usertype == "employer")
			{

				//$employerID = $session->get("employer_id");
				echo view('templates/header', $data);
				echo view('employers/employer_profile', $data);
				echo view('templates/footer', $data);
			}
			else
			{
				throw new \CodeIgniter\Exceptions\PageNotFoundException();
			}
		}
		else
		{
			return redirect()->to(base_url());
		}

		
	}
	
	public function dashboard()
	{
		$session = session();

		if($session->has('user_slug'))
		{
			$sessionUserType = $session->get("user_type");
			$sessionUserSlug = $session->get("user_slug");
			// css and js files to load...
			$data = array(
				'load_css' => array("fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
				'load_js' => array("sweetalert/sweetalert2.min.js", "app/profile.js"),
				'user_type' => $sessionUserType,
				'user_slug' => $sessionUserSlug
			);

			if($sessionUserType == "freelancer")
			{
				$freelancersModel = new Freelancers_model();

				$data['user_info'] = $freelancersModel->get_info($sessionUserSlug);
				$data['user_image'] = $freelancersModel->get_image($sessionUserSlug);

				echo view('templates/header',$data);
				echo view('templates/navbar', $data);
				echo view('freelancers/dashboard', $data);
				echo view('templates/footer', $data);
			}
			else if($sessionUserType == "employer")
			{
				$employersModel = new Employers_model();
				echo view('templates/header',$data);
				echo view('templates/navbar', $data);
				echo view('employers/dashboard', $data);
				echo view('templates/footer', $data);
			}
		}
		else
		{
			return redirect()->to(base_url());
		}
	}

	//--------------------------------------------------------------------

}
