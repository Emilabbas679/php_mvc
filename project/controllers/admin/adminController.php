<?php


class adminController extends Controller {

    public function __construct() {
        if (!isset( $_SESSION['valid']) or ( isset( $_SESSION['valid']) and $_SESSION['valid'] == false )){
            return header('Location: '. ADMIN_URL.'auth/login');
        }
    }


    public function index(){
        return $this->view('index', [], 'admin');
    }

    public function login(){
        echo 'zad';
    }
}