<?php namespace App\Controllers;

/**
 * Challenge of idus using Codeigiter4 and Mysql
 * By : pjh3752
 * https://github.com/pjh3752
*/

use CodeIgniter\RESTful\ResourceController;
use App\Entities\User;

/* Users Restfull controller */
class Users extends ResourceController
{

    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    /**
     * User List Search
     * Method : GET
    */
    public function index()
    {
        $data   = $this->request->getGet();
        // paging, serch variable
        $limit          = (int) $data['limit'] ? $data['limit'] : 0;
        $offset         = (int) $data['offset'] ? $data['offset'] : 0;
        $offset         = $offset * $limit;
        $name           = $data['name'];
        $email          = $data['email'];
        $searchArray    = ['name' => $name, 'email' => $email];

        return $this->respond($this->model->like($searchArray)->findAll($limit, $offset));
    }

    /**
     * User Detail Search
     * Method : GET
    */
    public function show($id  = null)
    {
        $record = $this->model->find($id);
        if (!$record)
        {
            return $this->failNotFound(sprintf(
                'user with id %d not found',
                $id
            ));
        }
 
        return $this->respond($record);
    }

    /**
     * Create User
     * Method : POST
    */
    public function create()
    {
        $data = $this->request->getJson();
        // Validate before password is encrypted
        if($this->model->validate($data)){
            // To avoid validation at the model save step
            $this->model->skipValidation = true;
            // convert stdClass to array
            $data = json_decode(json_encode($data), true);
            $user = new User();
            $user->fill($data);
        
            if (! $this->model->save($user))
            {
                return $this->fail($this->model->errors());
            }
        }else{
            return $this->fail($this->model->errors());
        }
        
        return $this->respondCreated($user, 'user created');
    }

    

}
