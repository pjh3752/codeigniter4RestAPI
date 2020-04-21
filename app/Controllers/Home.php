<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

	public function index()
	{
<<<<<<< HEAD
=======
		
		echo view('welcome_message');
	}

	public function show($id)
	{
		$data['title']   = "My Real Title";
		$data['heading'] = "My Real Heading";
		$users = new UserModel();
		$user = $users->find($id);
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
		echo view('welcome_message', $data);
	}
	//--------------------------------------------------------------------

}
