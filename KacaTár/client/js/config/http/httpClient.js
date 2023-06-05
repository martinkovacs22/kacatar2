import { CookieHandler } from "../cookie/cookie.js";
export class httpClient{

    constructor(fetchUser){
        this.fetchUser = fetchUser;
    }

    signUp(data,callback){
        const url = "http://localhost/Kacatar/kacatar/KacaT%C3%A1r/server/Controller/UserController.php";//átkell írni 
        this.fetchUser.post(url,data,(err,result)=>{
            if (err) {
                console.log("nem sikerült a fetch eküldése");
                callback(true,null)
            }
            else{
                callback(err,result)
            }
        })
    }
    login(data,callback){
        const url = "http://localhost/Kacatar/kacatar/KacaT%C3%A1r/server/Controller/UserController.php";//átkell írni 
        this.fetchUser.post(url,data,(err,result)=>{
            if (err) {
                console.log("nem sikerült a fetch eküldése");
                callback(true,null)
            }
            else{
                callback(err,result)
            }
        })
    }
    getProductBySearchData(data,callback){
        const url = "http://localhost/Kacatar/kacatar/KacaT%C3%A1r/server/Controller/ProductController.php";
        this.fetchUser.post(url,data,(err,result)=>{
            console.log("fut");
            if (err) {
                
                callback(true,null)
            }
            else{
                callback(err,result)
            }
        })
    }
    getAllCategory(data,callback){
        const url = "http://localhost/Kacatar/kacatar/KacaT%C3%A1r/server/Controller/ProductController.php";
        this.fetchUser.post(url,data,(err,result)=>{
            console.log("fut");
            if (err) {
                
                callback(true,null)
            }
            else{
                callback(err,result)
            }
        })
    }
    getProductById(data,callback){
        const url = "http://localhost/Kacatar/kacatar/KacaT%C3%A1r/server/Controller/ProductController.php";
        this.fetchUser.post(url,data,(err,result)=>{
            console.log("fut");
            if (err) {
                
                callback(true,null)
            }
            else{
                callback(err,result)
            }
        })
    }
}
