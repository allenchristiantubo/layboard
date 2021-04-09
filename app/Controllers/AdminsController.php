<?php namespace App\Controllers;

use App\Models\Admins_model;
class AdminsController extends BaseController
{
    public function email_exists()
    {
        $adminsModel = new Admins_Model();
        $email = $this->request->getPost('email');

        $emailExistsResult = $adminsModel->email_exists($email);

        if($emailExistsResult){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function login()
    {
        $adminsModel = new Admins_Model();
        $session = session();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $loginResult = $adminsModel->login($email, $password);
        if(is_array($loginResult))
        {
            $sessionData = ["user_id" => $loginResult['admin_id'], "user_slug" => $loginResult['admin_slug'] ,"user_type" => "admin"];
            $session->set($sessionData);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }