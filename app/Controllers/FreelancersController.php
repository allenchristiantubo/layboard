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
    }

    public function login()
    {
        $freelancersModel = new Freelancers_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $freelancersModel->login($email, $password);

        echo $loginResult;
    }

    public function create_account()
    {
        $freelancersModel = new Freelancers_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');

        $createAccountResult = $freelancersModel->create_account($email,$password,$firstname,$lastname);

        echo $createAccountResult;
    }
}
?>