<?php namespace App\Controllers;

/**
 * Challenge of idus using Codeigiter4 and Mysql
 * Restfull Controller of Login
 * By : pjh3752
 * https://github.com/pjh3752
*/

use CodeIgniter\RESTful\ResourceController;
use App\Entities\User;
use App\Libraries\JWTAuth;

/* Users Restfull controller */
class Login extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    /**
     * Login
     * Method : POST
    */
    public function create()
    {
        $data           = $this->request->getJson();
        $email          = $data -> email;
        $password       = $data -> password;
        $verifiedUser   = $this->verifyUser($email, $password);
        if(! $verifiedUser)
        {
            return $this->failNotFound('login fail');
        }
        else
        {
            // Return token object after successful login
            $jwtAuth = new JWTAuth;
            $token = $jwtAuth->getToken($verifiedUser);

            $messages = [
                "messages" => "login success",
                "email" => $data->email,
                "access_token" => $token,
                "token_type" => "Bearer"
            ];
            return $this->respond($messages);
        }
    }

    /**
     * Verify User
    */
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

}