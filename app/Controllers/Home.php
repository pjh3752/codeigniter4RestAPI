<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

	public function index()
	{
		
		echo view('welcome_message');
	}

	public function show($id)
	{
		$data['title']   = "My Real Title";
		$data['heading'] = "My Real Heading";
		$users = new UserModel();
		$user = $users->find($id);
		echo view('welcome_message', $data);
	}

	//--------------------------------------------------------------------

}
