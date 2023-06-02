<?php
require_once "../Model/UserModel.php";
class UserService{

    private $model;
    function __construct(){
        $this->model = new UserModel();
    }
    function emailvalidatok($email){
        if (preg_match("/^\S+@\S+\.\S+$/", $email)) {
            return true;
        } else {
            return false;
        }
    }
    function validatePassword($password) {
        // Regex minta a jelszó ellenőrzésére
        $pattern = '/^.{8,}$/';

    if (preg_match($pattern, $password)) {
        return true; // Jelszó megfelel a követelményeknek
    } else {
        return false; // Jelszó nem megfelelő
    }
    }

    function loginService($data){
        if ($this->emailvalidatok($data["email"])) {
            return $this->model->login($data);
        }else{
            return array('err'=>true,'data'=> "nem Valid email");
        }
    }
    function signupService($data){
        if ($this->emailvalidatok($data["email"]) && $this->validatePassword($data['pass'])) {
            return $this->model->signup($data);
        }else{
            return array('err'=>true,'data'=> "nem Valid email vagy Pass");
        }
        
    }

}

?>