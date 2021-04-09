<?php namespace App\Controllers;

use \DateTime;
use App\Models\Freelancers_model;
use App\Models\Employers_model;
use App\Models\Categories_model;
use App\Models\Jobs_model;
use App\Libraries\Common_utils;

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
			$data['load_js'] = array("fullpage/fullpage.js", "sweetalert/sweetalert2.min.js", "app_uiux/index_uiux.js", "app_data/index_data.js");
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
		$data['load_css'] = array("sbadmin/sb-admin-2.min.css","fontawesome/css/all.min.css", "sweetalert/sweeatlert2.min.css", "style.css");
		$data['load_js'] = array("sbadmin/sb-admin-2.min.js","sweetalert/sweetalert2.min.js", "app_uiux/privacyterms.js");

		echo view('templates/header', $data);
		echo view('pages/privacy', $data);
		echo view('templates/footer', $data);
	}

	public function terms()
	{
		$data['load_css'] = array("fontawesome/css/all.min.css", "sweetalert/sweeatlert2.min.css", "style.css");
		$data['load_js'] = array("sweetalert/sweetalert2.min.js","app_uiux/privacyterms.js");
		echo view('templates/header', $data);
		echo view('pages/terms', $data);
		echo view('templates/footer', $data);
	}

	public function profile($usertype,$userslug)
	{
		
		$session = session();

		if($session->has('user_slug'))
		{
			$sessionUserType = $session->get('user_type');
			$sessionUserSlug = $session->get('user_slug');
			//$sessionUserId = $session->get('user_id');

			$data = array(
				'load_css' => array("sbadmin/sb-admin-2.min.css","fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
				'load_js' => array("sbadmin/sb-admin-2.min.js","sweetalert/sweetalert2.min.js", "app_uiux/profile.js"),
				'current_page' => $currentPage,
				'user_slug' => $sessionUserSlug,
				'user_type' => $sessionUserType
			);

			if($usertype == "freelancer")
			{
				$freelancersModel = new Freelancers_model();

				$accountExistsResult = $freelancersModel->profile_exists($userslug);
				if($accountExistsResult)
				{
					
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
		$uri = service('uri');
		if($session->has('user_slug'))
		{
			$currentPage = $uri->getSegment(1);
			$sessionUserType = $session->get("user_type");
			$sessionUserSlug = $session->get("user_slug");
			// css and js files to load...
			$data = array(
				'load_css' => array("sbadmin/sb-admin-2.min.css","fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
				'load_js' => array("sbadmin/sb-admin-2.min.js","sweetalert/sweetalert2.min.js", "app_uiux/profile.js"),
				'current_page' => $currentPage,
				'user_slug' => $sessionUserSlug,
				'user_type' => $sessionUserType
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
				
				$data['user_info'] = $employersModel->get_info($sessionUserSlug);
				$data['user_image'] = $employersModel->get_image($sessionUserSlug);

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

	public function jobs()
	{
		$session = session();
		$uri = service('uri');

		if($session->has('user_slug'))
		{
			$currentPage = $uri->getSegment(1);
			$sessionUserType = $session->get("user_type");
			$sessionUserSlug = $session->get("user_slug");
			$sessionUserId = $session->get("user_id");

			$data = array(
				'load_css' => array("sbadmin/sb-admin-2.min.css","fontawesome/css/all.min.css", "sweetalert/sweetalert2.min.css", "style.css"),
				'load_js' => array("sbadmin/sb-admin-2.min.js","sweetalert/sweetalert2.min.js", "app_uiux/jobs_employer.js"),
				'current_page' => $currentPage,
				'user_slug' => $sessionUserSlug,
				'user_type' => $sessionUserType
			);

			if($sessionUserType == "freelancer")
			{
				$freelancersModel = new Freelancers_model();
				$jobsModel = new Jobs_model();
				$common_utils = new Common_utils();


				$data['user_info'] = $freelancersModel->get_info($sessionUserSlug);
				$data['user_image'] = $freelancersModel->get_image($sessionUserSlug);
				$perPageCount = 10;
				$jobsRowCount = $jobsModel->get_jobs_row_count();
				$data['pagesCount'] = ceil($jobsRowCount / $perPageCount);
				$data['jobs'] = $jobsModel->get_jobs_by_page(1, $perPageCount);
				$data['jobs_elapsed'] = array();
				for($j = 0; $j < count($data['jobs']); $j++)
				{
					array_push($data['jobs_elapsed'], $common_utils->time_elapsed_string($data['jobs'][$j]["date_published"]));
				}

				echo view('templates/header', $data);
				echo view('templates/navbar', $data);
				echo view('freelancers/jobs', $data);
				echo view('templates/footer', $data);

				
			}
			else if($sessionUserType == "employer")
			{
				$employersModel = new Employers_model();
				$categoriesModel = new Categories_model();
				$jobsModel = new Jobs_model();
				$common_utils = new Common_utils();
				
				$data['user_info'] = $employersModel->get_info($sessionUserSlug);
				$data['user_image'] = $employersModel->get_image($sessionUserSlug);	
				$data['categories'] = $categoriesModel->get_categories();
				$data['draft_jobs'] = $jobsModel->get_draft_jobs($sessionUserId);
				$data['draft_elapsed'] = array();
				for($i = 0; $i < count($data['draft_jobs']); $i++)
				{
					array_push($data['draft_elapsed'], $common_utils->time_elapsed_string($data['draft_jobs'][$i]["date_created"]));
				}
				$data['jobs'] = $jobsModel->get_jobs($sessionUserId);
				$data['jobs_elapsed'] = array();
				for($j = 0; $j < count($data['jobs']); $j++)
				{
					array_push($data['jobs_elapsed'], $common_utils->time_elapsed_string($data['jobs'][$j]["date_published"]));
				}
				echo view('templates/header', $data);
				echo view('templates/navbar', $data);
				echo view('employers/jobs', $data);
				echo view('employers/jobs_modal', $data);
				echo view('templates/footer', $data);
			}
		}
		else
		{
			return redirect()->to(base_url());
		}
	}
}
