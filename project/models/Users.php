<?php

class Users{
    protected $db = [];
    public $data = [];
    public function __construct(){
        $this->db = new Db();
    }


    public function all(){
        $data = $this->db->query('select * from users order by id desc');
        $this->data['users'] = $data;
    }

    public function create($item){
        $keys = '';
        $values = "";
        $index = 1;
        foreach ($item as $key=>$value){
            $keys .= " `".$key."` ";
            if ($key == 'password') {
                $value = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $values .= " '".$value."' ";
            if ($index != count($item)) {
                $keys .= ' , ';
                $values .= ' , ';
            }
            $index++;
        }
        $data = $this->db->query("INSERT INTO `users` (".$keys.") VALUES (".$values.");");
        $this->data['check'] = $data;
    }

}