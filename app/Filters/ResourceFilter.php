<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\JWTAuth;

class ResourceFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {

    }

    /**
     * Filter for token verification
     * If the token is invalid, a response is set
    */ 
    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // verify access token
        $reqToken   = $request->getHeader('Authorization');
        $jwtAuth    = new JWTAuth;
        if(! $jwtAuth->verifyToken($reqToken))
        {
            $errors = [
                "messages" => $jwtAuth->errors()
            ];
            //$response->setStatusCode(401);
            $response->setJson($errors);
        }
        return $response;
    }
}