<?php 
require_once "Conn.php";
class ProductModel{

private $pdo;

function __construct(){
    $db = new Conn();
    $this->pdo = $db->getPdo();
}

function searchData($data){
    try {
        $stmt = $this->pdo->prepare("CALL getProductBysearchData(:data)");
    $stmt->bindParam(':data', $data["data"]);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    
    return(array("err"=>false,"data"=>$results));
    } catch (Throwable $th) {
    return(array("err"=>true,"data"=>$th->getMessage()));
    }
}
function getCategory(){
    try {
        $stmt = $this->pdo->prepare("CALL getAllCategory()");
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    
    return(array("err"=>false,"data"=>$results));
    } catch (Throwable $th) {
    return(array("err"=>true,"data"=>$th->getMessage()));
    }
}
function getProductById($data){

    try {
        $stmt = $this->pdo->prepare("CALL getProductById(:data)");
        $stmt->bindParam(':data', $data["data"]);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    
    return(array("err"=>false,"data"=>$results));
    } catch (Throwable $th) {
    return(array("err"=>true,"data"=>$th->getMessage()));
    }

}

}


?>