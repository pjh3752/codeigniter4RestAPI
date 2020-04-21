<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{

    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function index()
    {
        $data   = $this->request->getGet();
        // 페이징 처리, 검색을 위한 변수
        $limit          = (int) $data['limit'] ? $data['limit'] : 0;
        $offset         = (int) $data['offset'] ? $data['offset'] : 0;
        $offset         = $offset * $limit;
        $name           = $data['name'];
        $email          = $data['email'];
        $searchArray    = ['name' => $name, 'email' => $email];

        return $this->respond($this->model->like($searchArray)->findAll($limit, $offset));
    }

    public function show($id  = null)
    {
        $record = $this->model->find($id);
        if (! $record)
        {
            return $this->failNotFound(sprintf(
                'product with id %d not found',
                $id
            ));
        }
 
        return $this->respond($record);
    }

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