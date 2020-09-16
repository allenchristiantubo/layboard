<?php namespace App\Controllers;

use App\Models\Employers_model;
class EmployersController extends BaseController
{
    public function email_exists()
    {
        $employersModel = new Employers_model();
        $email = $this->request->getPost('email');

        echo $employersModel->email_exists($email);
    }

    public function login()
    {
        $employersModel = new Employers_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $employersModel->login($email, $password);

        echo $loginResult;
    }
}