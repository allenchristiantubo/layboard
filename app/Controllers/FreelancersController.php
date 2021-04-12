<?php namespace App\Controllers;

use App\Models\Freelancers_model;
class FreelancersController extends BaseController
{
    public function email_exists()
    {
        $freelancersModel = new Freelancers_model();
        
        $email = $this->request->getPost('email');

        $emailExistsResult = $freelancersModel->email_exists($email);

        if($emailExistsResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        //echo $email;
    }

    public function login()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();
        $sendEmail = service('email');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $freelancersModel->login($email, $password);
        if(is_array($loginResult))
        {
            $sessionData = ["user_id" => $loginResult['freelancer_id'], "user_slug" => $loginResult['freelancer_slug'], "user_type" => "freelancer"];
            $session->set($sessionData);

            // $sendEmail->setFrom("allentubo.layboard@gmail.com", "Allen Christian Tubo - Layboard Developer");
            // $sendEmail->setTo("allentubo09@gmail.com");
            // $sendEmail->setSubject("Account Logged In");
            // $sendEmail->setMessage("Your account was logged in");

            // $sendEmail->send();

            // if($sendEmail->send(false)){
                
            // }
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function create_account()
    {
        $freelancersModel = new Freelancers_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');

        $createAccountResult = $freelancersModel->create_account($email,$password,$firstname,$lastname);

        if($createAccountResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function insert_skills()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();
        
        $skillID = $this->request->getVar('skill_id');
        $skillName = $this->request->getVar('skill_name');
        $freelancerID = $session->get("user_id");

        $insertSkillResult = $freelancersModel->insert_skills($skillID, $freelancerID);
        if($insertSkillResult)
        {
            echo json_encode(array("skill_id" => $skillID , "skill_name" => $skillName));
        }
    }

    public function update_skills()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();

        $skillID = $this->request->getVar('skill_id');
        $freelancerID = $session->get("user_id");

        if(!empty($skillID))
        {
            foreach($skillID as $skill_id)
            {
                $updateSkillResult = $freelancersModel->update_skills($skill_id, $freelancerID);
            }
            echo $updateSkillResult;
        }   
    }

    public function deactivate_skills()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();

        $skillID = $this->request->getVar("skill_id");

        $freelancerID = $session->get("user_id");
        if(!empty($skillID))
        {
            foreach($skillID as $skill_id)
            {
                $deactivateSkillResult = $freelancersModel->deactivate_skill($skill_id, $freelancerID);
            }
            echo $deactivateSkillResult;
        }
    }

    public function get_skills()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();

        $freelancerSlug = $session->get("user_slug");
        
        $skillsResult = $freelancersModel->get_skills($freelancerSlug);

        echo json_encode($skillsResult);
    }

    public function insert_categories()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();
        
        $categoryID = $this->request->getVar('category_id');
        $categoryName = $this->request->getVar('category_name');
        $freelancerID = $session->get("user_id");

        $insertCategoryResult = $freelancersModel->insert_categories($categoryID, $freelancerID);
        if($insertCategoryResult)
        {
            echo json_encode(array("category_id" => $categoryID , "category_name" => $categoryName));
        }
    }

    public function get_categories()
    {
        $freelancersModel = new Freelancers_model();
        $session = session();

        $freelancerSlug = $session->get("user_slug");

        $categoriesResult = $freelancersModel->get_categories($freelancerSlug);

        echo json_encode($categoriesResult);
    }
}
?>