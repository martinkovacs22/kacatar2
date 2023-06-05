<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
require_once "../Service/UserService.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if (isset($data["fun"])) {
        if ($data["fun"] == "login") {
            $data1 = array("email"=>$data['email'],"pass"=>$data['pass']);
            $ServiceU = new UserService();
            $jsonData = json_encode($ServiceU->loginService($data1));
            echo $jsonData;
        } 
        elseif($data["fun"] == "signup"){
            $data1 = array("email"=>$data['email'],"pass"=>$data['pass'],"f_name"=>$data['f_name'],"l_name"=>$data['l_name']);
            $ServiceU = new UserService();
            $jsonData = json_encode($ServiceU->signupService($data1));
            echo $jsonData;
            //print_r($data1);
        }
        elseif($data["fun"] == "ByToken"){
            $data1 = array("token"=>$data['token']);
            $ServiceU = new UserService();
            $jsonData = json_encode($ServiceU->loginServiceByToken($data1));
            echo $jsonData;
            //print_r($data1);
        }
        else{
            print_r(array("err"=>true,"data"=>"rossz a  'Fun' érték"));
        }
        
    } else {
       print_r(array("err"=>true,"data"=>"nincs 'Fun' érték"));
    }
    
   

}


?>