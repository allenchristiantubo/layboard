<?php namespace App\Controllers;

use App\Models\Employers_model;
class EmployersController extends BaseController
{
    public function email_exists()
    {
        $employersModel = new Employers_model();
        $email = $this->request->getPost('email');

        $emailExistsResult = $employersModel->email_exists($email);

        if($emailExistsResult){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function login()
    {
        $employersModel = new Employers_model();
        $session = session();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $employersModel->login($email, $password);
        if(is_array($loginResult))
        {
            $sessionData = ["user_id" => $loginResult['employer_id'], "user_slug" => $loginResult['employer_slug'] ,"user_type" => "employer"];
            $session->set($sessionData);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function create_account()
    {
        $employersModel = new Employers_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');

        $createAccountResult = $employersModel->create_account($email,$password,$firstname,$lastname);
        
        if($createAccountResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}