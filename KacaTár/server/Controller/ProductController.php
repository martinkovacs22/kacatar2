<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
require_once "../Service/ProductService.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if (isset($data["fun"])) {
        if ($data["fun"] == "search") {
            $data1 = array("data"=>$data['data']);
            $ServiceP = new ProductService();
            $jsonData = json_encode($ServiceP->searchData($data1));
            echo $jsonData;
        } elseif($data["fun"] == "catagory"){
            $ServiceP = new ProductService();
           $jsonData = json_encode($ServiceP->getAllCategory());
            echo $jsonData;
        }elseif($data["fun"] == "getProductById"){
            $ServiceP = new ProductService();
            $data1 = array("data"=>$data['data']);
           $jsonData = json_encode($ServiceP->getProductById($data1));
            echo $jsonData;
        }
        else{
            print_r(array("err"=>true,"data"=>"rossz a  'Fun' érték"));
        }
        
    } else {
       print_r(array("err"=>true,"data"=>"nincs 'Fun' érték"));
    }
    
   

}else{
    echo "hello nem jó a get";
}


?>