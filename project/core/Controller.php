<?php

class Controller {


    public function model($model)
    {
        require_once "project/models/$model.php";
        return new $model();
    }
    
    public function view($view, $data=[], $page = 'site')
    {
        if ($page == 'site'){

        }
        elseif ($page == 'admin'){
            require_once 'project/views/admin/partials/head.php';
            require_once 'project/views/admin/partials/header.php';
            require_once "project/views/admin/$view.php";
            require_once 'project/views/admin/partials/footer.php';
        }
        elseif ($page == "admin-auth"){
            require_once "project/views/admin/$view.php";
        }
        else{
        }
    }
}