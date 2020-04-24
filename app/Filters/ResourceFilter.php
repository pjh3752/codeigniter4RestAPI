<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\JWTAuth;

class ResourceFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // verify access token
        $reqToken = $request->getHeader('Authorization');
        $cookieToekn = $request->getCookie("access_token");
        $jwtAuth = new JWTAuth;
        if(! $jwtAuth->verifyToken($reqToken))
        {
            return redirect('login');
        }
        return $request;
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}