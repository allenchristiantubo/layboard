<?php namespace App\Controllers;

class AdminPagesController extends BaseController
{
	public function index()
	{
		echo view('admins/index');
	}

	public function dashboard()
	{
		echo view('admins/dashboard');
	}
}
?>