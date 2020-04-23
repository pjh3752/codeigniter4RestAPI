<?php namespace App\Controllers;

/**
 * Challenge of idus using Codeigiter4 and Mysql
 * Restfull Controller of Login
 * By : pjh3752
 * https://github.com/pjh3752
*/

use CodeIgniter\RESTful\ResourceController;
use App\Entities\User;
use App\Libraries\JWT;

/* Users Restfull controller */
class Login extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function create()
    {
        $data = $this->request->getJson();
        $email = $data -> email;
        $password = $data -> password;
        $verifiedUser = $this->verifyUser($email, $password);

        if(! $verifiedUser)
        {
            return $this->failNotFound('login fail');
        }
        else
        {
            $token = $this->getToken($verifiedUser);
            $data -> access_token = $token;
            $data -> messages = "login success";
           
            return $this->respond($data);
        }
    }

    private function verifyUser($email, $password)
    {
        $user = $this->model->where('email', $email)->first();
      
        if($user)
        {
            if(password_verify($password, $user -> password)) 
            {
                return $user;
            }
        }
        return null;
    }

    private function getToken($data)
    {
        $key = "example_key";
		$payload = array(
            "iss" => $_SERVER['HTTP_HOST'],
			"iat" => strtotime("now"),
			"exp" => strtotime("+30 minutes"),
			"id" => $data -> id
		);
        
		$jwt = JWT::encode($payload, $key);
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        print_r($jwt);
        return $jwt;
    }
}