<?php
require_once "../Model/ProductModel.php";
class ProductService{

    private $model;
    function __construct(){
        $this->model = new ProductModel();
    }


    function searchData($data){
        try {
            return $this->model->searchData($data);
        } catch (Throwable $th) {
            return array('err'=>true,'data'=> $th);
        }
        
    }
    function getAllCategory(){
        try {
            return $this->model->getCategory();
        } catch (\Throwable $th) {
            return array('err'=>true,'data'=> $th);
        }
    }
    function getProductById($data){
        
        try {
            return $this->model->getProductById($data);
        } catch (\Throwable $th) {
            return array('err'=>true,'data'=> $th);
        }
    }


}

?>