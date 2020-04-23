<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\JWT;

class Home extends BaseController
{

	public function index()
	{
		echo view('welcome_message');
	}
	//--------------------------------------------------------------------

}
