<?php


class authController extends Controller {


    public function login(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET')
            return $this->view('login', [], 'admin-auth');
        else{
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $model = $this->model('Users');
            $model->getUser(['email'=>$email]);
            $user = $model->data['item'];
            if(count($user) == 0)
                return header('Location: '. ADMIN_URL.'auth/login');
            else{
                if(password_verify($pass, $user[0]['password'])) {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = $email;
                    $_SESSION['user'] = $user[0]['name'];
                    return header('Location: '. ADMIN_URL);
                }
                return header('Location: '. ADMIN_URL.'auth/login');
                print_r($user[0]['email']);
            }
        }
    }

    public function logout(){
        if (!isset( $_SESSION['valid']) or ( isset( $_SESSION['valid']) and $_SESSION['valid'] == false ))
            return header('Location: '. ADMIN_URL.'auth/login');
        else{
            $_SESSION['valid'] = false;
            unset($_SESSION["username"]);
            unset($_SESSION["user"]);
            unset($_SESSION["timeout"]);
            return header('Location: '. ADMIN_URL.'auth/login');

        }
    }
}