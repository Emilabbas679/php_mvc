<?php


class adminController extends Controller {

    public function index(){
        $this->view('index', [], 'admin');
    }
}