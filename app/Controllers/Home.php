<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

	public function index()
	{
		echo view('welcome_message', $data);
	}
	//--------------------------------------------------------------------

}
