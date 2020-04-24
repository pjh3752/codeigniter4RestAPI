<?php

namespace App\Libraries;

use App\Libraries\JWT;

Class JWTAuth
{
    protected $key = "cf41d3a42d3d5000d32454dac376ba834ab1e4dd75e509e3c000f2b0d3c612dd";

    /**
     * Get JWT token
    */
    public function getToken($data)
    {
        return $this->setToken($data);
    }

    /**
     * Setting JWT token
    */
    public function setToken($data)
    {
        $payload = array(
            "iss"   => $_SERVER['HTTP_HOST'],
			"iat"   => strtotime("now"),
			"exp"   => strtotime("+30 minutes"),
            "id"    => $data->id,
            "email" => $data->email
		);
        
        $jwt = JWT::encode($payload, $this->key);
        
        return $jwt;
    }

    /**
     * Token expiraton verify
    */
    public function verifyToken($reqToken)
    {
        if($reqToken)
        {
            $tokenArr       = $this->tokenParser($reqToken);
            $tokenType      = $tokenArr[1];
            $token          = $tokenArr[2];
            $decodeToken    = $this->decodeToken($token);
            $exp            = $decodeToken->exp;

            if($tokenType === 'Bearer' && $exp > strtotime("now")){
                return true;
            }
        }
        
        return false;
    }

    /**
     * Token parser
    */
    public function tokenParser($token)
    {
        $tokenArr = explode(" ", $token);
        return $tokenArr;
    }

    /**
     * Token decode
     * Adding exception handling 
    */
    public function decodeToken($token){
        return JWT::decode($token, $this->key, array('HS256'));
    }
}