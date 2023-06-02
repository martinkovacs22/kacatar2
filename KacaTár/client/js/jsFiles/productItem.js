import { httpClient } from "../config/http/httpClient.js";
import { fetchUser } from "../config/http/fetchUser.js";

window.addEventListener("load",(e)=>{
    e.preventDefault();
    const hashData = window.location.hash;
console.log(hashData);
    const http = new httpClient(fetchUser);
    const data1 = {
        fun:"getProductById",
        data:hashData.split('#')[1]
    }
    http.getProductById(data1,(err,data)=>{
        if (err) {
            console.log(data);
        }else{
            console.log(data);
            document.getElementById("cim").innerHTML = data.data.productName
            document.getElementById("category").innerHTML = data.data.productName
        }
    })


})
