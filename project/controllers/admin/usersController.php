<?php

class UsersController extends Controller {


    public function index()
    {
        $model = $this->model('Users');
        $model->all();
        $items = $model->data['users'];
        return $this->view('users/index', ['items'=>$items], 'admin');
    }

    public function create()
    {
        return $this->view('users/create', [], 'admin');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = [
              'name' => $_POST['name'],
              'email' => $_POST['email'],
              'password' => $_POST['password']
            ];
            $model = $this->model('Users');
            var_dump($model->create($data));
            return header('Location: '. ADMIN_URL.'users');
        }
        echo 'za';
    }

}