<?php

class UsersController extends Controller {


    public function __construct() {
        if (!isset( $_SESSION['valid']) or ( isset( $_SESSION['valid']) and $_SESSION['valid'] == false )){
            return header('Location: '. ADMIN_URL.'auth/login');
        }
    }

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
            $model->create($data);
            return header('Location: '. ADMIN_URL.'users');
        }
    }

    public function edit($id)
    {
        $model = $this->model('Users');
        $model->getUser(['id'=>$id]);
        $user = $model->data['item'];
        if(count($user)==0)
            return header('Location: '. ADMIN_URL.'users');
        else{
            $user = $user[0];
            var_dump($user);
        }
        echo $id;
    }

}