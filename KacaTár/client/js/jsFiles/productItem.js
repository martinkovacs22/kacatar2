import { httpClient } from "../config/http/httpClient.js";
import { fetchUser } from "../config/http/fetchUser.js";
import { Location } from "../config/location/location.js";
const LocationControll = new Location();

function megrendel(id){
    console.log(id);
}

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
            if (data.data[0].imgURL == null) {
                document.getElementById("productIMG").src = "../img/cim.PNG"
            }
            else{
                document.getElementById("productIMG").src = data.data[0].imgURL
            }
            console.log(data.data[0]);
            document.getElementById("cim").innerHTML = data.data[0].productName
            document.getElementById("price").innerHTML = data.data[0].price +"Ft/ "+data.data[0].Measure
            document.getElementById("category").innerHTML = "category: "+ data.data[0].Category;
            document.getElementById("kosar").addEventListener("click",(e)=>{
                e.preventDefault();
                if (LocationControll.isActiceUser()) {
                    megrendel(data.data[0].id);
                }else{
                    LocationControll.loginLets();
                }
                
                
                
            })
        }
    })


})
