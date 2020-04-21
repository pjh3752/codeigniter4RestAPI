<?php namespace App\Controllers;

<<<<<<< HEAD
/**
 * Challenge of idus using Codeigiter4 and Mysql
 * By : pjh3752
 * https://github.com/pjh3752
*/

use CodeIgniter\RESTful\ResourceController;
use App\Entities\User;

/* Users Restfull controller */
=======
use CodeIgniter\RESTful\ResourceController;

>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
class Users extends ResourceController
{

    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

<<<<<<< HEAD
    /**
     * User List Search
     * Method : GET
    */
    public function index()
    {
        $data   = $this->request->getGet();
        // paging, serch variable
=======
    public function index()
    {
        $data   = $this->request->getGet();
        // 페이징 처리, 검색을 위한 변수
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
        $limit          = (int) $data['limit'] ? $data['limit'] : 0;
        $offset         = (int) $data['offset'] ? $data['offset'] : 0;
        $offset         = $offset * $limit;
        $name           = $data['name'];
        $email          = $data['email'];
        $searchArray    = ['name' => $name, 'email' => $email];

        return $this->respond($this->model->like($searchArray)->findAll($limit, $offset));
    }

<<<<<<< HEAD
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
=======
    public function show($id  = null)
    {
        $record = $this->model->find($id);
        if (! $record)
        {
            return $this->failNotFound(sprintf(
                'product with id %d not found',
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
                $id
            ));
        }
 
        return $this->respond($record);
    }

<<<<<<< HEAD
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
=======
    public function create()
    {
        $data = $this->request->getJson();
        if (! $this->model->save($data))
        {
            return $this->fail($this->model->errors());
        }
        
        return $this->respondCreated($data, 'product created');
    }

    
}
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
