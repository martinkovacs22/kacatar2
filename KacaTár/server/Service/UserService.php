<?php
require_once "../Model/UserModel.php";
require_once "../JWT/JWTController.php";
class UserService{

    private $model;
    private static $jwt = null;
    public static function getJWT(){
        if(UserService::$jwt == null){
          return  UserService::$jwt = new JwtGenerator("userToken");
        }
        return UserService::$jwt;
    }
    function __construct(){
        $this->model = new UserModel();
        UserService::getJWT();
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
        if (isset($data["email"])) {
            if ($this->emailvalidatok($data["email"])) {
                if ( isset($this->model->login($data)['data'][0]["email"])) {
                    
                    return array('err'=>false,'data'=>  UserService::$jwt->generateToken($this->model->login($data)['data'][0]));
                   // return $jwt->generateToken($this->model->login($data)['data'][0]); 
                }
                return false ; 
            }else{
                return array('err'=>true,'data'=> "nem Valid email");
            }
        }else{

        }
        
    }
    function loginServiceByToken($data){
        if (isset($data["token"])) {
            try {
                $resutlToken = UserService::$jwt->verifyToken($data["token"]);
                if (isset($resutlToken->email)) {
                   
                    $data = array(
                        "email"=> $resutlToken->email,
                        "f_name"=> $resutlToken->f_name,
                        "l_name"=> $resutlToken->l_name,
                        "imgURL"=> $resutlToken->imgURL,
                        "regsitTime"=> $resutlToken->regsitTime,
                        "isAdmin"=> $resutlToken->isAdmin);
                        return array('err'=>false,'data'=> UserService::$jwt->generateToken($data));
                    
                }else{
                    return array('err'=>true,'data'=> "Nem jo a Token");
                }
            } catch (\Throwable $th) {
                return array('err'=>true,'data'=> $th);
                  
            }
           
        } else {
            return "ffds";
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