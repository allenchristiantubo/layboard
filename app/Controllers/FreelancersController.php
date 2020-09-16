<?php namespace App\Controllers;

use App\Models\Freelancers_model;
class FreelancersController extends BaseController
{
    public function email_exists()
    {
        $freelancersModel = new Freelancers_model();
        $email = $this->request->getPost('email');

        $emailExistsResult = $freelancersModel->email_exists($email);
        echo $emailExistsResult;
        //API
        // if($emailExistsResult)
        // {
        //     echo json_encode(array("status" => $emailExistsResult,"message" => "Email exists."));
        // }
        // else
        // {
        //     echo json_encode(array("status" => $emailExistsResult, "message" => "Email doesn't exists."));
        // }
    }

    public function login()
    {
        $freelancersModel = new Freelancers_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $freelancersModel->login($email, $password);

        echo $loginResult;
    }
}
?>