<?php 
require_once "Conn.php";
class UserModel{

private $pdo;

function __construct(){
    $db = new Conn();
    $this->pdo = $db->getPdo();
}

function login($data){
    try {
        $stmt = $this->pdo->prepare("CALL login(:email, :password)");
    $stmt->bindParam(':email', $data["email"]);
    $stmt->bindParam(':password', $data["pass"]);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    
    return(array("err"=>false,"data"=>$results));
    } catch (Throwable $th) {
    return(array("err"=>true,"data"=>$th->getMessage()));
    }
   
    
}
function signup($data){
    try {
        $stmt = $this->pdo->prepare("CALL signup(:fname ,:lname , :email , :password)");
   
    $stmt->bindParam(':fname', $data["f_name"]);
    $stmt->bindParam(':lname', $data["l_name"]);
    $stmt->bindParam(':email', $data["email"]);
    $stmt->bindParam(':password', $data["pass"]);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    
    return(array("err"=>false,"data"=>$results));
    } catch (Throwable $th) {
    return(array("err"=>true,"data"=>$th->getMessage()));
    }
   
    
}

}


?>